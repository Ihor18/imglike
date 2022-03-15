<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class WatermarkRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'files'=> 'required|array',
            'files.*' =>'required|mimes:jpg,png,gif,bmp,webp,svg',
            'text' => 'required_without:watermark_file',
            'watermark_file'=> 'required_without:text',
            'position_x' => 'required|numeric',
            'position_y' => 'required|numeric'
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {

        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json([
            'errors' => ['field'=>'wrong type file or files']
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

}
