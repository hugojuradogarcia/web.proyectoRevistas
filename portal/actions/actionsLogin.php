<?php
session_start();
include_once("../../../lib/Login.Class.php");

sleep(2);

$user = $_POST["user"];
echo "<h1>User: $user</h1>";
$password = $_POST["password"];
echo "<h1>Password: $password</h1>";

$login = new Login();
$checkUser = $login->checkUser($user, $password);
echo "<h1>checkUser: $checkUser[0]</h1>";

if(empty($checkUser)){
	echo "<h1>Usuario y/o Password Incorrecto.</h1>";
}else{
	echo "<h1>Bienvido(a)</h1>";
	$_SESSION["userValid"] = $row;
}


/*
$user = $_POST['user'];
//echo "<h1>User: $user</h1>";
$password = md5($_POST['password']);
//echo "<h1>Password: $password</h1>";

$query = "SELECT id, name, user, password FROM users WHERE user = '$user' AND password = '$password' AND valid = '1'";
$result = $db->exeQuery($query);

$row = $db->fetchRows($result);
//echo "<h1>Nombre: $row->nombre</h1>";

if($row > 0){
	$_SESSION["userValid"] = $row;
	echo json_encode($row);
}else{
	//$error = "<h1>Usuario y/o Password Incorrecto.</h1>";
	echo json_encode(array("error" => true));
}
*/

?>