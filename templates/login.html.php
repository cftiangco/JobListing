<?php include_once 'inc/header.php' ?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="user-email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="user-password">
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>
<?php include_once 'inc/footer.php' ?>