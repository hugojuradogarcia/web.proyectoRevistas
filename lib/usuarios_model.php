<?php 

require_once('../connection/db_abstract_model.php');

class Usuario extends DBAbstractModel
{
	public $name;
	public $last_name;
	public $email;
	public $user_existing;
	private $password;
	protected $id;

	function __construct()
	{
		$this->db_name = 'mvc';
	}

	function __destruct()
	{
		unset($this);
	}

	// SELECT
	public function get($user_email='')
	{
		echo $user_email;
		if( $user_email != '' ):
			$this->query = "
			SELECT id, name, last_name, email, password
			FROM usuarios
			WHERE email = '$user_email'
			";
			$this->get_results_from_query();
		endif;
echo count($this->rows);
		if ( count($this->rows) == 1 ):
			foreach( $this->rows[0] as $propiedad=>$valor):
				$this->$propiedad = $valor;
			endforeach;
			

			
			
		endif;
	}

	// INSERT
	public function set( $user_data=array() )
	{
		if( array_key_exists('email', $user_data)):

			// Consultamos si se encuentra 
			$this->get( $user_data['email'] );
			//echo $user_data['email'];
			echo $this->user_existing;
			// Si no se encuantra ejecutamos el INSERT
			if( $this->user_existing != $user_data['email'] ):
				// Si esta vacio se ejecuta el query	
				if ( $user_data['email'] != '' || $user_data['email'] != NULL ):
						
					foreach ( $user_data as $campo=>$valor ):
						$$campo = $valor;
					endforeach;

					$this->query = "
						INSERT INTO 	usuarios
						( name, last_name, email, password, state, account )
						VALUES 
						( '$name', '$last_name', '$email', '$password', '$state', '$account' )";
					$this->execute_single_query();
				endif;

			else:
				$message 	=	"<div class='text-danger'>".$user_data['email']."</div></br>";

				//echo $message;
			endif;
		endif;
	}

	// EDIT
	public function edit( $user_data=array())
	{
		foreach ($user_data as $campo => $valor):
			$$campo = $valor;
		endforeach;

		$this->query = "
			UPDATE 	usuarios
			SET 	name='$name',
					last_name='$last_name',
					email='$email',
					password=$password
			WHERE 	email = '$email'
			";
		$this->execute_single_query();
	}

	// DELETE
	public function delete()
	{
		$this->query = "
			DELETE FROM 	usuarios
			WHERE 			email = '$user_email'
			";
			$this->execute_single_query();
	}
}

?>