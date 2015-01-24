<?php
//require ("../../lib/login_model.php");
//require_once ("../../lib/login_model.php");
//include_once ("../../lib/login_model.php");

//session_start();
$user = !empty($_REQUEST["user"]) ? $_REQUEST["user"] : '';
echo "<h1>User: $user</h1>";
$password = !empty($_REQUEST["password"]) ? $_REQUEST["password"] : '';
echo "<h1>Password: $password</h1>";

/*
$user = !empty($_POST["user"]) ? $_POST["user"] : '';
echo "<h1>User: $user</h1>";
$password = !empty($_POST["password"]) ? $_POST["password"] : '';
echo "<h1>Password: $password</h1>";
*/

/*
$user = $_POST['user'];
echo "<h1>User: $user</h1>";
$password = $_POST['password'];
echo "<h1>Password: $password</h1>";
*/

//Obtenemos datos especificos y eliminamos codigo de un posible inyeccion de SQL
$user = mysql_real_escape_string($user);
echo "<h1>mysql_real_escape_string User: $user</h1>";
$password = mysql_real_escape_string($password);
echo "<h1>mysql_real_escape_string Password: $password</h1>";

//Obtenemos datos especificos y eliminamos codigo de un posible inyeccion de SQL.
/*
Escapa los caracteres especiales de una cadena para usarla en una sentencia SQL,
tomando en cuenta el conjunto de caracteres actual de la conexión.
*/
$user = mysqli_real_escape_string($user);
echo "<h1>mysqli_real_escape_string User: $user</h1>";
$password = mysqli_real_escape_string($password);
echo "<h1>mysqli_real_escape_string Password: $password</h1>";

//Construct
/*
$log = new Login($email, $password);
if($log->login()):
	header('Location: home.php');
endif;
*/
?>