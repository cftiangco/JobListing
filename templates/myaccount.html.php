<?php include_once 'inc/header.php' ?>
	<h2 class="page-header"><?= $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name ?></h2>

	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="pt-4">
		<input type="hidden" name="user-id" value="<?= $user->id ?>">
		<div class="form-row">
			<div class="form-group col-md-4">
		      <label for="user-firstname">First Name</label>
		      <input type="text" class="form-control" id="user-firstname" placeholder="Firstname" name="user-firstname" value="<?= $user->first_name ?>">
		    </div>

		    <div class="form-group col-md-4">
		      <label for="user-middlename">Middle Name</label>
		      <input type="text" class="form-control" id="user-middlename" placeholder="Middlename" name="user-middlename" value="<?= $user->middle_name ?>">
		    </div>

		    <div class="form-group col-md-4">
		      <label for="user-lastname">Last Name</label>
		      <input type="text" class="form-control" id="user-lastlename" placeholder="Lastname" name="user-lastname" value="<?= $user->last_name ?>">
		    </div>

		 </div>

		 <div class="form-row">
			
			<div class="form-group col-md-6">
		      <label for="user-email">Email Address</label>
		      <input type="text" class="form-control" id="user-email" placeholder="sample@email.com" name="user-email" value="<?= $user->email_address ?>">
		    </div>

		    <div class="form-group col-md-6 pb-2">
		      <label for="user-contact">Contact Number</label>
		      <input type="text" class="form-control" id="user-contact" placeholder="Contact number" name="user-contact" value="<?= $user->contact_number ?>">
		    </div>

		 </div>

		 <button type="submit" class="btn btn-primary" name="submit">Update Account</button>

		 <div class="pt-2 float-right">
		 	<a href="#">Change my password</a>
		</div>
	</form>
	<br/><br/>
<?php include_once 'inc/footer.php' ?>