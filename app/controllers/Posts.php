<?php 

class Posts extends Controller {

	function index() {
		$data = [];
		$this->view('posts/index', $data);
	}

}