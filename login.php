<?php include_once 'config/init.php'; ?>

<?php

$user = new User;

$template = new Template('templates/login.html.php');

if(isset($_POST['login'])) {
	$email = $_POST['user-email'];
	$password = $_POST['user-password'];

	if($user->checkEmail($email)) {
		if($user->checkPassword($password)) {
			$_SESSION['user'] = $user->getUser($email);
			redirect('index.php','You have successfully logged In.','success');
		} else {
			redirect('login.php','Incorrect Password','success');
		}
	} else {
		redirect('login.php','Incorrect Email Address','error');
	}

}

echo $template;