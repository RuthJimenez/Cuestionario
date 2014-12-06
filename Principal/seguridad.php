<?php
$idu=$_COOKIE['idu'];/* SE RECIBE LA COOKIE QUE SE CREÓ EN EL INICIÓ DE SESIÓN*/
$acceso=$_COOKIE['acceso'];/* SE RECIBE LA COOKIE QUE SE CREÓ EN EL INICIÓ DE SESIÓN*/
if($idu=="" or $acceso=="")
{			/*SI ALGUNA DE LAS DOS ESTÁ VACÍA REDIRECCIÓNA A LA PÁGINA DE LOGIN*/
	print "<meta http-equiv='refresh' content='0;url=index.php'>";
	exit;
}

Session_start();
$idu2=$_SESSION['idu'];/* SE RECIBE LA SESIÓN QUE SE CREÓ EN EL INICIÓ DE SESIÓN*/
$acceso2=$_SESSION['acceso'];/* SE RECIBE LA SESIÓN QUE SE CREÓ EN EL INICIÓ DE SESIÓN*/
if($idu2=="" or $acceso2=="")
{	/*SI ALGUNA DE LAS DOS ESTÁ VACÍA REDIRECCIÓNA A LA PÁGINA DE LOGIN*/
	print "<meta http-equiv='refresh' content='0;url=index.php'>";
	exit;
}

?>