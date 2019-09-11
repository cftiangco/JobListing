<?php include_once 'inc/header.php' ?>
	<h2 class="page-header">User Registration</h2>

	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="pt-5">
		<div class="form-row">

			<div class="form-group col-md-4">
		      <label for="user-firstname">First Name</label>
		      <input type="text" class="form-control" id="user-firstname" placeholder="Firstname" name="user-firstname">
		    </div>

		    <div class="form-group col-md-4">
		      <label for="user-middlename">Middle Name</label>
		      <input type="text" class="form-control" id="user-middlename" placeholder="Middlename" name="user-middlename">
		    </div>

		    <div class="form-group col-md-4">
		      <label for="user-lastname">Last Name</label>
		      <input type="text" class="form-control" id="user-lastlename" placeholder="Lastname" name="user-lastname">
		    </div>

		 </div>

		 <div class="form-row">
			
			<div class="form-group col-md-6">
		      <label for="user-email">Email Address</label>
		      <input type="text" class="form-control" id="user-email" placeholder="sample@email.com" name="user-email">
		    </div>

		    <div class="form-group col-md-6">
		      <label for="user-contact">Contact Number</label>
		      <input type="text" class="form-control" id="user-contact" placeholder="Contact number" name="user-contact">
		    </div>

		 </div>
		 <hr>
		 <div class="form-row">
			
			<div class="form-group col-md-6">
		      <label for="user-password">Password</label>
		      <input type="password" class="form-control" id="user-password" placeholder="Password" name="user-password">
		    </div>

		    <div class="form-group col-md-6">
		      <label for="user-confirm-password">Confirm Password</label>
		      <input type="password" class="form-control" id="user-confirm-password" placeholder="Re-type Password" name="user-confirm-password">
		    </div>

		 </div>
		 <button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>
	<br/><br/>
<?php include_once 'inc/footer.php' ?>