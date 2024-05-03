<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
class OfferRequest extends FormRequest
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
            'name.*'=>'required',
            'price.*'=>'numeric|required',
            'quantity.*'=>'numeric|required'

        ];
    }
    public function messages()
    {
        $messages = [];
        $index = 1;

        foreach ($this->input('name', []) as $key => $value) {
            $messages["name.$key.required"] = "$index. satır kalem name zorunludur";
            $messages["quantity.$key.required"] = "$index. satır quantity alanı zorunludur";
            $messages["quantity.$key.numeric"] = "$index. satır quantity alanı sadece sayısal değerler içermelidir";
            $messages["price.$key.required"] = "$index. satır price alanı zorunludur";
            $messages["price.$key.numeric"] = "$index. satır price alanı sadece sayısal değerler içermelidir";
            $index++;
        }
      

      

        return $messages;
    
}
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
