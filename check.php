<?php
$mysql = new mysqli('localhost','root','','register-form');

if (!isset($_POST['email'])) {
    echo "Email field not passed";
    exit();
}
if (empty($_POST['email'])) {
    echo "The email field cannot be left empty";
    exit();
}

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 3 || mb_strlen($login) > 99){
    echo "Login length is invalid";
    exit();
}else if(mb_strlen($email) < 2 || mb_strlen($email) > 50){
    echo "The mail length is not allowed";
    exit();
} else if(mb_strlen($password) < 6 || mb_strlen($password) > 33){
    echo "Password length is invalid";
    exit();
}

$password = md5($password."");

$mysql->query("INSERT INTO `users` (`login`, `email`, `password`)
VALUES('$login','$email','$password')");

$mysql->close();

header('Location: /');
exit();
?>
