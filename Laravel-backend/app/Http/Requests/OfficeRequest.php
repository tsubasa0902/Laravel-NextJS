<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule; // 追加

class OfficeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
          // 更新時には、現在のレコードのIDを取得してユニークバリデーションから除外
        $officeId = $this->route('office'); // ルートからofficeのIDを取得
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'tel' => 'required|max:20',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('offices')->ignore($officeId), // 現在のレコードを除外
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '営業所名は必須です。',
            'name.max' => '営業所名はは255文字以内で入力してください',
            'address.required' => '住所は必須です。',
            'address.max' => '住所は255文字以内で入力してください',
            'tel.required' => '電話番号は必須です。',
            'tel.max' => '電話番号は20文字以内で入力してください',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => '有効なメールアドレス形式でで入力してください',
            'email.max' => 'メールアドレスはは255文字以内で入力してください',
            'email.unique' => 'そのメールアドレスは既に使用されています。',
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
