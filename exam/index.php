<?php
include('functions.php');
if (!isLoggedIn()){
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="header">
    <h2>Home Page</h2>
</div>
<div class="content">
    <?php if(isset($_SESSION['success'])) : ?>
        <div class="alert alert-success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <?php
    if(isset($_SESSION['user'])) : ?>
        <strong><?php echo $_SESSION['user']['username']; ?></strong>

        <small>

            <a href="index.php?logout='1' style="...">Logout</a>
        </small>
    <?php endif ?>
</div>
</body>
</html>