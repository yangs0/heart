<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeRequest extends FormRequest
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
            'name'=>'required|unique:themes',
            'image'=>'required',
            'intro'=>'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'主题名称不能为空.',
            'name.unique'=>'主题名称已经存在.',
            'image.required'=>'请为主题添加一张图片吧.',
            'intro.required'=>'主题描述，不要为空',
            'intro.min'=>'主题描述不能小于10个字'
        ];
    }
}
