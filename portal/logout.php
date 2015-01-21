<?php 

require('../lib/login_model.php');

session_start();
# Instanciando el objeto 
$logout = new Login();
# Cerrando y destruyendo variables de session
$logout->closeSession();
# direccionamiento 
//header("Location: index.php");

?>