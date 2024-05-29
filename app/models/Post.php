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
}
