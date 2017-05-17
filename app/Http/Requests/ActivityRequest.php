<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
            'title'=>'required|min:5|max:50',
            'content'=>'required|min:15',
            'cover'=>'required|image|between:0,3072'
        ];
    }

    public function messages()
    {

        return [
            'title.required' => '精彩的活动，需要有一个精彩的标题哦。',
            'title.min' => '亲，你这标题有点短哦',
            'title.max' => '亲，你这标题太长了吧。',
            'content.required' => '填写的内容不能为空哦。',
            'content.min' => '填写的内容不能小于15个字。',
            'cover.required' => "请设置一张封面好吗",
            'cover.image' => "请上传正确的图片格式(png,gif,jpg,jpeg)",
            'cover.between' => "图片大小不要超过3M",
        ];
    }
}
