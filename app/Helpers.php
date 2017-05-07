<?php

function navViewActive($anchor)
{
    return \Route::currentRouteName() == $anchor ? 'active' : '';
}

function showFr($cur, $other){
    return $cur == $other ? 'fr' : '';
}

function navViewActiveByParams($anchor, $param){
    return route($anchor, $param) == route($anchor, \Route::input('type')) ? 'active' : '';
}

function readActive($status){
    return $status? '':"new";
}
function readActiveClass($status){
    return $status? 'read':"unRead";
}
