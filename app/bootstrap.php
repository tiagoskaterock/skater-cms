<?php 

// config
require_once 'config/config.php';

// load helpers
require_once('helpers/url_helpers.php');
require_once('helpers/session_helpers.php');

// autoload core libraries
spl_autoload_register(function($className) {
	require_once 'libraries/' . $className . '.php';	
});



