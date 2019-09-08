<?php include_once 'inc/header.php' ?>
	<h2 class="page-header">
		<?php print_r($job->job_title); ?> (<?php echo $job->location ?>)
	</h2>
	<small>Posted By: <?php echo $job->contact_user;?> on <?php echo $job->created_at; ?></small>
	<hr>
	<p class="lead"><?php echo $job->description;?></p>
		<ul class="list-group">
			<li class="list-group-item"><strong>Company: </strong><?php echo $job->company; ?></li>
			<li class="list-group-item"><strong>Salary: </strong><?php echo $job->salary; ?></li>
			<li class="list-group-item"><strong>Contact Email: </strong><?php echo $job->contact_email; ?></li>
		</ul>
		<br /><br />
		<a href="index.php">Go Back</a>

		<br/><br/>

		<div class="well">
			<a href="edit.php?id=<?php echo $job->id?>" class="btn btn-info">Edit</a>

			<form method="POST" action="job.php" style="display: inline">
				<input type="hidden" name="job-id" value="<?php echo $job->id;?>" >
				<button type="submit" value="delete" class="btn btn-danger">Delete</button>
			</form>
		</div>
<?php include_once 'inc/footer.php' ?>