<?php 
// Validar Session
require('actions/status.php');

$status = new Status();
$status->auditor( $_SERVER['SCRIPT_NAME'] , 'INICIO' );
/*require('actions/status.php');

$route 	= $_SERVER['SCRIPT_NAME'] ;
$page 	= 'INICIO' ;
status( $route, $page );*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba Login</title>
</head>
<body>
	<form action="actions/login.php" method="post" name="login">
		<input  name="email" id="email" placeholder="Email"/>
		<input name="password" id="password" placeholder="Contraseña"/>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>