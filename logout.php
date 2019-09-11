<?php include_once 'config/init.php' ?>

<?php 

	if($_SESSION['user']) {
		unset($_SESSION['user']);
		redirect('login.php','You have been successfully logout.','success');
	}

echo $template;