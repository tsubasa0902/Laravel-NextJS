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
            'reservation_date' => 'required|date',
            'reservation_time' => 'required|date_format:H:i',
        ];
    }

    public function messages()
    {
        return [
            'menu_id.required' => 'メニューは必須です',
            'reservation_date.required' => '予約日は必須です',
            'reservation_date.date' => '有効な日付を入力してください',
            'reservation_time.required' => '予約時間は必須です',
            'reservation_time.date_format' => '有効な予約時間を入力してください',
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