<?php include_once 'config/init.php'; ?>
<?php

$job = new Job;
$categories = new Category;
$template = new Template('templates/job-edit.html.php');
//$id = $_GET['id'] ?? null;
$id = isset($_GET['id']) ? $_GET['id'] : null;	
if(isset($_POST['submit'])) {
	$data = [
		':company' => $_POST['company'],
		':category_id' => $_POST['category'],
		':job_title' => $_POST['job-title'],
		':description' => $_POST['description'],
		':location' => $_POST['location'],
		':salary' => $_POST['salary'],
		':contact_user' => $_POST['contact-user'],
		':contact_number' => $_POST['contact-number'],
		':contact_email' => $_POST['contact-email'],
		':id' => $id
	];

	if($job->update($data)) {
		redirect('job.php?id='. $id,'Your job has been updated','success');
	} else {
		redirect('index.php','Something went wrong','error');
	}
}


$template->categories = $categories->getAll();
$template->job = $job->findOne($id);

echo $template;