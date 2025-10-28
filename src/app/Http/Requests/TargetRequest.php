<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TargetRequest extends FormRequest
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
            'target_weight' => [
                'required',
                'numeric',
                'between:0,999.9',
                'regex:/^\d{1,3}(\.\d{0,1})?$/'
            ],
        ];
    }

    public function messages()
    {
        return [
            'target_weight.required' => '体重を入力してください',
            'target_weight.numeric' => '体重は数字で入力してください。',
            'target_weight.between' => '体重は4桁以下で入力してください。',
            'target_weight.regex' => '体重は小数点1桁までで入力してください。',
        ];
    }
}
