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
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize post
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				'title'	        => trim($_POST['title']),
				'content'       => trim($_POST['content']),
				'user_id'       => $_SESSION['user_id'],
				'title_error'   => '',
				'content_error' => '',
			];

			// validate data
			if (empty($data['title'])) {
				$data['title_error'] = 'Plase enter title';
			}
			if (empty($data['content'])) {
				$data['content_error'] = 'Plase enter content';
			}

			// make sure no errors
			if ( empty($data['title_error']) and empty($data['content_error'])) {
				// validate
				if ($this->postModel->addPost($data)) {
					flash('post_message', 'Post added');
					redirect('posts');
				} else {
					die('Something went wrong');
				}
				
			} else {
				// load view with errors				
				$this->view('posts/add', $data);
			}

			$this->view('posts/add', $data);

		} else {
			$data = [
				'title' => '',
				'content' => '',
			];

			$this->view('posts/add', $data);			
		}

	}

	function edit($id) {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize post
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				'title'	        => trim($_POST['title']),
				'content'       => trim($_POST['content']),
				'user_id'       => $_SESSION['user_id'],
				'title_error'   => '',
				'content_error' => '',
			];

			// validate data
			if (empty($data['title'])) {
				$data['title_error'] = 'Plase enter title';
			}
			if (empty($data['content'])) {
				$data['content_error'] = 'Plase enter content';
			}

			// make sure no errors
			if ( empty($data['title_error']) and empty($data['content_error'])) {
				// validate
				if ($this->postModel->addPost($data)) {
					flash('post_message', 'Post added');
					redirect('posts');
				} else {
					die('Something went wrong');
				}
				
			} else {
				// load view with errors				
				$this->view('posts/edit', $data);
			}

			$this->view('posts/edit', $data);

		} else {
			// get post
			$this->postModel->getPost($id);

			// check for owner
			if ($post->user_id != $_SESSION['user_id']) {
				redirect('posts');
			}

			$data = [
				'id'		=> $id,
				'title' 	=> $post->title,
				'content' 	=> $post->content,
			];

			$this->view('posts/edit', $data);			
		}

	}

	function show($id) {
		// get post
		$post = $this->postModel->getPost($id);

		$data = [
			'post' => $post,
		];

		$this->view('posts/show', $data);
	}

}