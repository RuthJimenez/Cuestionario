<?php
require ('header_login.php');

echo"<div class='panel panel-success'>
			 <div class='panel-heading' >
				  <h3 class='panel-title'>Inicio de Sesion</h3>
				</div>
				<div class='panel-body' >
    <form name='login' name='login'  action='validar.php' method='POST' aling='center'>
        <table class=\"table table-bordered\" >
        <tr> <td>USUARIO:</td><td><input type='text' name='user' required='required' /></td> </tr>
        <tr> <td>PASSWORD:</td><td><input type='password' name='password' required='required' /></td> </tr>
        <tr><td colspan='2'><input type='submit' name='SEGUIR' VALUE='ENTRAR'></td></tr>
        </table></div>";
		
			$mensaje =@$_REQUEST['msg'];
			ECHO ($mensaje);
		
 echo"<br></form>";

require ('footer.php');

?>
