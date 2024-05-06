<?php 

class Users extends Controller {

	function __construct() {
		$this->userModel = $this->model('User');
	}

	function register() {
		// check for POST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Process form

			// Sanitize post data
			$_POST[] = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			// Init data
			$data = [
				'name' 						 			 => trim($_POST['name']),
				'email' 					 			 => trim($_POST['email']),
				'password' 				 			 => trim($_POST['password']),
				'confirm_password' 			 => trim($_POST['confirm_password']),
				'name_error' 			 			 => '',
				'email_error'			 			 => '',
				'password_error'	 			 => '',
				'confirm_password_error' => '',
			];

			// Validate email
			if (empty($data['email'])) {
				$data['email_error'] = 'Please enter email';				
			}
			else {
				// Check email
				if ($this->userModel->findUserByEmail($data['email'])) {
					$data['email_error'] = 'Email is already taken';									
				}
			}

			// Validate name
			if (empty($data['name'])) {
				$data['name_error'] = 'Please enter name';			
			}

			// Validate password
			if (empty($data['password'])) {
				$data['password_error'] = 'Please enter password';		
			}
			elseif(strlen($data['password']) < 6) {
				$data['password_error'] = 'password must be at least 6 characters';						
			}

			// Validate confirm password
			if (empty($data['confirm_password'])) {
				$data['confirm_password_error'] = 'Please enter confirm_password';		
			}
			else{
				if ($data['password'] != $data['confirm_password']) {
					$data['confirm_password_error'] = 'Passwords do not match';		
				}
			}

			// Make sure errors are empty
			if (empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
				// Validated

				// Hash password
				$data['password']  = password_hash($data['password'], PASSWORD_DEFAULT);

				// Register user
				if($this->userModel->register($data)) {
					flash('register_success', 'You are registered and can log in');
					redirect('users/login');
				} else {
					die('Something went wrong...');
				}				
				die;
			}
			else {
				// Load view with errors
				$this->view('users/register', $data);				
			}

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
			// Sanitize post data
			$_POST[] = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			// Init data
			$data = [
				'email' 					 			 => trim($_POST['email']),
				'password' 				 			 => trim($_POST['password']),
				'email_error'			 			 => '',
				'password_error'	 			 => '',
			];

			// Validate email
			if (empty($data['email'])) {
				$data['email_error'] = 'Please enter email';				
			}

			// Validate password
			if (empty($data['password'])) {
				$data['password_error'] = 'Please enter password';		
			}

			// Check for user/email
			if ($this->userModel->findUserByEmail($data['email'])) {
				// user found
			} else {
				// User not found
				$data['email_error'] = 'User not found.';
			}

			// Make sure errors are empty
			if (empty($data['email_error']) && empty($data['password_error'])) {
				// Validated
				// Check and set logged in user
				$loggedInUser = $this->userModel->login($data['email'], $data['password']);
				if ($loggedInUser) {
					$this->createUserSession($loggedInUser);

				} else {
					$data['password_error'] = 'Password incorrect.';
					$this->view('users/login', $data);
				}
			}
			else {
				// Load view with errors
				$this->view('users/login', $data);				
			}

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

	function createUserSession($user) : void {
		$_SESSION['user_id'] = $user->id;
		$_SESSION['user_email'] = $user->email;
		$_SESSION['user_name'] = $user->name;
		redirect('pages/index');
	}

	function logout() : void {
		unset($_SESSION['user_id']);
		unset($_SESSION['user_email']);
		unset($_SESSION['user_name']);
		session_destroy();
		redirect('users/login');
	}

	function isLoggedIn() : bool {
		return isset($_SESSION['user_id']);
	}

}