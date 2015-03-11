<?php 

require_once('db_abstract_model.php');

require_once('phpUserAgent.php');
require_once('phpUserAgentStringParser.php');

class Session extends DBAbstractModel
{

	public 		$name 	    	=	"";
	public 		$user    		= 	"";
	public  	$session_id 	= 	"";
	private 	$ip 			= 	"";
	public 		$ipadress;
	public 		$browser_name;

	function __construct()
	{
		$this->db_name = 'mvc';

		$this->get_ip();
		$this->get_browser();
	}

	function __destruct()
	{
		unset( $this );
	}

	public function session_values( $email )
	{
		$new_user_session = array(
		"email" 		=> $email ,
		"session_id" 	=> session_id() ,
		"date" 			=> date('Y-m-d') ,
		"flag"			=> 1 );

		return ( $new_user_session );
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

		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
			endforeach;
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
					( '$email', '$session_id', '$this->browser_name', '$this->ipaddress', '$date', '$flag' )
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
						browser 		= 	'$this->browser_name',
						ip 				=	'$this->ipaddress',
						date 			=   '$date',
						flag 			= 	'0'
			WHERE 		user 			= 	'$email'
		";
		$this->execute_single_query();
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

	public function get_ip()
	{
		$this->ipaddress = '';
		if (getenv('HTTP_CLIENT_IP')) :
		  $this->ipaddress = getenv('HTTP_CLIENT_IP');
		elseif(getenv('HTTP_X_FORWARDED_FOR')) :
		  $this->ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		elseif(getenv('HTTP_X_FORWARDED')) :
		  $this->ipaddress = getenv('HTTP_X_FORWARDED');
		elseif(getenv('HTTP_FORWARDED_FOR')) :
		  $this->ipaddress = getenv('HTTP_FORWARDED_FOR');
		elseif(getenv('HTTP_FORWARDED')) :
		  $this->ipaddress = getenv('HTTP_FORWARDED');
		elseif(getenv('REMOTE_ADDR')) :
		  $this->ipaddress = getenv('REMOTE_ADDR');
		else:
		  $this->ipaddress = 'UNKNOWN';
		endif;
	}

	public function get_browser()
	{
		$userAgent = new phpUserAgent();
		$this->browser_name = $userAgent->getBrowserName();
	}


}

 ?>