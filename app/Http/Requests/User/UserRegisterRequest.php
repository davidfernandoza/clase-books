<?php

namespace App\Http\Requests\User;

use App\Http\Requests\User\UserRequest;

class UserRegisterRequest extends UserRequest
{
    public function rules()
    {
        $this->rules['file'] = ['image', 'required'];
        return $this->rules;
    }

    public function messages()
    {
        $this->messages['file.image'] = 'La foto debe de ser una imagen valida.';
        $this->messages['file.required'] = 'La foto es requerida.';
        return $this->messages;
    }
}
