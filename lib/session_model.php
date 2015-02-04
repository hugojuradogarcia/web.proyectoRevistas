<?php 

require_once('../connection/db_abstract_model.php');

class Session extends DBAbstractModel
{

	public 		$name 	    	=	"";
	public 		$user    		= 	"";
	private 	$session_id 	= 	"";
	private 	$ip 			= 	"";

	function __construct()
	{
		$this->db_name = 'mvc';
	}

	function __destruct()
	{
		unset( $this );
	}

	public function get_data_session( $user_email = '' )
	{
		if ( !empty( $user_email ) ):
			$this->query = "
			SELECT 		session_id, browser, ip, date, flag
			FROM 		session
			WHERE		user = '$user_email'
		";
		$this->get_results_from_query();

		endif;
	}

	public function set_data_session( $user_data = array() )
	{
		if ( array_key_exists('email', $user_data ) ) :
			$this->get_data_session( $user_data[ 'email' ] );

			if ( count($this->rows) == 0 ) :

				foreach ( $user_data as $campo=>$valor ):
					echo $$campo = $valor;
				endforeach;

				$this->query = "
					INSERT INTO 	session
					( user, session_id, browser, ip, date, flag )
					VALUES
					( '$email', '$session_id', '$browser', '$ip', '$date', '$flag' )
				";
				$this->execute_single_query();

			else:

				$this->edit_data_session( $user_data );

			endif;

		endif;
	}

	public function edit_data_session( $user_data = array()  )
	{
		foreach ( $user_data as $campo=>$valor ):
			echo $$campo = $valor;
		endforeach;

		$this->query = "
			UPDATE		session
			SET 		session_id		= 	'$session_id',
						browser 		= 	'$browser',
						ip 				=	'$ip',
						date 			=   '$date',
						flag 			= 	0
			WHERE 		user 			= 	'$email'
		";
		$this->execute_single_query();
		header('location: login.php');
	}

	// Delete for session id
	public function delete_session( $session_id )
	{
		$this->query = "
			DELETE 		FROM session
			WHERE 		session_id = '$session_id'
		";
		$this->execute_single_query();
	}


}

 ?>