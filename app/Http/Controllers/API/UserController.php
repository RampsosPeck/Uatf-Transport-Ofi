<?php

namespace UatfTransport\Http\Controllers\API;

use Illuminate\Http\Request;
use UatfTransport\Http\Controllers\Controller;
use UatfTransport\Http\Requests\UserSaveRequest;
use UatfTransport\User; 
use UatfTransport\Tarjeta;
use UatfTransport\Transaction;
use UatfTransport\Cuenta;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
class UserController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::orderBy('id','DESC')->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSaveRequest $request)
    {
        //return ['message' => 'te quiero nenasha'];
        $response = $request['cedula'] . $request['ru'];

        if($request['genero'] == 'masculino')
        {
            $img = 'turist1.png';
        }else{
            $img = 'turist2.png';
        }    

        $id = DB::table('users')->insertGetId([
            'entity' => $request['entity'],
            'name' => $request['name'],
            'cedula' => $request['cedula'],
            'phone' => $request['phone'],
            'genero' => $request['genero'],
            'ru' => $request['ru'],
            'email' => $request['email'],
            'password' => bcrypt($response),
            'type' => $request['type'],
            'avatar' => $img,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $qrCode = bcrypt($id . '-' . $request->ru . str_random(40));

        $idcu = DB::table('cuentas')->insertGetId([
            'QRcode' => $qrCode,
            'saldo' => $request['saldo'],
            'user_id' => $id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $date = date('y');
        $coding = $id . "/" . $date;

        $barcode = $coding . '-' . str_random(5) . '-' . $idcu . '-' . $id . '/' . date('d-m-y');
        //dd($barcode );
        Tarjeta::create([
            'code' => $coding,
            'barCode' => $barcode,
            'user_id' => $id,
            'cuenta_id' => $idcu,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return Transaction::create([
            'cuenta_id' => $idcu,
            'monto' => $request['saldo'],
            'haber' => 0,
            'tipo' => 'Crédito',
            'servicio' => 'recargue',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        
    }

    public function profile()
    {
        return auth('api')->user();
    }

    public function profilandroid()
    {
        $android = User::where('cedula','10519606')->first();
        return $android;
    }
    
    public function updateProfile(Request $request)
    {
        
        $user = auth('api')->user();

        $this->validate($request, [  
            'phone' => 'required|max:12|unique:users,phone,'.$user->id,
            'password' => 'sometimes|required|min:5'
        ]);


        $currentPhoto = $user->avatar;

        if( $request->avatar != $currentPhoto )
        {
            $name = time().'.'.explode('/',explode(':',substr($request->avatar, 0, strpos($request->avatar, ';')))[1])[1];

            \Image::make($request->avatar)->save(public_path('img/profile/').$name);

            $request->merge(['avatar' => $name]);

            $userPhoto = public_path('img/profile/').$currentPhoto;
            if( file_exists($userPhoto) )
            {
                @unlink($userPhoto);
            }

        }


        if(!empty($request->password))
        {
            $request->merge(['password' => Hash::make($request['password'])]);
        }


        $user->update($request->all());

        return ['message'=> "Success"];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return DB::table('users')
            ->where('id', $id)
            ->update(['active' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $user = User::findOrFail($id);

        $this->validate($request, [
            'entity' => 'required|string|max:50',
            'name'    => 'required|string|max:50',
            'cedula'  => 'required|string|between:6,12|unique:users,cedula,'.$user->id,  
            'email'  => 'required|string|email|max:50|unique:users,email,'.$user->id,  
            'ru'     => 'required|max:10',
            'phone'   => 'required|max:10|unique:users,phone,'.$user->id,  
            'type'  => 'sometimes',  
        ]);

        $user->update($request->all());

        if($request->get('saldo') != ''){
             Cuenta::where('user_id',$id)->update(['saldo'=> $request->get('saldo')]);
        }
    
        return ['message' => 'Actualizar la información del usuario'];



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        return DB::table('users')
            ->where('id', $id)
            ->update(['active' => false]);

    }
}
