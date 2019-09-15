<?php include_once 'config/init.php' ?>

<?php

$user = new User;

$template = new Template('templates/myaccount.html.php');

if($_SESSION['user']) {
	$template->user = $user->getUser($_SESSION['user']->email_address);

	if(isset($_POST['submit'])) {
		$data = [
			':id' => $_POST['user-id'],
			':first_name' => $_POST['user-firstname'],
			':middle_name' => $_POST['user-middlename'],
			':last_name' => $_POST['user-lastname'],
			':email_address' => $_POST['user-email'],
			':contact_number' => $_POST['user-contact']
		];

		if($user->update($data)) {
			redirect('myaccount.php?id=' . $_POST['user-id'] ,'You have successfully updated your account','success');
		} else {
			//redirect('myaccount.php?id=' . $_POST['user-id'] ,'Something went wrong.','error');
		}
	}
	echo $template;
} else {
	redirect('login.php','Sorry you are not Log In.','error');
}
