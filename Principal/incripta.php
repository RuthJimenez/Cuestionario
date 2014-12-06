<?php

function encode_this($string)
{
    $string=utf8_encode($string);
    $control="tic";
    $string=$control.$string.$control;
    $string=base64_encode($string);
    return $string;
}
?>