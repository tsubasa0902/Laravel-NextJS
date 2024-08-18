<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'カテゴリー名は必須です',
            'name.max' => 'カテゴリー名は255文字以内で入力してください',
            'description.max' => 'カテゴリーの説明は1000文字以内で入力してください',
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
