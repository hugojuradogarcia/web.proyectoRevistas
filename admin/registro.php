<?php 

$message =  NULL;
$allowed_extensions = array('csv');
$upload_path = 'documents';


if (!empty( $_FILES['file'] )) {
	if ( $_FILES['file']['error'] === 0) {
		
		$file = explode(".", $_FILES['file']['name']);
		$extension = array_pop($file);

		if ( in_array( $extension , $allowed_extensions )) {
			
			if ( move_uploaded_file( $_FILES['file']['tmp_name'], 
				$upload_path.'/'.$_FILES['file']['name'])) 
			{
			
				if (( $handle = fopen( $upload_path.'/'.$_FILES['file']['name'], "r")) !== false ) {
					
					$keys= array();
					$out = array();

					$line = 1;

					while (( $row = fgetcsv($handle,0,',','"')) !== flase ) :
						
						foreach ($row as $key => $value):
							if ( $line === 1 ) {
								
								$keys[$key] = $value;

							}else{
								$out[$line][$key] = $value;
							}
						endforeach;

						fclose($handle);

						if ( !empty($keys) && !empty($out)) {

							$db = new PDO('mysql:host=localhost;dbname=mvc','root','');
							$db->exec("SET CHARACTER SET utf8");

							foreach ($out as $key => $value) {
								$sql 	= 	"INSERT INTO usuarios (";
								$sql 	.=	implode(" , ", $keys );
								$sql 	.= 	" ) VALUES ( ";
								$sql	.= 	implode(" , ", array_fill(0, count($keys), "?"));
								$sql 	.= " ) ";
								
								$statement = $db->prepare($sql);
								$statement->execute($value);
							}
							$message = '<span>File has be uploaded successfully</span>';
						}

					endwhile;

				}

			}

		}else{
			$message = '<span class="text-danger">Only .csv file format is allowed</span>';
		}

	}
	else{
		$message = '<span class="text-danger>Theres was a problem with your file</span>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
</head>
<body>
	<section>
		<form action="" method="post" enctype="multipart/form-data">
			<label for="file">Select file</label>
			<?php echo $message; ?>
			<input type="file" name="file" id="file">
			<input type="submit" id="btn" value="submit">
		</form>
	</section>
	
</body>
</html>