<?php session_start(); 
/*if ( ( $_SESSION['authenticated'] ) &&  
	 ( $_SESSION['state']  == 'ENABLED') && 
	 ( $_SESSION['account']  == 'USER') ) :
	
else:
	header('Location: indexp.php');
endif;*/

echo $_SESSION['authenticated'];
echo $_SESSION['account']
echo $_SESSION['state']
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
</head>
<body>
	<a href="logout.php">Salir <span><?php echo $_SESSION["user"]; ?></span></a>
</body>
</html>