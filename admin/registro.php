<?php

require_once('../lib/usuarios_model.php');

$usuario = new Usuario();


$message = NULL;
$message_format = NULL;

$allowed_extensions = array('csv');

$upload_path = 'documents';

if (!empty($_FILES['file'])):

	if ($_FILES['file']['error'] == 0) :
			
		// check extension
		$file = explode(".", $_FILES['file']['name']);
		$extension = array_pop($file);
		
		if (in_array($extension, $allowed_extensions)) :
	
			if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_path.'/'.$_FILES['file']['name'])) :
		
				if (($handle = fopen($upload_path.'/'.$_FILES['file']['name'], "r")) !== false) :
				
					$keys = array();
					$out = array();
					
					$insert = array();
					
					$line = 1;
					
					while (($row = fgetcsv($handle, 0, ',', '"')) !== FALSE) :
						
						foreach($row as $key => $value) :
							if ($line === 1) {
								$keys[$key] = $value;
							} else {
								$out[$line][$key] = $value;
								
							}
						endforeach;
						
						$line++;
					  
					endwhile;
					
					fclose($handle);    
					
					if (!empty($keys) && !empty($out)) :	

						foreach($out as $key => $value) :

							// Comprobamos que el el formato csv sea el correcto en cuanto a la primera fila
							if ( $keys[0]	==	"name" 		&& 
								 $keys[1]	==	"last_name"	&&
								 $keys[2]	==	"email"		&& 
								 $keys[3]	==	"password"		&& 
								 $keys[4]	==	"state"		
							) :				    				

								$new_user_data = array(
									$keys[0]	=>	mysql_real_escape_string( $value[0] ),
									$keys[1]	=> 	mysql_real_escape_string( $value[1] ),
									$keys[2]	=>	mysql_real_escape_string( $value[2] ),
									$keys[3]	=> 	mysql_real_escape_string( $value[3] ),
									$keys[4]	=>	mysql_real_escape_string( $value[4] ),
									"account"	=>	"USER" 
								);

								$usuario->set( $new_user_data );

							else:
								$message_format 	=	"<div class='alert alert-danger'>Su archivo no tiene el formato correcto.</div>";
							endif;
						
						endforeach;

						// Mensaje de usuarios creados y no creados
						if ($usuario->user_created > 0 ) :
							$message	= 	"<div class='alert alert-success'>Se crearon ";
							$message 	.=	$usuario->user_created;
							$message   	.= 	" usuario/s exitosamente.</div>";
						else:
							$message 	=	"<div class='alert alert-danger'>No se crearon ";
							$message 	.=	$usuario->user_uncreated." usuario/s.<ul>";
							
							foreach ($usuario->list_user_uncreated as $value) :
								$message .= "<li>".$value."</li>";
							endforeach;
							$message 	.=	"</ul></div>";							
						endif;
						
					endif;	
					
				endif;
				
			endif;
			
		else:
			$message_format = '<div class="alert alert-danger">¡Unicamente archivos con formato .csv son permitidos!</div>';
		endif;
		
	else:
		$message_format = "<div class='alert alert-warning'>Hay un problema con su archivo.</div>";
	endif;
	
endif;

// Registro INDIVIDUAL
if ( !empty($_POST['name'] )		&&
	 !empty($_POST['last_name']	)	&&
	 !empty($_POST['email']	)		&&
	 !empty($_POST['password'] )	&&
	 !empty($_POST['state']	)	 
	):

	$new_user_data = array(
		"name"		=>	mysql_real_escape_string( $_POST['name'] ),
		"last_name"	=> 	mysql_real_escape_string( $_POST['last_name'] ),
		"email"		=>	mysql_real_escape_string( $_POST['email'] ),
		"password"	=> 	mysql_real_escape_string( $_POST['password'] ),
		"state"		=>	mysql_real_escape_string( $_POST['state'] ),
		"account"	=>	"USER" 
	);

	$usuario->set( $new_user_data );

	// Mensaje de usuarios creados y no creados
	if ($usuario->user_created > 0 ) :
		$message	= 	"<div class='alert alert-success'>Se crearon ";
		$message 	.=	$usuario->user_created;
		$message   	.= 	" usuario/s exitosamente.</div>";
	else:
		$message 	=	"<div class='alert alert-danger'>No se creo ";
		$message 	.=	$usuario->user_uncreated." usuario.<ul>";
							
		foreach ($usuario->list_user_uncreated as $value) :
			$message .= "<li>".$value."</li>";
		endforeach;
		$message 	.=	"</ul></div>";							
		endif;

endif;



?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Upload CSV to MySQL</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<div class="container">
	<section>	
		<h3>Carga de usuarios de forma masiva</h3>
		<form action="" method="post" name="record-massive" enctype="multipart/form-data">
		
			
			<div id="example-file">
				<h4>Ejemplo del formato <span class="badge">csv</span> a subir</h4>
				<img src="img/registro/file_csv.png" alt="Ejemplo de archivo csv" class="img-responsive">
			</div>
			<label for="file">Seleccionar el archivo <span class="badge">csv</span></label>
			<?php 	
				echo $message_format;
				echo $message; 
			?>
			<input type="file" name="file" id="file" class="btn btn-default"/>
			<button type="submit" class="btn btn-info"><i class="fa fa-user-plus"></i>
Subir archivo</button>
			
			

		</form>
		
	</section>

	<section>
		<h3>Carga de usuario de forma individual</h3>
		<form action="registro.php" method="post" name="record-single" role="form">
			
			<div class="row">
				<div class="col-md-4">
					<label for="name">Nombre:</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required  onkeyup="this.value=this.value.toUpperCase()">
				</div>
				
				<div class="col-md-4">
					<label for="last_name">Apellidos:</label>
					<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos" required  onkeyup="this.value=this.value.toUpperCase()">
				</div>
				
				<div class="col-md-4">	
					<label for="email">Email:</label>
					<div class="input-group">
						<span class="input-group-addon">@</span>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col-md-4">	
					<label for="password">Contraseña:</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
				</div>
				
				<div class="col-md-4">
					<label for="state">Estado:</label>
					<div class="radio">
						<label>
							<input type="radio" id="state_enabled" name="state" value="ENABLED" checked required>
							ENABLED
						</label>
					</div>
				
					<div class="radio">
						<label>
							<input type="radio" id="state_disabled" name="state" value="DISABLED" required>
							DISABLED
						</label>
					</div>
					

				</div>

			</div>

			<button type="submit" class="btn btn-info" name="submit-record-single"><i class="fa fa-user-plus"></i>
Crear Usuario</button>	

		</form>
	</section>
</div>
</body>
</html>



