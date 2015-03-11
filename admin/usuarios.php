<?php 
	// Validar Session
	require_once('../lib/status.php');

	$status = new Status();
	/* SESSION */
	if( !$status->state_admin() ) :
		header( 'Location: actions/logout.php');
	endif;
	/* AUDITOR */
	$status->auditor( $_SERVER['SCRIPT_NAME'] , 'USUARIOS ADMIN' );

?>
<?php 
	require_once('../lib/usuarios_model.php');

	// Instaciamos el objeto
	$usuario = new Usuario();

	$usuario->get();


	// Eliminar USUARIO
	if ( !empty( $_GET['id'] )) :
		$usuario->delete( $_GET['id'] );
	endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Users</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<!-- ALERT-->
	<?php if ( isset( $_GET['status'] ) == 'edit-user' ) :?>
	<div class="alert alert-success">Se edito correctamente el usuario <strong><?php echo $_GET['email'] ?></strong>.</div>
	<?php endif; ?>

	<div class="col-md-12">
		<div class="col-md-2">
			<?php require('menu.php'); ?>
		</div>
		<div class="col-md-10">
			
			<section class="table-responsive border-top">
				<h3>Usuarios</h3>
				<table class="table table-bordered table-hover table-condensed">
					<thead>
						<tr class="active">
							<th>Acciones</th>
							<th>ID</th>
							<th>NAME</th>
							<th>LAST NAME</th>
							<th>EMAIL</th>
							<th>STATE</th>
						</tr>
					</thead>
					<?php $i = 0; ?>
					<?php while ( $i < count( $usuario->rows_dimension) ) : ?>
					<tbody>
						<tr>
							<td>
								<a href="edit-user.php?email=<?php echo $usuario->rows_dimension[$i]["email"]; ?>" class="btn btn-info">
									<i class="fa fa-pencil-square-o"></i>
								</a>
								<a href="usuarios.php?id=<?php echo $usuario->rows_dimension[$i]["id"]; ?>" class="btn btn-danger">
									<i class="fa fa-user-times"></i>
								</a>							
							</td>
							<td><?php echo $usuario->rows_dimension[$i]["id"]; ?></td>
							<td><?php echo $usuario->rows_dimension[$i]["name"]; ?></td>
							<td><?php echo $usuario->rows_dimension[$i]["last_name"]; ?></td>
							<td><?php echo $usuario->rows_dimension[$i]["email"]; ?></td>
							<td><?php echo $usuario->rows_dimension[$i]["state"]; ?></td>
							
						</tr>
					</tbody>
					<?php $i ++; ?>
					<?php endwhile; ?>
				</table>
			</section>
		</div>
	</div>

</body>
</html>