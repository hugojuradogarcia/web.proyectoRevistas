<?php 

	require_once('../lib/usuarios_model.php');

	$usuario = new Usuario();

	# Si es diferente a vacio se hace un SELECT
	if ( !empty( $_GET['email'] )) :
		$usuario->get( $_GET['email'] );$user_previous = $usuario->rows_dimension[0]['email'];
	/*else:
		header('Location: usuarios.php');*/
	endif;
	
	// EDIT
	// Registro INDIVIDUAL
	if ( !empty($_POST['name'] )		&&
		 !empty($_POST['last_name']	)	&&
		 !empty($_POST['email']	)		&&
		 !empty($_POST['state']	)	 
		):

		$new_user_data = array(
			"id"		=>	$_POST['id'], 
			"name"		=>	mysql_real_escape_string( $_POST['name'] ),
			"last_name"	=> 	mysql_real_escape_string( $_POST['last_name'] ),
			"email"		=>	mysql_real_escape_string( $_POST['email'] ),
			"password"	=> 	mysql_real_escape_string( $_POST['password'] ),
			"state"		=>	mysql_real_escape_string( $_POST['state'] )
		);
		
		// Buscamos si existe el correo antes creado			
		$usuario->get( $new_user_data['email'] );
		echo $usuario->rows_dimension[0]['email'] ." {} ". $_POST['email'] ;
		# Si no existe ningun email igual 
		if ( $usuario->row == 0 ) :
			$usuario->edit( $new_user_data );
			header( 'Location: usuarios.php?status=edit-user&email='.$_POST['email'] );
		elseif( $usuario->rows_dimension[0]['email'] == $_POST['email'] && 
				$usuario->row == 1 ):

			$usuario->edit( $new_user_data );
			header( 'Location: usuarios.php?status=edit-user&email='.$_POST['email'] );
		elseif ( $usuario->row > 1 ):
			header( 'Location: edit-user.php?status=existing-user&email='.$_POST['email'] );
		endif;

		//header('Location: usuarios.php');

	endif;


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css">
</head>
<body>
	<div class="col-md-12">
		<!-- ALERT-->
		<?php if ( isset( $_GET['status'] ) == 'existing-user' ) :?>
		<div class="alert alert-danger">Email: <strong><?php echo $_GET['email'] ?></strong> existente.</div>
		<?php endif; ?>
		<section>
			<h3>Editar Usuario</h3>
			<form action="edit-user.php" method="post" name="record-single" role="form">
				 
				<input type="text" class="form-control hidden" id="id" name="id"  onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $usuario->rows_dimension[0]['id']; ?>">
				
				<div class="row">
					<div class="col-md-4">
						<label for="name">Nombre:</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required  onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $usuario->rows_dimension[0]['name']; ?>">
					</div>
					
					<div class="col-md-4">
						<label for="last_name">Apellidos:</label>
						<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos" required  onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $usuario->rows_dimension[0]['last_name']; ?>">
					</div>
					
					<div class="col-md-4">	
						<label for="email">Email:</label>
						<div class="input-group">
							<span class="input-group-addon">@</span>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?php echo $usuario->rows_dimension[0]['email']; ?>">
						</div>
					</div>
				</div>
				<div class="row">
					
					<div class="col-md-4">	
						<label for="password">Contraseña:</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
					</div>
					
					<div class="col-md-4">
						<label for="state">Estado:</label>
						<div class="radio">
							<label>
								<input type="radio" id="state-enabled" name="state" value="ENABLED" required>
								ENABLED
							</label>
						</div>
					
						<div class="radio">
							<label>
								<input type="radio" id="state-disabled" name="state" value="DISABLED" required>
								DISABLED
							</label>
						</div>
						

					</div>

				</div>

				<button type="submit" class="btn btn-info" name="submit-record-single"><i class="fa fa-user-plus"></i>
	Editar Usuario</button>	

			</form>
		</section>
	</div>
	
	<!-- Verificar Email -->
	<script>
		function 
	</script>

	<!-- JAVASCRIPT RAIO BOTTON-->
	<script>

		var state = "<?php echo $usuario->rows_dimension[0]['state']; ?>";

		if( state == "ENABLED" )
		{
			document.getElementById("state-enabled").checked 	= true;
			document.getElementById("state-disabled").checked 	= false;			
		}
		else if( state == "DISABLED" )
		{
			document.getElementById("state-disabled").checked 	= true;
			document.getElementById("state-enabled").checked 	= false;
		}
			
	</script>
</body>
</html>