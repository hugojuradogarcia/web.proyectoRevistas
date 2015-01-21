<?php 
require('../lib/login_model.php');

session_start();
$email =! empty( $_REQUEST['email'] )?$_REQUEST['email']:'';
$password =! empty( $_REQUEST['password'] )?$_REQUEST['password']:'';
// Obtenemos datos especificos y eliminamos codigo de un posible inyeccion de SQL
$email = mysql_real_escape_string( $email );
$password = mysql_real_escape_string( $password );

// Consruct
$log = new Login( $email , $password );
if( $log->login() ):
	header('Location: home.php');
endif;
?>