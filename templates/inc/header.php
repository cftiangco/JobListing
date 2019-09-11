<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?php echo SITE_TITLE; ?></title>
</head>
<body>
<div class="container">
      <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
            <?php if($_SESSION['user']): ?>

                <li class="nav-item">
                    <a class="nav-link" href="create.php">Create Listing</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>

            <?php else: ?>

                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>

            <?php endif; ?>

            </ul>
            </nav>
        <h3 class="text-muted">JobsListing</h3>
      </div>
      <?php echo displayMessage(); ?>