<?php 
	require_once('../lib/usuarios_model.php');

	// Instaciamos el objeto
	$usuario = new Usuario();

	$usuario->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Users</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css">
</head>
<body>
	<div class="col-md-12">
		<section class="table-responsive">
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
							<a href="" class="btn btn-danger">
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

</body>
</html>