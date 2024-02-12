<?php

namespace App\Http\Requests\User\AdminKec;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',
            'email.required' => 'Email harus diisi.',
            'name.required' => 'Nama harus diisi.',
            'kecamatan.required' => 'Kecamatan harus diisi.',
        ];
    }

    public function failedValidation($validator)
    {
        $errors = $validator->errors();

        if ($errors->has('email')) {
            if ($errors->first('email') === 'Email sudah terdaftar, silakan gunakan email lain.') {
                $errorMessage = 'Email sudah terdaftar, silakan gunakan email lain.';
            } else {
                $errorMessage = 'Email harus diisi.';
            }
        } elseif ($errors->has('name')) {
            $errorMessage = 'Nama harus diisi.';
        } elseif ($errors->has('kecamatan')) {
            $errorMessage = 'Kecamatan harus diisi.';
        } else {
            $errorMessage = 'Terdapat kesalahan pada input Anda.';
        }

        session()->flash('error', $errorMessage);
        return redirect()->back()->withInput();
    }
}
