<?php

//redirect page
function redirect($page = FALSE, $message = NULL,$message_type=NULL) {
	//CHECK IF MESSAGE IS STRING
	if(is_string($page)) {
		$location = $page;
	} else {
		$location = $_SERVER['SCRIPT_NAME'];
	}

	//CHECK FOR MESSAGE
	if($message != NULL) {
		$_SESSION['message'] = $message;
	}

	//CHECK FOR MESSAGE TYPE
	if($message_type != NULL) {
		$_SESSION['message_type'] = $message_type;
	}

	//REDIRECT
	header('Location: ' .$location);
	exit;
}

function displayMessage() {
	if(!empty($_SESSION['message'])) {

		//ASSIGN MESSAGE VAR
		$message = $_SESSION['message'];

		if(!empty($_SESSION['message_type'])) {

			//ASSIGN MESSAGE TYPE
			$message_type = $_SESSION['message_type'];

			//CREATE OUTPUT
			if($message_type == 'error') {
				echo '<div class="alert alert-danger">' . $message . '</div>';
			} else {
				echo '<div class="alert alert-success">' . $message . '</div>';
			}
		}

		//UNSET MESSAGE
		unset($_SESSION['message']);
		unset($_SESSION['message_type']);
	} else {
		echo '';
	}

}