<?php
require('seguridad.php');
require ('header.php');
require ('Cuestionario.php');

$cuesti = new Cuestionario();

$msj=$cuesti->Mensaje();
echo($msj);

$preguntas =$cuesti->seleccionar();

// crear una division que se llame ajax, debe de ir antes o despues del formulario-->
echo"<div id='ajax'> </div>";


//Crear el codigo de ejecucion de ajax-->
echo"<script type='text/javascript'>
$(function (e) {
	$('#FORMcuestionario').submit(function (e) {
		e.preventDefault()
		$('#ajax').load('ajax.php?' + $('#FORMcuestionario').serialize())
	})
})
</script>";

require ('footer.php');
?>