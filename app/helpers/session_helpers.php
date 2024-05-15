<?php

session_start();

// flash message helper
function flash(string $name = "", string $message = "", string $class = "alert alert-success") {

	if ( ! empty($name)) {

		if ( ! empty($message) and empty($_SESSION[$name])) {

			if ( ! empty($_SESSION[$name])) {
				unset($_SESSION[$name]);
			}

			if ( ! empty($_SESSION[$name . '_class'])) {
				unset($_SESSION[$name . '_class']);
			}

			$_SESSION[$name] = $message;
			$_SESSION[$name . '_class'] = $class;
		} 
		elseif( empty($message) and ! empty($_SESSION[$name])) {
			$class = ! empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : ''; ?>
			<div 
				class="<?= $class ?>"
				id="msg-flash"
			>
			<?= $_SESSION[$name] ?>
			</div> <?php
			unset($_SESSION[$name]);
			unset($_SESSION[$name . '_class']);
		}

	}
}

function isLoggedIn() : bool {
	return isset($_SESSION['user_id']);
}
