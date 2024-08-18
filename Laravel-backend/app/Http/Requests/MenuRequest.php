<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class MenuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required|max:255',
            'description' => 'max:1000',
            'duration' => 'required|integer',
            'price' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'カテゴリーは必須です',
            'name.required' => 'メニュー名は必須です',
            'name.max' => 'メニュー名は255文字以内で入力してください',
            // 'description.required' => 'メニュー説明は必須です',
            'description.max' => 'メニュー説明は1000文字以内で入力してください',
            'duration.required' => '所要時間は必須です',
            'duration.integer' => '所要時間は整数で入力してください',
            'price.required' => '価格は必須です',
            'price.integer' => '価格は整数で入力してください',
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