<?php 

require('../lib/login_model.php');

//session_start();
# Instanciando el objeto 
$logout = new Login();
# Cerrando y destruyendo variables de session
$logout->closeSession() ;

if ( !$logout->status ) :
	header('Location: indexp.php');
else:
	header('Location: homep.php');
endif;
# direccionamiento 
//header("Location: index.php");

?>