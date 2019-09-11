<?php include_once 'config/init.php'; ?>


<?php 

$user = new User;

$template = new Template('templates/register.html.php');

if(isset($_POST['submit'])) {

	if($_POST['user-password'] != $_POST['user-confirm-password']) {
		redirect('register.php','Password did not matched the confirm password.','error');
	} else {
		$data = [
			':first_name' => $_POST['user-firstname'],
			':middle_name' => $_POST['user-middlename'],
			':last_name' => $_POST['user-lastname'],
			':email_address' => $_POST['user-email'],
			':contact_number' => $_POST['user-contact'],
			':pass_word' => $_POST['user-password']
		];

		if($user->create($data)) {
			redirect('login.php','You have successfully registered you can now login.','success');
		} else {
			redirect('login.php','Something went wrong.','error');
		}

		print_r($data);
	}
	
}

echo $template;


