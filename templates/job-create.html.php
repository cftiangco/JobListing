<?php include_once 'inc/header.php' ?>
	<h2 class="page-header">Create Job Listing</h2>
	<form method="POST" action="create.php">

		<div class="form-group">
			<label>Company</label>
			<input type="text" class="form-control" name="company">
		</div>

		<div class="form-group">
			<label>Category</label>
			<select name="category" class="form-control">
				<option selected default>Choose...</option>
				<?php foreach($categories as $category): ?>
					<option value="<?php echo $category->id; ?>">
						<?php echo $category->name; ?>
					</option>
				<?php endforeach;?>
			</select>
		</div>

		<div class="form-group">
			<label>Job Title</label>
			<input type="text" class="form-control" name="job-title">
		</div>

		<div class="form-group">
			<label>Description</label>
			<textarea class="form-control" name="description"></textarea>
		</div>

		<div class="form-group">
			<label>Location</label>
			<input type="text" class="form-control" name="location">
		</div>

		<div class="form-group">
			<label>Salary</label>
			<input type="text" class="form-control" name="salary">
		</div>

		<div class="form-group">
			<label>Contact User</label>
			<input type="text" class="form-control" name="contact-user">
		</div>

		<div class="form-group">
			<label>Contact Email</label>
			<input type="email" class="form-control" name="contact-email">
		</div>

		<input type="submit" name="submit" value="Submit" class="btn btn-primary">
	</form>
	<br/><br/>
<?php include_once 'inc/footer.php' ?>