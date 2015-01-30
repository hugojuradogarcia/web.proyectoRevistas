<?php  

require_once('../connection/db_abstract_model.php');

class Login extends DBAbstractModel
{
	// DEFINIENDO ATRIBUTOS
	private $name;
	private $user;
	private $password;
	private $state;
	private $account;
	public $status = false;

	

	// METODOS MAGICOS
	function __construct( $user = '', $password = '' )
	{
		$this->db_name = 'mvc';

		$this->user = $user;
		$this->encrypting( $password );
	}

	function __destruct()
	{
		unset( $this );
	}
	
	// LOGIN
	public function login()
	{
		$this->browseUser();
		$this->newSession();

		return ( $this->status );
	}

		
	// BROWSE USER
	public function browseUser()
	{    
		$this->query = "
			SELECT 		name, email, password, state, account
			FROM 		usuarios 
			WHERE 		email = '$this->user' 
			AND 		password =  '$this->password' ";
		$this->get_results_from_query();

		if( count($this->rows) == 1 ):

			foreach( $this->rows[0] as $valor):
				$propiedad[] = $valor;
			endforeach;

			$this->name = $propiedad[0];
			$this->state = $propiedad[3];
			$this->account = $propiedad[4];

		else:
			header('Location: ../portal/indexp.php');

		endif;
	}

	// SESSION START
	private function varSession()
	{
		session_name("user");
		session_start();
	}

	/// NEW SESSION
	public function newSession()
	{
		//$this->varSession();
		$_SESSION["authenticated"] = true;
		$_SESSION["name"] = $this->name;
		$_SESSION["user"] = $this->user;
		$_SESSION["state"] = $this->state;
		$_SESSION["account"] = $this->account;
		$this->status = true;
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
		$this->status = false;

	}
	// ENCRYPTING PASSWORD
	private function encrypting( $password )
	{
		$this->password = hash('sha1', $password);
	}

}

?>