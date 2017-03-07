<?php

function navViewActive($anchor)
{
    return \Route::currentRouteName() == $anchor ? 'active' : '';
}
