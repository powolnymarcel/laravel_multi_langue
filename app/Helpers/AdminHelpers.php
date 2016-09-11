<?php

if(!function_exists('rename_file')){
    function rename_file($filename, $mime){
        //remove firstextension
        $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
        $filename = str_slug($filename, "-");
        $filename = "/" .$filename. '__'. time(). '.' .$mime;
        return $filename;
    }
}
