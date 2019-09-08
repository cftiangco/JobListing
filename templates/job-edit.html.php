<?php include_once 'inc/header.php' ?>
	<h2 class="page-header">Update Job Listing</h2>
	<form method="POST" action="edit.php?id=<?php echo $job->id;?>">

		<div class="form-group">
			<label>Company</label>
			<input type="text" class="form-control" name="company" value="<?php echo $job->company; ?>">
		</div>

		<div class="form-group">
			<label>Category</label>
			<select name="category" class="form-control">
				<option selected default>Choose...</option>
				<?php foreach($categories as $category): ?>
					<?php if($job->category_id == $category->id): ?>
						<option value="<?php echo $category->id; ?>" selected> <?php echo $category->name;?></option>
					<?php else: ?>
						<option value="<?php echo $category->id; ?>"><?php echo $category->name;?></option>
					<?php endif;?>

				<?php endforeach;?>
			</select>
		</div>

		<div class="form-group">
			<label>Job Title</label>
			<input type="text" class="form-control" name="job-title" value="<?php echo $job->job_title; ?>">
		</div>

		<div class="form-group">
			<label>Description</label>
			<textarea class="form-control" name="description"><?php echo $job->description; ?></textarea>
		</div>

		<div class="form-group">
			<label>Location</label>
			<input type="text" class="form-control" name="location" value="<?php echo $job->location; ?>">
		</div>

		<div class="form-group">
			<label>Salary</label>
			<input type="text" class="form-control" name="salary" value="<?php echo $job->salary; ?>">
		</div>

		<div class="form-group">
			<label>Contact User</label>
			<input type="text" class="form-control" name="contact-user" value="<?php echo $job->contact_user; ?>">
		</div>

		<div class="form-group">
			<label>Contact Email</label>
			<input type="email" class="form-control" name="contact-email" value="<?php echo $job->contact_email; ?>">
		</div>

		<input type="submit" name="submit" value="Submit" class="btn btn-primary">
	</form>
	<br/><br/>
<?php include_once 'inc/footer.php' ?>