<?php

use App\Language;

function flash($title = null, $message = null){
    $flash = app('App\Http\Flash');
    if(func_num_args() == 0){
        return $flash;
    }
    return $flash->info($title, $message);
}

function language_flag($folder){
    $lang =  Language::whereFolder($folder)->first();
    if($lang)
        return $flag = $lang->flag;
    else
        return '';
}

function getFlag($folder){
    $lang = Language::whereFolder($folder)->first();
    return $flag = $lang->flag;
}
