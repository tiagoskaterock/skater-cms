<?php

class Post {

	private $db;

	function __construct() {
		$this->db = new Database();
	}

	function getPosts() {
		$this->db->query("SELECT posts.id as id, title, content, posts.created_at as created_at, users.name as writer FROM `posts` INNER JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC;");

		$results = $this->db->resultSet();

		return $results;
	}

	function getPost($id) {
		$this->db->query('SELECT posts.id as post_id, 
			posts.title as title, 
			posts.content as content, 
			posts.created_at as created_at, 
			users.name as writter,
			users.id as user_id
			FROM posts INNER JOIN users 
			ON posts.id = :id 
			AND posts.user_id = users.id;');
		$this->db->bind(':id', $id);

		$row = $this->db->single();

		// Check row
		if ($this->db->rowCount() > 0) {
			return $row;
		}
		return false;

	}

	function addPost($data) {
		$this->db->query('INSERT INTO posts (title, content, user_id) VALUES (:title, :content, :user_id)');

		// Bind values
		$this->db->bind(':title', $data['title']);
		$this->db->bind(':content', $data['content']);
		$this->db->bind(':user_id', $data['user_id']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function updatePost($data) {
	    $title = $data['title'];
	    $content = $data['content'];
	    
	    $this->db->query('UPDATE posts SET 
	        title = :title, 
	        content = :content
	        WHERE id = :post_id');

	    // Bind values
	    $this->db->bind(':title', $title);
	    $this->db->bind(':content', $content);
	    $this->db->bind(':post_id', $data['id']);

	    // Execute
	    if ($this->db->execute()) {
	        return true;
	    } else {
	        return false;
	    }
	}

}
