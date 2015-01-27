<?php 

require_once('../connection/db_abstract_model.php');

class Usuario extends DBAbstractModel
{
	public 		$name 		= 	"";
	public 		$last_name 	=	"";
	public 		$email 		= 	"";
	private 	$password;
	public  	$state		=  	"";

	protected	$id 		=	"";

	public 		$row 		= 0;
	public 		$rows_dimension = array();
	public 		$user_created = 0;
	public 		$user_uncreated = 0;
	public 		$list_user_uncreated = array();

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
		if( $user_email != '' ):
			$this->query = "
				SELECT 		id, name, last_name, email, password, state
				FROM 		usuarios
				WHERE 		email = '$user_email'
			";
			$this->get_results_from_query();
		else:
			$this->query = "
				SELECT 		id, name, last_name, email, password, state
				FROM 		usuarios	
			";
			$this->get_results_from_query();

		endif;

		// COUNT user
		$this->row = count( $this->rows );

		$i = 0;
		if ( count( $this->rows ) > 0 ):
			while ( $i < count( $this->rows ) ):
				
				$this->id 			= $this->rows[$i]["id"];
				$this->name 		= $this->rows[$i]["name"];
				$this->last_name 	= $this->rows[$i]["last_name"];
				$this->email 		= $this->rows[$i]["email"];
				$this->state 		= $this->rows[$i]["state"];
				

				$this->rows_dimension[ $i ]["id"] = $this->id ;
				$this->rows_dimension[ $i ]["name"] = $this->name ;
				$this->rows_dimension[ $i ]["last_name"] = $this->last_name ;
				$this->rows_dimension[ $i ]["email"] = $this->email ;
				$this->rows_dimension[ $i ]["password"] = $this->password ;
				$this->rows_dimension[ $i ]["state"] = $this->state ;

				$i ++;
			endwhile;

		endif;	
	}

	// INSERT
	public function set( $user_data=array() )
	{
		if( array_key_exists('email', $user_data)):

			// Consultamos si se encuentra 
			$this->get( $user_data['email'] );
			$this->encrypting( $user_data['password'] );

			// Si no se encuantra ejecutamos el INSERT
			if( $this->email != $user_data['email'] ):
				// Si esta vacio se ejecuta el query	
				if ( $user_data['email'] != '' || $user_data['email'] != NULL ):
						
					foreach ( $user_data as $campo=>$valor ):
						$$campo = $valor;
					endforeach;

					$this->query = "
						INSERT INTO 	usuarios
						( name, last_name, email, password, state, account )
						VALUES 
						( '$name', '$last_name', '$email', '$this->password', '$state', '$account' )";
					$this->execute_single_query();

					# Contamos los usuarios CREADOS
					$this->user_created ++;
				endif;

			else:
				# Contamos los usuarios NO CREADOS
				$this->list_user_uncreated[ $this->user_uncreated ] = $user_data['email']; 
				$this->user_uncreated ++;
			endif;
		endif;
	}

	// EDIT
	public function edit( $user_data=array() )
	{
		# Checar si se encuentra el email registrado
		$this->get( $user_data['email'] );
		$this->encrypting( $user_data['password'] );

		foreach ( $user_data as $campo => $valor ):
			$$campo = $valor;
		endforeach;

		$this->query = "
			UPDATE 	usuarios
			SET 	name='$name',
					last_name='$last_name',
					email='$email',
					password='$this->password',
					state='$state'
			WHERE 	id = '$id'
			";
		$this->execute_single_query();

	}

	// DELETE
	public function delete( $id )
	{
		$this->query = "
			DELETE FROM 	usuarios
			WHERE 			id = '$id'
			";
			$this->execute_single_query();
	}

	// ENCRYPTING PASSWORD
	private function encrypting( $password )
	{
		$this->password = hash('sha1', $password);
	}
}

?>