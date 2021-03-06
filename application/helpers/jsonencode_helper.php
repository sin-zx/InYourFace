<?php

defined('BASEPATH') OR exit('No direct script access allowed');
function my_json_encode($value)
{
    if (version_compare(PHP_VERSION,'5.4.0','<'))
    {
        $str = json_encode($value);
        $str = preg_replace_callback(
                                    "#\\\u([0-9a-f]{4})#i",
                                    function($matchs)
                                    {
                                         return iconv('UCS-2BE', 'UTF-8', pack('H4', $matchs[1]));
                                    },
                                     $str
                                    );
        return $str;
    }
    else
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}

function changestr($str){
    $t1 = substr($str, 0,2);
    $t2 = substr($str, 2,2);
    $t3 = substr($str, 4,2);
    $t4 = substr($str, 6,1);
    return $t1.'-'.$t2.'-'.$t3.'-'.$t4;
}