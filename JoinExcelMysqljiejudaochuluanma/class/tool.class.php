<?php
class StrTool
{ 
    function MbStrSplit ($str, $len=1) 
    {
        $start = 0;

        $strlen = mb_strlen($str);

        while ($strlen) 
        {
            $array[] = mb_substr($str,$start,$len,"utf8");
            $str = mb_substr($str, $len, $strlen,"utf8");
            $strlen = mb_strlen($str);
        }
        return $array;
    }

}