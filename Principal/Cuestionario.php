<?php
require_once('seguridad.php');
//require('respuestas.php');
include('DB.php');
Class Cuestionario{
	
	public function Mensaje(){
	$mensaje= " <div class='alert alert-success' role='alert'>
        <strong>Por favor </strong> Contesta las siguiestes preguntas
      </div> ";
	 return $mensaje;
	}
	
	public function Respuestas($idr,$idu,$identificador){
		$contador=1;
		$cadena='';
		
		$sqlInsert="INSERT INTO repetidas (numero,idu) VALUES ($idr,$idu);";
		$queryInsert=mysql_query($sqlInsert);
		
		while($contador <=2){
		
			$aleatorio = rand(1,10); 
			
			$sql4="SELECT * FROM repetidas WHERE numero=$aleatorio and idu=$idu";
			$query4=mysql_query($sql4);
			$existe=mysql_num_rows($query4);
			

			if($existe == 0)
			{
				
				$sqlInsert="INSERT INTO repetidas (numero,idu) VALUES ($aleatorio,$idu);";
				$queryInsert=mysql_query($sqlInsert);
				
				$contador = $contador + 1;
				
			}else{
				
			}
		}
		
		
		$sql="SELECT numero FROM repetidas ORDER BY RAND() LIMIT 3";
		$query=mysql_query($sql);
		$cuenta=mysql_num_rows($query);
		for($y=0;$y<$cuenta;$y++){
			
			$numero=mysql_result($query,$y,'numero');
			
			$sqlRespuesta="SELECT * FROM respuestas WHERE idr=$numero";
			$queryRespuesta=mysql_query($sqlRespuesta);
			$cuentaRes=mysql_num_rows($queryRespuesta);
			for($x=0;$x<$cuentaRes;$x++){
			
				$result=mysql_result($queryRespuesta,$x,'Respuestas');
				$idres=mysql_result($queryRespuesta,$x,'idr');
				$anser = utf8_encode ($result);
				$cadena .="<input type='radio' name='respu".$identificador."' value='$idres'>".$anser."<br>";
				
			}
		}
		
		return $cadena;
	}
	
	public function seleccionar(){
			
		$idu=$_COOKIE['idu'];
		
		$sql="SELECT * FROM preguntas ORDER BY RAND() LIMIT 5";
		$query=mysql_query($sql);
		$cuenta=mysql_num_rows($query);
		echo "<div class='row'> <div class='col-md-6'><form action='menusistema.php' method='POST' name='FORMcuestionario' id='FORMcuestionario' target='_self'>
		<table class='table table-striped' >";
		for($y=0;$y<$cuenta;$y++){
			$result=mysql_result($query,$y,'Preguntas');
			$idr=mysql_result($query,$y,'idr');
			$idp=mysql_result($query,$y,'idp');
			
			$Preguntas = utf8_encode ($result);
			echo "<tr><td>".$Preguntas."</td></tr>";
			$anser = $this -> Respuestas($idr,$idu,$y);
			echo "<tr><td>".$anser." <input type='hidden' name='pregu".$y."' value='$idp' readonly></td></tr>";
			$Deleterr="DELETE FROM repetidas WHERE idu=$idu";
			$queryRR=mysql_query($Deleterr);
			
		}
		
		echo "<tr><td align='center'><input type='submit' name='enviar'></td></tr></form></table></div></div>";
		
	}
	
	/*public function Inserta(){
			
		$idu=$_COOKIE['idu'];
		
		$sql="SELECT * FROM preguntas ORDER BY RAND() LIMIT 5";
		$query=mysql_query($sql);
		$cuenta=mysql_num_rows($query);
		echo "<div class='row'> <div class='col-md-6'><form action='menusistema.php' method='POST' name='FORMcuestionario' id='FORMcuestionario' target='_self'>
		<table class='table table-striped' >";
		for($y=0;$y<$cuenta;$y++){
			$result=mysql_result($query,$y,'Preguntas');
			$idr=mysql_result($query,$y,'idr');
			$idp=mysql_result($query,$y,'idp');
			
			$Preguntas = utf8_encode ($result);
			echo "<tr><td>".$Preguntas."</td></tr>";
			
			$anser = $this -> Respuestas($idr,$idu,$y);
			
			echo "<tr><td>".$anser." <input type='hidden' name='pregu".$y."' value='$idp' readonly></td></tr>";
			$Deleterr="DELETE FROM repetidas WHERE idu=$idu";
			$queryRR=mysql_query($Deleterr);
			
		}
		
		echo "<tr><td align='center'><input type='submit' name='enviar'></td></tr></form></table></div></div>";
		
	}*/
}
?>