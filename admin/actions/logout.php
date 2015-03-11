<?php 

require('../../lib/login_model.php');
require('../../lib/session_model.php');

session_start();
$session_id = session_id();
$session = new Session();


# Instanciando el objeto 
$logout = new Login_admin();
# Cerrando y destruyendo variables de session
$logout->closeSession() ;

if ( !$logout->status ) :
	$session->delete_session( $session_id );
	header('Location: ../access.php');
/*else:
	//header('Location: ../homep.php');*/
endif;
# direccionamiento 
//header("Location: index.php");

?>