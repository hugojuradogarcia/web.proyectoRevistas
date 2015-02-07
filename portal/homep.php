<?php 
// Validar Session
require_once('actions/status.php');

$status = new Status();
$status->state( $_SERVER['SCRIPT_NAME'] , 'HOME' );


/*$route 	= $_SERVER['SCRIPT_NAME'] ;
$page 	= 'HOME' ;
status( $route, $page );
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
</head>
<body>
	<a class="btn-salir" id="btn-salir" href="actions/logout.php">Salir <span><?php echo $_SESSION["user"]; ?></span></a>
	<p><?php echo session_id(); ?></p>
</body>
</html>