<?php
include ('desencripta.php');

class Accesos {
	
	private $usuario;
	
	public function GeneraAcceso($idu){
	
		
	
	//decode_get($_SERVER["REQUEST_URI"]);/*LLAMA A LA FUNCION decode_get PARA DESENCRIPTAR */
								   /* 		LA INFORMACIÓN DEL USUARIO               */	


	////////////////////////////////////////////////////////////////////////////////////////
	//   En esta FUNCION MANDAMOS LAS RUTA CON EL VALOR NO USAMOS "REQUEST_URI"     ////////
	// 	 ya lo anterior pide la url que de te da tu servido, y como  AQUI lo     //////////
	////   mandamos  como cadena no es necesario poner el  "REQUEST_URI"       ////////////
	////////////////////////////////////////////////////////////////////////////////////////
	$usuario = decode_get($idu);
								   
	
	if($usuario=="")
		{
		
			$msg="";/*SI EL ID DEL USUARIO LLEGA VACÍO REDIRECCIONA AL LOGIN*/
			print "<meta http-equiv='refresh' content='0;url=index.php'>";
		}
		else
			{
			
			setCookie('idu',$usuario);
			setCookie('acceso',1); /* SI NO LLEGAN VACÍAS SE CREAN LAS COOKIES Y LAS SESIÓNES*/
			session_start();
			$_SESSION['idu']=$usuario;
			$_SESSION['acceso']=1;

			print "<meta http-equiv='refresh' content='0;url=menusistema.php'>";
			/*SE REDIRECCIONA A MENÚ SISTEMA*/
	
			}

	}
	

}

print "<meta http-equiv='refresh' content='0;url=index.php'>";

?>