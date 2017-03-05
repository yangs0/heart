<div class="padding-md whitebk">
    <div class="list-group text-center">
        <a class="list-group-item {{navViewActive('users.edit')}}" href="{{route('users.edit', $user->id)}}">
            <i class="text-md fa fa-list-alt" ></i>
            个人信息
        </a>
        <a class="list-group-item {{navViewActive('users.edit_link')}}" href="{{route('users.edit_link', $user->id)}}">
            <i class="text-md fa fa-link" ></i>
            帐号关联
        </a>
        <a class="list-group-item {{navViewActive('users.edit_pwd')}}" href="{{route('users.edit_pwd', $user->id)}}">
            <i class="text-md fa fa-paste"></i>
            密码修改
        </a>
    </div>
</div>