<?php 
// Validar Session
require('../lib/status.php');

$status = new Status();
/* AUDITOR */
$status->auditor( $_SERVER['SCRIPT_NAME'] , 'LOGIN ADMIN' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<div class="col-md-12">
		<div class="col-md-12">
			<h1 class="text-center text-primary">Login <span class="label label-primary">Admin</span></h1>
		</div>
		
		<div class="alert alert-danger col-md-12 text-center 

		<?php 
		if (isset( $_GET['error']) == 'access' ) :
		else:
			echo 'hidden';
		endif;
		?>

		" role="alert">
			<strong>¡Credenciales incorrectas!</strong>
		</div>

		<section>

			<form action="actions/login.php" name="login" id="login" method="post" class="form-horizontal">
				<div class="form-group">
					
					<label for="email" class="col-md-4 control-label">Usuario:</label>
					<div class="col-md-8">
						<input type="email" class="form-control" name="email" id="email" required>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-md-4 control-label">Contraseña:</label>
					<div class="col-md-8">
						<input type="password" class="form-control" name="password" id="password" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-4 col-md-8">
						<button type="submit" value="Submit" class="btn btn-primary btn-lg">Submit</button>
					</div>
				</div>
			</form>

		</section>
	</div>
</body>
</html>