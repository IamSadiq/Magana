<?php

class User
{
	var $user;
	var $user_count;

	//konstruktur
	function User()
	{
		//$this->set_user($username);
	}

	function set_user($username){
		$this->$user = $username;
	}

	function get_user(){
		return $this->$user;
	}
}

?>