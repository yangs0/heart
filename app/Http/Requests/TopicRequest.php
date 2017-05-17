<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
            'type'=>'required|in:original,reprint,question,video',
            'title'=>'required|min:5|max:50',
            'theme_id'=>'required'
        ];
    }

    public function withValidator($validator){
        $validator->sometimes(['source', 'sourceUrl'], 'required', function($input) {
            return $input->type == 'video' || $input->type == 'reprint';
        });
        $validator->sometimes('figure', 'required|image|between:0,3072', function($input) {
            return $input->type != 'question';
        });
        $validator->sometimes('summary', 'required|max:225', function($input) {
            return $input->type != 'question';
        });
        $validator->sometimes('content', 'required|min:15', function($input) {
            return $input->type != 'video';
        });
    }

    public function messages()
    {
         /*[
            'type.required'=>'话题类型不能为空',
            'type.between'=>'请勿非法操作，请选择合适打话题类型',
            'title.required'=>'标题不能为空哦',
            'title.min'=>'标题不能为空哦',
            'title.max'=>'标题不能不要太长哦',
            'theme.required'=>'话题主题不能为空',
            'tags.exists'=>'分类不存在',
        ];*/
        return [
            'type.required'=>'话题类型不能为空',
            'type.in'=>'请勿非法操作，请选择合适的话题类型',
            'title.required'=>'标题不能为空哦',
            'title.min'=>'标题不能为空哦',
            'title.max'=>'标题不能不要太长哦',
            'theme_id.required'=>'话题主题不能为空',
            'tags.exists'=>'分类不存在',

            'figure.required' => "请设置一张封面好吗",
            'figure.image' => "请上传正确的图片格式(png,gif,jpg,jpeg)",
            'figure.between' => "图片大小不要超过3M",
            'summary.required' => '请简单的概述下吧',
            'summary.max' => '概述的内容请不要太多。',
            'source.required' => '请填写信息来源。',
            'sourceUrl.required' => '信息URL来源不能为空。',

            'content.required' => '填写的内容不能为空哦。',
            'content.min' => '填写的内容不能小于15个字。'
        ];
    }

    //  由于数据库字段并不做隐藏，该功能暂时不做
   /* public function transFromData(){
        $data = $this->except('_token');
        return [
            'title'=>$data['title'],
            'type'=>$data['type'],
            'summary'=>$data['summary'],
            'source'=>$data['summary'],
            'sourceUrl'=>$data['sourceUrl'],
            'content'=>$data['content'],
        ];
    }*/
}
