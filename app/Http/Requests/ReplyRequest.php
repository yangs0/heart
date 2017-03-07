<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
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
            "content"=>'required|min:2'
        ];
    }

    public function messages()
    {

        return [
            'content.required' => '填写的内容不能为空哦。',
            'content.min' => '填写的内容不能小于15个字。'
        ];
    }
}
