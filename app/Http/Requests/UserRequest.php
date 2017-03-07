<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public $allowed_fields = [
        'name', 'city', 'school','sex', 'intro', 'password'
    ];
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
            'name'      => 'max:20',
            'city'      => 'max:10',
            'school'    => 'max:10',
            'intro'     => 'max:50',
            'password'  => 'sometimes|same:password_confirm|min:6'
        ];
    }

    public function messages()
    {
        return [
            'name.unique'=>'不好啦，昵称已被注册',
            'name.max'=>'这，这，这昵称有点长了吧',
            'city.max'=>'别骗我了，城市名称那么长',
            'school.max'=>'你又想骗我，学校的名称哪样这么长打',
            'intro.max'=>'自我介绍，一句话就好啦',
            'password.same'=>'新的密码跟确认密码不一致耶',
            'password.min'=>'新密码请不要小于6位'
        ];
    }

    public function performUpdate(User $user)
    {
        $data = array_filter($this->only($this->allowed_fields));

        if (isset($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        return $user;
    }
}
