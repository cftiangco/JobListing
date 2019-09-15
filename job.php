<?php include_once 'config/init.php'; ?>
<?php

$job = new Job;

$template = new Template('templates/job.html.php');

//GET JOB ID
$id = $_GET['id'] ?? null;

if(isset($_POST['job-id'])) {
	$delId = $_POST['job-id'];
	if($job->delete($delId)) {
		redirect('index.php','Job Successfully Deleted.','success');
	} else {
		redirect('index.php','Something went wrong.','delete');
	}
}

//PASSED JOB RESULT
$template->job = $job->findOne($id);
//EXECUTE TEMPLATE
echo $template;