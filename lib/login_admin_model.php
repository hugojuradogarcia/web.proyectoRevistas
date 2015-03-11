<?php  

require_once('db_abstract_model.php');

class Login_admin extends DBAbstractModel
{
	// DEFINIENDO ATRIBUTOS
	private $name;
	private $user;
	private $password;
	private $state;
	private $account;
	private $company;
	public $days;
	public $start_time;
	public $end_time;

	public 	$status = FALSE;

	

	// METODOS MAGICOS
	function __construct( $user = '', $password = '' )
	{
		$this->db_name = 'superuser';

		$this->user = $user;
		$this->encrypting( $password );
		$this->company = 'GDC';
	}

	function __destruct()
	{
		unset( $this );
	}
	
	// LOGIN
	public function login()
	{
		$this->browseUser();
		return ( $this->status );		
	}

		
	// BROWSE USER
	public function browseUser()
	{    
		$this->query = "
			SELECT 		name, email, password, state, account, days, start_time, end_time
			FROM 		administrator 
			WHERE 		email		= '$this->user' 
			AND 		password 	= '$this->password'
			AND 		company 	= '$this->company'
		";
		
		$this->get_results_from_query();

		if( count($this->rows) == 1 ):

			foreach( $this->rows[0] as $valor):
				$propiedad[] = $valor;
			endforeach;

			$this->name 		= $propiedad[0];
			$this->state 		= $propiedad[3];
			$this->account 		= $propiedad[4];

			$this->newSession();
		endif;
	}

	public function browseDateCompany()
	{
		$this->query = "
			SELECT 		days, start_time, end_time
			FROM 		administrator
			WHERE		company = '$this->company'
		";

		$this->get_results_from_query();

		if( count($this->rows) == 1 ):

			foreach( $this->rows[0] as $valor):
				$propiedad[] = $valor;
			endforeach;

			$this->days 		= $propiedad[0];
			$this->start_time	= $propiedad[1];
			$this->end_time		= $propiedad[2];	

		endif;

	}

	// SESSION START
	private function varSession()
	{
		session_name("user");
		if(!isset($_SESSION)):
	        session_start(); 
	    endif; 
	}

	/// NEW SESSION
	public function newSession()
	{
		//$this->varSession();
		$_SESSION["authenticated"] = TRUE;
		$_SESSION["name"] = $this->name;
		$_SESSION["user"] = $this->user;
		$_SESSION["state"] = $this->state;
		$_SESSION["account"] = $this->account;
		$this->status = TRUE;
	}

	// GET STATUS SESSION
	public function getStatus()
	{
		$this->varSession();
		$this->status = $_SESSION["authenticated"];
		return $this->status;
	}

	// CLOSE SESSION
	public function closeSession()
	{
		$this->varSession();
		session_unset();
		session_destroy();
		unset($_SESSION["user"]);
		unset($_SESSION["authenticated"]);
		unset($_SESSION["state"]);
		unset($_SESSION["account"]);
		$this->status = FALSE;

	}

	// ENCRYPTING PASSWORD
	private function encrypting( $password )
	{
		$this->password = hash('sha1', $password);
	}

}

?>