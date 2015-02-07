<?php 

//require('db_abstract_model.php');

class Auditor extends DBAbstractModel
{

	public $user;
	public $date;
	public $route;
	public $page;
	public $browser;
	public $ip;

	function __construct()
	{
		$this->db_name = 'mvc';
	}

	function __destruct()
	{
		unset($this);
	}

	public function set_auditor( $data_auditor = array() )
	{
		foreach ( $data_auditor as $campo=>$valor ):
			$$campo = $valor;
		endforeach;

		$this->query = "
			INSERT INTO 	auditor
			( user, date, route, page, browser, ip )
			VALUES 
			( '$user', '$date', '$route', '$page', '$browser', '$ip' ) 
		";
		$this->execute_single_query();
	}

}

?>