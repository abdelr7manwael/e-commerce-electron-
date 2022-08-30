<?php
namespace helpers;
class Str 
{
    
    public static function limit($str){

        if(strlen($str)>20){
            $str = substr($str,0,100).' ...';

        }

        return $str;
    }
}

?>