<?php 

class Pages extends Controller {

	function __construct() {
	}

	function index() {	
		$data = [
			'title' => 'Welcome to PHP Skater CMS!',
			'desc' => ' enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur.',
		];

		$this->view('pages/index', $data);
	}

	function about() {			
		$data = [
			'title' => 'Sobre',
			'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. ',
		];	
		$this->view('pages/about', $data);
	}

}
