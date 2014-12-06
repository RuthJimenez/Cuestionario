<?php
	setCookie('idu',"");
	setCookie('acceso',"");
	session_start();
	session_unset();
	session_destroy();
	$msg='Sesion terminada';
	print "<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>";
?>