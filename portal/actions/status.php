<?php 
require('../lib/session_model.php');
require('../lib/auditor_model.php');

class Status extends Session 
{
	function varSession()
	{
	    if(!isset($_SESSION)):
	        session_start(); 
	    endif; 
	}

	public function state( $route, $page )
	{

		$this->varSession();

		$this->get_data_session( $_SESSION['user'] );

		if ( $this->session_id != session_id() ) :
			header('Location: actions/logout.php');
		else:
			if ( !( isset( $_SESSION['authenticated'] ) ) &&  
				 ( isset( $_SESSION['state'] ) == 'ENABLED') && 
				 ( isset( $_SESSION['account'] ) == 'ADMINISTRATOR') &&
				   isset( $_SESSION['user'] ) ) :
				header('Location: actions/indexp.php');
			else:
				$this->auditor( $route, $page );
			endif;
		endif;
	}


	public function auditor( $route, $page  )
	{
		$this->varSession(); 

		if ( isset( $_SESSION['user'] ) ):
			$user = $_SESSION['user'];
		else:
			$user = 'UNKNOWN';
		endif;

		$auditor = new Auditor();

		$data_auditor = array(
			"user"			=>	$user,
			"date"			=>	date('Y-m-d H-i-s'),
			"route"			=>	$route,
			"page"			=>	$page,
			"browser"		=>	$this->ipaddress,
			"ip"			=>  $this->browser_name
		);
		$auditor->set_auditor( $data_auditor );

	}

}

?>