<?php

namespace App\Http\Requests\User\AdminDes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class CreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'desa' => ['required', 'string', 'max:255'],
        ];
    }

    public function failedValidation($validator)
    {
        $errors = $validator->errors();

        if ($errors->has('email')) {
            $errorMessage = 'Email sudah terdaftar, silakan gunakan email lain.';
        } elseif ($errors->has('name')) {
            $errorMessage = 'Nama harus diisi.';
        } elseif ($errors->has('password')) {
            $errorMessage = 'Password harus diisi.';
        } elseif ($errors->has('desa')) {
            $errorMessage = 'Desa harus diisi.';
        } else {
            $errorMessage = 'Terdapat kesalahan pada input Anda.';
        }

        session()->flash('error', $errorMessage);
        return redirect()->back()->withInput();
    }
}
