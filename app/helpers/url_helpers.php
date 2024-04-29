<?php

// Simple page redirect
function redirect(string $page) : void {
	header("location: " . URLROOT . '/' . $page);
}


