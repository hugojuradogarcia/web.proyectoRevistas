<?php 

//require_once('phpUserAgent.php');
//require_once('phpUserAgentStringParser.php');

function session( $email )
{

	$new_user_session = array(
		"email" 		=> $email ,
		"session_id" 	=> session_id() ,
		"date" 			=> date('Y-m-d') ,
		"flag"			=> 1 );

	return ( $new_user_session );

}
?>