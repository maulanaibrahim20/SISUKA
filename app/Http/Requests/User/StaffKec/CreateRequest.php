<?php

namespace App\Http\Requests\User\StaffKec;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'jabatan_kecamatan_id' => ['required', 'exists:jabatan_kecamatan,id'],
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
        } elseif ($errors->has('jabatan_kecamatan_id')) {
            $errorMessage = 'jabatan harus diisi.';
        } else {
            $errorMessage = 'Terdapat kesalahan pada input Anda.';
        }
        session()->flash('error', $errorMessage);
        return redirect()->back()->withInput();
    }
}
