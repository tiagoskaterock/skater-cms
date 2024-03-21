<?php 

class Pages extends Controller {

	function __construct() {
		
	}

	function index() {	
		$data = [
			'title' => 'Welcome to PHP Skater CMS!',
		];

		$this->view('pages/index', $data);
	}

	function about() {	
		$data = [
			'title' => 'About Us',
		];	
		$this->view('pages/about', $data);
	}

}
