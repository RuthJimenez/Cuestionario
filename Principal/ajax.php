<!--script src="jquery.min.js"></script-->
<?php
require ('Cuestionario.php');

$cuestionario = new Cuestionario();

$acomuladorPOSITIVO=0;
$acomuladorNEGATIVO=0;

for($y=0;$y<5;$y++){

$preguntas=$_REQUEST['pregu'.$y];
	
$respuestas =@$_REQUEST['respu'.$y];

	if($respuestas ==" " OR $respuestas == NULL){
		$respuestas=0;
	}

	if($respuestas == $preguntas){
		$acomuladorPOSITIVO = $acomuladorPOSITIVO + 1;
	}
	else{
		$acomuladorNEGATIVO = $acomuladorNEGATIVO + 1;
	}
	
}

echo "&nbsp;&nbsp;&nbsp;<font color='black'> Respuestas Acertadas: </font><b>".$acomuladorPOSITIVO."</b><br>
	  &nbsp;&nbsp;&nbsp;<font color='red'> Errores: </font><b>".$acomuladorNEGATIVO."</b><br>";

$idu=$_COOKIE['idu'];

$sql="SELECT * FROM usuarios WHERE idu=$idu";
$query = mysql_query($sql);
$aciertos = mysql_result($query,0,'aciertos');
if($aciertos > 0){
	if($acomuladorPOSITIVO > $aciertos){
		$sqlinserta="UPDATE usuarios SET  aciertos=$acomuladorPOSITIVO WHERE idu=$idu";
		$queryInserta = mysql_query($sqlinserta);
	}
}
else{
$sqlinserta="UPDATE usuarios SET  aciertos=$acomuladorPOSITIVO WHERE idu=$idu";
$queryInserta = mysql_query($sqlinserta);

}

//




?>