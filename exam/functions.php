<?php
session_start();

$db = mysqli_connect('localhost', 'root', 'labas', 'examdata');



$username = "";
$email = "";
$errors = array ();

if(isset($_POST['register_btn'])){
    register();
}

function register (){
    global $db, $errors, $username, $email;

    $username = escape($_POST['username']);
    $email = escape($_POST['email']);
    $password_1 = escape($_POST['password_1']);
    $password_2 = escape($_POST['password_2']);

    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($email)){
        array_push($errors, "Email is required");
    }
    if(empty($password_1)){
        array_push($errors, "Password is required");
    }
    if($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    if(count($errors) == 0){
        $password = md5($password_1);
            $query = "INSERT INTO users (username, email, password)
                      VALUES('$username', '$email', '$password')";
            mysqli_query($db, $query);
            
            $logged_in_user_id = mysqli_insert_id($db);

            $_SESSION['user'] = getUserById($logged_in_user_id);
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');



    }
}

function getUserById($id)
{
    global $db;
    $query = "SELECT * FROM users id=" . $id;
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}
function escape ($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));

}

function display_error(){
    global $errors;
    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}

function isLoggedIn(){
    if(isset($_SESSION['user'])){
        return true;
    }
    else{
        return false;
    }
}
if (isset($_POST['login_btn'])){
    login();
}

function login(){
    global $db, $username, $errors;

    $username = escape($_POST['username']);
    $password = escape($_POST['password']);


    if(empty($username)){
        array_push($errors, "Username is required");

    }
    if(empty($password)){
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0){
        $password = md5($password);

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1){
            $logged_in_user = mysqli_fetch_assoc($results);

                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');

        }
        else {
            array_push($errors, "Wrong username/password combination");
        }
    }

}














?>