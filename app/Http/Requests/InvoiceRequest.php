<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
class InvoiceRequest extends FormRequest
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
            'faturaNo'=>'required' ,
            'faturaTarih'=>'required' ,
            'musteriId'=>'required',
            'kalem.*'=>'required',
            'adet.*'=>'required',
            'urun.*'=>'required',
            'tutar.*'=>'numeric|required',
            'invoice_type'=>'required'

        ];

    }
   

    public function messages()
    {
        $messages = [];
        $index = 1;

        foreach ($this->input('kalem', []) as $key => $value) {
            $messages["kalem.$key.required"] = "$index. satır kalem alanı zorunludur";
            $messages["adet.$key.required"] = "$index. satır adet alanı zorunludur";
            $messages["urun.$key.required"] = "$index. satır ürün alanı zorunludur";
            $messages["tutar.$key.required"] = "$index. satır tutar alanı zorunludur";
            $messages["tutar.$key.numeric"] = "$index. satır tutar alanı sadece sayısal değerler içermelidir";
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
