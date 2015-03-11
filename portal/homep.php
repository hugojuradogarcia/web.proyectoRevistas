<?php 
// Validar Session
require_once('../lib/status.php');

$status = new Status();
/* SESSION */
if( !$status->state_user() ) :
	header( 'Location: actions/logout.php');
endif;	
/* AUDITOR */
$status->auditor( $_SERVER['SCRIPT_NAME'] , 'HOME' );

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
	<h3><?php echo $_SESSION['account']; ?></h3>
	<p><?php echo date("H:i"); ?></p>
</body>
</html>