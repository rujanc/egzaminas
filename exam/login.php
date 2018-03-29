<?php include ('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="header">
    <h2 class="login-title">Login</h2>
</div>
<div class="container_login">
<form method="post" action="login.php" class="form-login">
    <?php echo display_error();?>
    <div class="form-group">
        <label for="username">Username</label>
        <input name="username" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password">
    </div>
    <button name="login_btn" type="submit" class="btn btn-primary">Log in</button>
    <p>
        Not yet a member? <a href="register.php">Sign up</a>
    </p>
</form>
</div>

</body>
</html>
