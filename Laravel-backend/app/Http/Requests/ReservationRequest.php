<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'menu_id' => 'required',
            'reservation_datetime' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'menu_id.required' => 'メニューは必須です',
            'reservation_datetime.required' => '予約日は必須です',
            'reservation_datetime.date' => '予約日は有効な日付形式で入力してください',
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