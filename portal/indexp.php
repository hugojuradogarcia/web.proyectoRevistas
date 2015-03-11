<?php 
// Validar Session
require('../lib/status.php');

$status = new Status();
/* AUDITOR */
$status->auditor( $_SERVER['SCRIPT_NAME'] , 'INICIO' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba Login</title>
</head>
<body>
	<form action="actions/login.php" method="post" name="login">
		<input  name="email" id="email" placeholder="Email" required/>
		<input name="password" id="password" placeholder="Contraseña" required/>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>