<?php include_once 'inc/header.php' ?>
	<h2 class="page-header">
		<?php echo '<strong>' . $job->job_title .'</strong>'. ' ' . "($job->location)" ?>
	</h2>
	<small>Posted By: <?php echo $job->first_name. ' ' .$job->last_name;?> on <?php echo $job->created_at; ?></small>
	<hr>
	<p class="lead"><?php echo $job->description;?></p>
		<ul class="list-group">
			<li class="list-group-item"><strong>Company: </strong><?php echo $job->company; ?></li>
			<li class="list-group-item"><strong>Salary: </strong><?php echo $job->salary; ?></li>
			<li class="list-group-item"><strong>Contact Person: </strong><?php echo $job->contact_user; ?></li>
			<li class="list-group-item"><strong>Contact No.: </strong><?php echo $job->company_contact; ?></li>
			<li class="list-group-item"><strong>Contact Email: </strong><?php echo $job->contact_email; ?></li>
		</ul>
		<br /><br />
		<a href="index.php">Go Back</a>

		<br/><br/>

	<?php if($job->user_id == $_SESSION['user']->id): ?>
		<div class="well">
			<a href="edit.php?id=<?php echo $job->jid; ?>" class="btn btn-info">Edit</a>
			<form method="POST" action="job.php" style="display: inline">
				<input type="hidden" name="job-id" value="<?php echo $job->jid;?>" >
				<button type="submit" value="delete" class="btn btn-danger">Delete</button>
			</form>
			<a href="print.php?id=<?= $job->jid ?>" class="btn btn-warning">Print</a>
		</div>
	<?php else: ?>
		<div class="well">
			<a href="print.php?id=<?= $job->jid ?>" class="btn btn-warning">Print</a>
		</div>
	<?php endif; ?>
	<br>
<?php include_once 'inc/footer.php' ?>
