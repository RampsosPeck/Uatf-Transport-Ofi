<?php

namespace UatfTransport\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

        /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            
            'name'   => 'required|regex:/^[a-z ñáéíóú . ]+$/i|max:50',
            'email'   => 'max:50|unique:users,email',  
            'entity' => 'required|regex:/^[a-z ñáéíóú -_ . ]+$/i|max:50',
            'cedula'  => 'required|regex:/^[0-9 A-Z a-z]+$/i|between:6,10|unique:users,cedula', 
            'phone'   => 'required|max:10|unique:users,phone',
            'genero'   => 'required|max:15',
            'ru'     => 'required|required|max:10|unique:users,ru',
            'saldo'  => 'required',   
            'type'  => 'required|in:Jefatura,Supervisor,Docente,Estudiante,Conductor,Portero,Administrativo',  

        ];

        if($this->method() !== 'POST')
        {
            $rules = [
                'entity' => 'required|regex:/^[a-z ñáéíóú -_ . ]+$/i|max:50',
                'name'    => 'required|regex:/^[a-z ñáéíóú . ]+$/i|max:50',
                'cedula'  => 'required|regex:/^[0-9 A-Z a-z]+$/i|between:6,10',  
                'ru'     => 'required|max:10',
                'phone'   => 'required|max:10'  
            ];
        }
        return $rules;
        
    }
    public function messages()
    {
        return [
                'entity.regex'      => 'En la entidad del usuario solo se aceptan letras y puntos.',
                'entity.required'   => 'La entidad es obligatorio.',
                'name.regex'         => 'En el nombre completo solo se aceptan letras y puntos.',
                'name.required'      => 'En el nombre completo es obligatorio.',
                'cedula.regex'       => 'En la cédula solo se aceptan números y/o letras.',
                'celula.required'    => 'La cédula del usuario es obligatorio.',
                'cedula.between'     => 'La cédula del usuario debe contener entre 6 y 10 caracteres.',
                'cedula.unique'      => 'El usuario con está cédula ya fue registrado.',   
                'active.required'    => 'El permiso es obligatorio.',
                'type.required'   => 'El tipo de usuario es obligatorio.',   


        ];
    }
}
