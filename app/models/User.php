<?php

class User {

	private $db;

	function __construct() {
	  $this->db = new Database;
	}

	function register(array $data) : bool {
		$this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

		// Bind values
		$this->db->bind(':name', $data['name']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':password', $data['password']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	// Find user by email
	function findUserByEmail(string $email) {
		$this->db->query('SELECT * FROM users WHERE email = :email');
		$this->db->bind(':email', $email);

		$row = $this->db->single();

		// Check row
		if ($this->db->rowCount() > 0) {
			return true;
		}
		else {
			return false;
		}
	}
}
