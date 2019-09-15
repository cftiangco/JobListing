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
                    <a class="nav-link <?= $linkStatusAdmin ?>" href="index.php">Home</a>
                </li>
            <?php if($_SESSION['user']): ?>

                <li class="nav-item">
                    <a class="nav-link <?= $linkStatusCreate ?>" href="create.php">Post New Job</a>
                </li>

                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']->email_address?></a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="myaccount.php?id=<?php echo $_SESSION['user']->id ?>">My Account</a>
                            <a class="dropdown-item" href="#">Manage Posts</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>
                </li>

            <?php else: ?>

                <li class="nav-item">
                    <a class="nav-link" href="register.php">Sign Up</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>

            <?php endif; ?>

            </ul>
            </nav>
        <h3 class="text-muted">JobsListing</h3>
      </div>
      <?php echo displayMessage(); ?>