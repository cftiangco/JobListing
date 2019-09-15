<?php include_once 'config/init.php'; ?>
<?php

$categories = new Category;
$job = new Job;

$template = new Template('templates/job-create.html.php');

//CHECK USER IF LOGIN
if($_SESSION['user']) {
	if(isset($_POST['submit'])) {
	
		$data = array(
			':company' => $_POST['company'],
			':category_id' => $_POST['category'],
			':job_title' => $_POST['job-title'],
			':description' => $_POST['description'],
			':location' => $_POST['location'],
			':salary' => $_POST['salary'],
			':contact_user' => $_POST['contact-user'],
			':contact_number' => $_POST['contact-number'],
			':contact_email' => $_POST['contact-email'],
			':user_id' => $_SESSION['user']->id
		);
		if($job->create($data)) {
			redirect('index.php','Your job has been listed','success');
		} else {
			redirect('index.php','Something went wrong','error');
		}
	}
	$template->categories = $categories->getAll();
	$template->linkStatusCreate = 'active';
	echo $template;
} else {
	redirect('login.php','Sorry you are not Log In.','error');
}



