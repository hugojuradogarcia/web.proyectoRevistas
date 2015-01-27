<?php
session_start();
require_once ("../../lib/login_model.php");

$user = !empty($_REQUEST["user"]) ? $_REQUEST["user"] : '';
$password = !empty($_REQUEST["password"]) ? $_REQUEST["password"] : '';

//Obtenemos datos especificos y eliminamos codigo de un posible inyeccion de SQL
$user = mysql_real_escape_string($user);
$password = mysql_real_escape_string($password);

//Construct
$login = new Login($user, $password);
if($login->login()):
	echo true;
else:
	echo false;
endif;

?>