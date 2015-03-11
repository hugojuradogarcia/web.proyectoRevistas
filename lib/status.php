<?php 
require('session_model.php');
require('auditor_model.php');

class Status extends Session 
{
	private $status_session = FALSE;

	function varSession()
	{
	    if(!isset($_SESSION)):
	        session_start(); 
	    endif; 
	}

	public function state_user()
	{

		$this->varSession();

		$this->get_data_session( $_SESSION['user'] );

		if ( $this->session_id != session_id() ) :
			return ( $status_session );
		elseif 	( 	  isset( $_SESSION['authenticated'] )  	&&  
					( $_SESSION['state'] 	== 'ENABLED') 	&& 
					( $_SESSION['account'] 	== 'USER') 		&&
					( isset( $_SESSION['user'] )  )  
				):
			return ( $status_session = TRUE);
		else:
			return ( $status_session );
		endif;
	}

	public function state_admin()
	{

		$this->varSession();

		$this->get_data_session( $_SESSION['user'] );

		if ( $this->session_id != session_id() ) :
			return ( $status_session );
		elseif 	( 	  isset( $_SESSION['authenticated'] )  		&&  
					( $_SESSION['state'] 	== 'ENABLED') 		&& 
					( $_SESSION['account'] 	== 'ADMINISTRATOR')	&&
					( isset( $_SESSION['user'] )  )  
				):
			return ( $status_session = TRUE );
		else:
			return ( $status_session );
		endif;
	}


	public function auditor( $route, $page  )
	{
		$this->varSession(); 

		if ( isset( $_SESSION['user'] ) ):
			$user = $_SESSION['user'];
			$account = $_SESSION['account'] ;
		else:
			$user = 'UNKNOWN';
			$account = 'UNKNOWN' ;
		endif;

		$auditor = new Auditor();


		$data_auditor = array(
			"user"			=>	$user,
			"date"			=>	date('Y-m-d H-i-s'),
			"route"			=>	$route,
			"page"			=>	$page,
			"browser"		=>	$this->browser_name,
			"ip"			=>  $this->ipaddress,
			"account"		=>	$account
		);
		$auditor->set_auditor( $data_auditor );

	}

}

?>