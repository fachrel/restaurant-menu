<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $userId = $this->route('user'); 
    
        $rules = [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
            'username' => 'required|string|max:255|unique:users,username,' . $userId,
            'password' => 'required|confirmed|string|min:6',
        ];
    
        if ($this->isMethod('put')) {
            $rules['old_password'] = 'required|string|min:6';
            $rules['password'] = 'required|confirmed|string|min:6';
        }
    
        return $rules;
    }
}
