<?php 

class Posts extends Controller {

	function __construct() {
		// no user logged in redirect to login
		if ( ! isLoggedIn()) {
			redirect('users/login');
		}

		$this->postModel = $this->model('Post');
	}

	function index() {
		// get posts
		$posts = $this->postModel->getPosts();

		$data = [
			'posts' => $posts,
		];

		$this->view('posts/index', $data);
	}

	function add() {
		$data = [
			'title' => '',
			'content' => '',
		];

		$this->view('posts/add', $data);
	}

}