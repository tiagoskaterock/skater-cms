<?php

class Post {

	private $db;

	function __construct() {
		$this->db = new Database();
	}

	function getPosts() {
		$this->db->query("SELECT posts.id as id, title, content, posts.created_at as created_at, users.name as writer FROM `posts` JOIN users ON posts.user_id = user_id;");

		$results = $this->db->resultSet();

		return $results;
	}
}
