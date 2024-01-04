<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegistroRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'name' => ['required', 'string'],
      'email' => ['required', 'email', 'unique:users,email'],
      'password' => [
        'required',
        'confirmed',
        PasswordRules::min(8)
          ->letters()
          ->numbers()
      ],
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'El nombre es requerido',
      'email.required' => 'El correo electrónico es requerido',
      'email.email' => 'El correo electrónico no es válido',
      'email.unique' => 'El correo electrónico ya está registrado',
      'password.required' => 'La contraseña es requerida',
      'password.confirmed' => 'Las contraseñas no coinciden',
      'pasword' => 'La contraseña debe tener al menos 8 caracteres, una letra y un número',
    ];
  }
}
