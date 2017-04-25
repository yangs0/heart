<?php

function navViewActive($anchor)
{
    return \Route::currentRouteName() == $anchor ? 'active' : '';
}

function showFr($cur, $other)
{
    return $cur == $other ? 'fr' : '';
}
