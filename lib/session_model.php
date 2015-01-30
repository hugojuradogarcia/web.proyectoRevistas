<?php 

require_once('.../connection/db_abstract_model.php');

class Session extends db_abstract_model
{

	public 		name;
	public 		user;
	private 	session_id;
	private 	ip;

	function __construct()
	{
		$this->db_name = 'mvc';
	}

	function __destruct()
	{
		unset( $this );
	}

	public function get_data_session()
	{

	}

	public function set_data_session()
	{

	}

	public function edit_data_session()
	{

	}


}

 ?>