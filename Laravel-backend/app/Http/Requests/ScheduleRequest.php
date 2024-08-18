<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ScheduleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required|integer',
            'date' => 'date',
            'day_of_week' => 'integer|between:0,6',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'max_reservations_per_hour' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'スケジュールの種類は必須です',
            'type.integer' => 'スケジュールの種類は整数で入力してください',
            'date.date' => '有効な日付を入力してください',
            'day_of_week.between' => '曜日は0から6の間で指定してください',
            'start_time.required' => '営業開始時間は必須です',
            'start_time.date_format' => '開始時間は有効な時間形式（例: HH:MM）で入力してください',
            'end_time.required' => '営業終了時間は必須です',
            'end_time.date_format' => '営業終了時間は有効な時間形式（例: HH:MM）で入力してください',
            'max_reservations_per_hour.required' => '最大予約数は必須です',
            'max_reservations_per_hour.integer' => '最大予約数は整数で入力してください',
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