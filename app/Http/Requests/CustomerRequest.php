<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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

        $rules = [
            'customer_type' => 'required|in:0,1',
        ];

        // Update işlemi için photo alanını zorunlu olmaktan çıkar
        if ($this->isMethod('PUT')) {
            $rules['photo'] = 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048';
        } else {
            $rules['photo'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        if ($this->input('customer_type') == 0) {
            $rules = array_merge($rules, [
                'name' => 'required',
                'surname' => 'required',
                'birthday' => 'required',
                'tc_no' => 'required',
            ]);
        } elseif ($this->input('customer_type') == 1) {
            $rules = array_merge($rules, [
                'company_name' => 'required',
                'tax_number' => 'required',
                'tax_office' => 'required',
            ]);
        }

        return $rules;
    }
}
