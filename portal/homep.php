<?php session_start(); 
if ( ( isset( $_SESSION['authenticated'] ) ) &&  
	 ( isset( $_SESSION['state'] ) == 'ENABLED') && 
	 ( isset( $_SESSION['account'] ) == 'ADMINISTRATOR') &&
	   isset( $_SESSION['user'] ) ) :
	
else:
	header('Location: indexp.php');
endif;
/*
echo $_SESSION['authenticated'];
echo $_SESSION['account'];
echo $_SESSION['state'];*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
</head>
<body>
	<a href="logout.php">Salir <span><?php echo $_SESSION["user"]; ?></span></a>
	<p><?php echo session_id(); ?></p>
</body>
</html>