<?php 

class Users extends Controller {

	function __construct() {

	}

	function register() {
		// check for POST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Process form
		}
		else {
			// Init data
			$data = [
				'name' 						 			 => '',
				'email' 					 			 => '',
				'password' 				 			 => '',
				'confirm_password' 			 => '',
				'name_error' 			 			 => '',
				'email_error'			 			 => '',
				'password_error'	 			 => '',
				'confirm_password_error' => '',
			];

			$this->view('users/register', $data);
		}


	}

	function login() {
		// check for POST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Process form
		}
		else {
			// Init data
			$data = [
				'email' 					 			 => '',
				'password' 				 			 => '',
				'email_error'			 			 => '',
				'password_error'	 			 => '',
			];

			$this->view('users/login', $data);
		}


	}

}