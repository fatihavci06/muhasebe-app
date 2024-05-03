<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

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

        // Update işlemi için photo alanını zorunlu olmaktan çıkar
        if ($this->isMethod('PUT')) {
            $rules['password'] = 'nullable';
            $rules['email'] = 'required|email|unique:users,email,'.$this->id;

        
        } else {
            $rules['email'] = 'required|email|unique:users,email';
            $rules['password']='required';
            
        }

        
        return $rules;
    }
}
