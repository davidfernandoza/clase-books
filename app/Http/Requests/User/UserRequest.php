<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{


    protected $messages = [
        'name.required' => 'Los nombres son requeridos.',
        'name.string' => 'Los nombres deben ser alfabeticos.',

        'last_name.required' => 'Los apellidos deben ser alfabeticos.',
        'last_name.string' => 'Los apellidos son requeridos.',

        'number_id.required' => 'La cedula es requerida.',
        'number_id.numeric' => 'La cedula debe de ser numerica',
        'number_id.unique' => 'La cedula ya fue tomada.',

        'email.required' => 'El correo electrónico es requerido.',
        'email.email' => 'El correo electrónico debe de ser valido.',
        'email.unique' => 'El correo electrónico ya fue tomado.',

        'password.required' => 'La contraseña es requerida.',
        'password.string' => 'La contraseña debe de ser alfanumerica.',
        'password.min' => 'La contraseña debe de tener un minimo de 8 caracteres.',
        'password.confirmed' => 'La contraseña y la confirmación no son iguales.',

        'role.required' => 'El role es requerido.',
        'role.string' => 'El role debe de ser alfanumerico.',
        'role.in' => 'El role no esta en la lista aceptada.',
    ];

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

		$rules = [
			'name' => ['required', 'string'],
			'last_name' => ['required', 'string'],
			'number_id' => ['required', 'numeric', 'unique:users,number_id'],
			'email' => ['required', 'email', 'unique:users,email'],
			'password' => ['required', 'confirmed', 'string', 'min:8'],
		];

        if ($this->method() == 'PUT') {
            $rules['number_id'] = ['required', 'numeric', 'unique:users,number_id,' . $this->user->id];
            $rules['email'] = ['required', 'email', 'unique:users,email,' . $this->user->id];
            $rules['password'] = ['nullable', 'confirmed', 'string', 'min:8'] ;
        }



        if ($this->path() != 'api/register') {
            $rules['role'] = ['required', 'string', 'in:user,admin,librarian'];
        }
        return $rules;
    }

    public function messages()
    {
        return $this->messages;
    }
}
