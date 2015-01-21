<?php  

require_once('../connection/db_abstract_model.php');

class Login extends DBAbstractModel
{
	// DEFINIENDO ATRIBUTOS
	private $_name;
	private $_user;
	private $_password;
	private $_nivel;
	private $_status = false;

	// METODOS MAGICOS
	function __construct( $user = '', $password = '' )
	{
		$this->db_name = 'mvc';

		$this->_user = $user;
		$this->_password = $password;
	}

	function __destruct()
	{
		unset($this);
	}
	
	// LOGIN
	public function login()
	{
		$this->browseUser();
		$this->newSession();

		return (true);
	}

		
	// BROWSE USER
	public function browseUser()
	{    

		if ( $this->_user && $this->_password ):

			$this->query = "
				SELECT 		name, email, password, account
				FROM 		usuarios 
				WHERE 		email = '$this->_user' 
				AND 		password =  '$this->_password' ";
			$this->get_results_from_query();

			if( count($this->rows) <> 0 ):
				echo "Validado con EXITO: ";
				echo $this->rows[0];
				if ( count($this->rows) == 1 ):
					foreach( $this->rows[0] as $valor):
						$propiedad[] = $valor;
					endforeach;
				endif;

				$this->_name = $propiedad[0];
				$this->_nivel = $propiedad[3];

			else:
				//header('Location: ../login.php');

			endif;

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
		$this->varSession();
		$_SESSION["authenticated"] = true;
		$_SESSION["user"] = $this->_name;
		$_SESSION["access_level"] = $this->_nivel;
		$this->_status = true;
	}

	// GET STATUS SESSION
	public function getStatus()
	{
		$this->varSession();
		$this->_status = $_SESSION["authenticated"];
		return $this->_status;
	}

	// CLOSE SESSION
	public function closeSession()
	{
		$this->varSession();
		session_unset();
		session_destroy();
		unset($_SESSION["user"]);
		unset($_SESSION["authenticated"]);
		$this->_status;
		header("Location: index.php");
	}

}

?>