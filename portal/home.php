<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
</head>
<body>
	<a href="logout.php" target="_self">Cerrar Sesión</a>
    <p><?php echo $_SESSION["user"]; ?></p>
</body>
</html>