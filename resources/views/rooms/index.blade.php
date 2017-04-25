@extends('layouts.default')

@section('content')
    <div class="jumbotron" style="background: rgba(0, 0, 0, 0) url('/uploads/banner/1481865834039_39.jpg') no-repeat scroll center top / cover ;margin-top: -26px;height:200px;position: relative">
        dd
    </div>


    <div class="container">
        <div class="whitebk">
            <div class="curtitle">
                <span class="leftplay"></span>
                <em>上周热心榜</em>
                <span class="rightplay"></span>
            </div>
            <ul class="homeperlist clearfix">
                <li class="bordern">
                <span class="photoTop">
                    <a href="http://my.csdn.net/dandingdeyun" target="_blank">
                        <img alt="" class="img-circle" src="http://img.knowledge.csdn.net/upload/expert/1471418384993_993.jpg" width="80" height="80">
                    </a>
                </span>
                    <span class="bottomText">
                    <a class="title" href="http://my.csdn.net/dandingdeyun" target="_blank">王通</a>
                    <em>上周收录审核</em>
                    <b>980</b>
                    <i class="number hotnum hotnum1">1</i>
                </span>
                </li>

            </ul>
        </div>
    </div>
@endsection
