<?php

require_once('../lib/usuarios_model.php');

$usuario = new Usuario();


$message = null;

$allowed_extensions = array('csv');

$upload_path = 'documents';

if (!empty($_FILES['file'])) {

	if ($_FILES['file']['error'] == 0) {
			
		// check extension
		$file = explode(".", $_FILES['file']['name']);
		$extension = array_pop($file);
		
		if (in_array($extension, $allowed_extensions)) {
	
			if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_path.'/'.$_FILES['file']['name'])) {
		
				if (($handle = fopen($upload_path.'/'.$_FILES['file']['name'], "r")) !== false) {
					
					$keys = array();
					$out = array();
					
					$insert = array();
					
					$line = 1;
					
					while (($row = fgetcsv($handle, 0, ',', '"')) !== FALSE) {
				       	
				       	foreach($row as $key => $value) {
				       		if ($line === 1) {
				       			$keys[$key] = $value;
				       		} else {
				       			$out[$line][$key] = $value;
				       			
				       		}
				       	}
				        
				        $line++;
				      
				    }
				    
				    fclose($handle);    
				    
				    if (!empty($keys) && !empty($out)) {
				    					    
				    	foreach($out as $key => $value) {

				    		$new_user_data = array(
				    		$keys[0]	=>	mysql_real_escape_string( $value[0] ),
				    		$keys[1]	=> 	mysql_real_escape_string( $value[1] ),
				    		$keys[2]	=>	mysql_real_escape_string( $value[2] ),
				    		$keys[3]	=> 	mysql_real_escape_string( $value[3] ),
				    		$keys[4]	=>	mysql_real_escape_string( $value[4] ),
				    		$keys[5]	=>	mysql_real_escape_string( $value[5] )
				    			);

				    		$usuario->set( $new_user_data );
				   		}
				   		$message = '<span class="green">File has been uploaded successfully</span>';
				   		
				   	}	
				    
				}
				
			}
			
		} else {
			$message = '<span class="red">Only .csv file format is allowed</span>';
		}
		
	} else {
		$message = '<span class="red">There was a problem with your file</span>';
	}
	
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Upload CSV to MySQL</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href="/css/core.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<section id="wrapper">	
	
	<form action="" method="post" enctype="multipart/form-data">
	
		<table cellpadding="0" cellspacing="0" border="0" class="table">
			<tr>
				<th><label for="file">Select file</label> <?php echo $message; ?></th>
			</tr>
			<tr>
				<td><input type="file" name="file" id="file" class="btn btn-default"/></td>
			</tr>
			<tr>
				<td><input type="submit" id="btn" class="btn btn-info" value="Submit" /></td>
			</tr>
		</table>
		
	</form>
	
</section>

</body>
</html>



