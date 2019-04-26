<?php

namespace UatfTransport\Http\Controllers\API;

use Illuminate\Http\Request;
use UatfTransport\Http\Controllers\Controller;
use UatfTransport\User;
use UatfTransport\Message;
use UatfTransport\Notifications\MessageSent;
use Auth;

class MessageController extends Controller
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
       // return User::where('cedula','!=','10519606')->orderBy('id','DESC')->get(['id','name','entity']);
       return User::where('id','!=',auth()->id())->orderBy('id','DESC')->get(['id','name','entity']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'recipient_id' => 'required|exists:users,id'
        ]);

        $userid = Auth::user();
        $mensaje = Message::create([
            'sender_id'  => $userid->id,
            'recipient_id' => $request->recipient_id,
            'body' => $request->body
        ]);  

        $recipient = User::find($request->recipient_id);

        $recipient->notify(new MessageSent($mensaje));

        return ['message' => 'mensaje enviado'];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //$message = Message::findOrFail($id);
       //return $message;
       return Message::findOrFail($id);
         //  return ['message' => 'Llegasta aqui lupe'];
        //return view('layouts.mensaje', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

    }
}
