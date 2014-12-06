<?php
//asi se conecta por medio en base a objetos 
/*$conecta = new mysqli("localhost", "root", "", "phpobjetos");

if($conecta ==true )
{
    echo "Conectado";
}

*/

$conecta=mysql_connect('localhost','root',  '');
$db=mysql_select_db('cuestionario',$conecta) or die ('Error');


?>