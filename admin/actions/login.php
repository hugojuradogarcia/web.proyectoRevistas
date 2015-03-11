<?php 
require('../../lib/login_admin_model.php');
require('../../lib/session_model.php');

session_start();
$email =! empty( $_REQUEST['email'] )?$_REQUEST['email']:'';
$password =! empty( $_REQUEST['password'] )?$_REQUEST['password']:'';
// Obtenemos datos especificos y eliminamos codigo de un posible inyeccion de SQL
$email = mysql_real_escape_string( $email );
$password = mysql_real_escape_string( $password );


// Consruct
$login = new Login_admin( $email , $password );

// Si return = true 
if( $login->login() ):
	$session = new  Session();
	$session->set_data_session( $session->session_values( $email ) );
	/* portal/actions */
	header('Location: ../registro.php');
else:
	header('Location: ../access.php?error=access');
endif;
?>
