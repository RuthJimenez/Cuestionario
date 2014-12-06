<?php

include('DB.php');
Class Cuestionario{
	
	public function Mensaje(){
	$mensaje= " <div class='alert alert-success' role='alert'>
        <strong>Por favor </strong> Contesta las siguiestes preguntas
      </div> ";
	 return $mensaje;
	}
	
	public function Total(){
	
		$sql="SELECT COUNT(Preguntas) as p FROM preguntas";
		$query=mysql_query($sql);
		$result=mysql_result($query,0,'p');
		return $result;
	}
	
	public function Respuestas($idr,$idu,$identificador){
		$contador=1;
		$cadena='';
		while($contador <=3){
		
				$total = rand(1,10); 
				
				if($contador == 1)
				{
					$sql="SELECT * FROM respuestas WHERE idr=$idr";
					$query=mysql_query($sql);
					$result=mysql_result($query,0,'Respuestas');
					$idres=mysql_result($query,0,'idr');
					$anser = utf8_encode ($result);
					$cadena .="<input type='radio' name='respu".$identificador."' value='$idres'>".$anser."<br>";
					
					$contador = $contador + 1;
					
					$sqlInsert="INSERT INTO repetidas_respuestas (numero,idu) VALUES ($idr,$idu);";
					$queryInsert=mysql_query($sqlInsert);
				}
				else{
					$sql4="SELECT * FROM repetidas_respuestas WHERE numero=$total and idu=$idu";
					$query4=mysql_query($sql4);
					$existe=mysql_num_rows($query4);
					
					if($existe == 0)
					{
						$sql="SELECT * FROM respuestas WHERE idr=$total";
						$query=mysql_query($sql);
						$result=mysql_result($query,0,'Respuestas');
						$idres=mysql_result($query,0,'idr');
						$anser = utf8_encode ($result);
						$cadena .="<input type='radio' name='respu".$identificador."' value='$idres'>".$anser."<br>";
					
						$contador = $contador + 1;
						
						$sqlInsert="INSERT INTO repetidas_respuestas (numero,idu) VALUES ($total,$idu);";
						$queryInsert=mysql_query($sqlInsert);
						
						
					}else{
						
					}
					
				}
			
		}
		return $cadena;
	}
	
	public function seleccionar($cuenta){
		$contador=1;
		
		
		$idu=$_COOKIE['idu'];
		
		while($contador <=5){
		
				$total = rand(1,$cuenta); 
				
				if($contador == 1)
				{
					$sql="SELECT * FROM preguntas WHERE idp=$total";
					$query=mysql_query($sql);
					$result=mysql_result($query,0,'Preguntas');
					$idr=mysql_result($query,0,'idr');
					$Preguntas = utf8_encode ($result);
					echo $Preguntas."<br>";
					$anser = $this -> Respuestas($idr,$idu,$contador);
					echo $anser;
					
					$contador = $contador + 1;
					
					$sqlInsert="INSERT INTO repetidas (numero,idu) VALUES ($total,$idu);";
					$queryInsert=mysql_query($sqlInsert);
				}
				else{
					$sql4="SELECT * FROM repetidas WHERE numero=$total and idu=$idu";
					$query4=mysql_query($sql4);
					$existe=mysql_num_rows($query4);
					
					if($existe == 0)
					{
						$sql="SELECT * FROM preguntas WHERE idp=$total";
						$query=mysql_query($sql);
						$result=mysql_result($query,0,'Preguntas');
						$idr=mysql_result($query,0,'idr');
						$Preguntas = utf8_encode ($result);
						echo "<br>".$Preguntas."<br>";	
						$anser = $this -> Respuestas($idr,$idu,$contador);
						echo $anser;
						
						$sqlInsert="INSERT INTO repetidas (numero,idu) VALUES ($total,$idu);";
						$queryInsert=mysql_query($sqlInsert);
						$contador = $contador + 1;
						
					}else{
						
					}
					
				}
			
			$Deleterr="DELETE FROM repetidas_respuestas WHERE idu=$idu";
			$queryRR=mysql_query($Deleterr);
			
		}
		
	}
}

?>