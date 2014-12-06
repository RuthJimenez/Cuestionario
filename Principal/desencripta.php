<?php

function decode_get($string)
{
    $cad=explode("?",$string);
    $string=$cad[1];
    $string=base64_decode($string);
    $control="tic";
    $string=str_replace($control,"","$string");
   	$cad_get=explode("&",$string);
    foreach($cad_get as $value)
    {
        $val_get=explode("=",$value);
		
        $val=$_GET[$val_get[0]]=utf8_decode($val_get[1]);
    }
	
	return $val;
	
	
	///ORIGINAL======================================
	/*
	$cad=explode("?",$string);
    $string=$cad[1];
    $string=base64_decode($string);
    $control="tic";
    $string=str_replace($control,"","$string");
    $cad_get=explode("&",$string);
    foreach($cad_get as $value)
    {
        $val_get=explode("=",$value);
        $_GET[$val_get[0]]=utf8_decode($val_get[1]);
    }*/
}

?>