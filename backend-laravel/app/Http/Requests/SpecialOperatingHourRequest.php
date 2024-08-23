<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class SpecialOperatingHourRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'office_id' => 'required',
            'special_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ];
    }

    public function messages()
    {
        return [
            'office_id.required' => '営業所は必須です。',
            'special_date.required' => '特別営業日は必須です。',
            'special_date.date' => '特別営業日は有効な日付で指定してください。',
            'start_time.required' => '開始時間は必須です。',
            'start_time.date_format' => '開始時間は「HH:MM」の形式で指定してください。',
            'end_time.required' => '終了時間は必須です。',
            'end_time.date_format' => '終了時間は「HH:MM」の形式で指定してください。',
            'end_time.after' => '終了時間は開始時間より後でなければなりません。',
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