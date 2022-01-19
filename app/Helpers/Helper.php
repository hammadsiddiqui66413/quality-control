<?php

namespace App\Helpers;

class Helper {

    public static function rand_string( $length ) 
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    }

    public static function rand_number( $length ) 
    {
        $nums = "0123456789";
        return substr(str_shuffle($nums),0,$length);
    }
    
}
