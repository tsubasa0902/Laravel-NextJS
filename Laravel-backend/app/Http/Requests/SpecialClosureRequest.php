<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class SpecialClosureRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'office_id' => 'required',
            'closure_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'office_id.required' => '営業所は必須です。',
            'closure_date.required' => '休業日は必須です。',
            'closure_date.date' => '休業日は有効な日付で指定してください。',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'message' => '登録に失敗しました',
            'errors' => $validator->errors(),
        ], 422, [], JSON_UNESCAPED_UNICODE);

        throw new ValidationException($validator, $response);
    }
}