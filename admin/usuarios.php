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
	<title>Users</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

	<div class="table-responsive">
		<table class="table-striped">
			<thead>
				<th>ID</th>
				<th>NAME</th>
				<th>LAST NAME</th>
				<th>EMAIL</th>
				<th>STATE</th>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $usuario->rows_dimension[0][0]; ?></td>
				</tr>
			</tbody>

		</table>
	</div>

</body>
</html>