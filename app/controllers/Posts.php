<?php 

class Posts extends Controller {

	function __construct() {
		// no user logged in redirect to login
		if ( ! isLoggedIn()) {
			redirect('users/login');
		}
	}

	function index() {
		$data = [];
		$this->view('posts/index', $data);
	}

}