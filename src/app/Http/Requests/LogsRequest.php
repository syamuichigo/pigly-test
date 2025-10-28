<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required',
            'weight' => [
                'required',
                'numeric',
                'between:0,999.9',
                'regex:/^\d{1,3}(\.\d{0,1})?$/'
            ],
            'calories' => 'required|integer',
            'exercise_time' => 'required',
            'exercise_content' => 'max:120'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',

            'weight.required' => '体重を入力してください',
            'weight.numeric' => '体重は数字で入力してください。',
            'weight.between' => '体重は4桁以下で入力してください。',
            'weight.regex' => '体重は小数点1桁までで入力してください。',

            'calories.required' => '摂取カロリーを入力してください',
            'calories.integer' => '摂取カロリーは数字で入力してください。',

            'exercise_time.required' => '運動時間を入力してください',

            'exercise_content' => '120文字以内で入力してください'
        ];
    }
}
