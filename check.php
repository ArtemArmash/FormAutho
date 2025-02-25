<?php
$mysql = new mysqli('localhost','root','','register-form');

if (!isset($_POST['email'])) {
    echo "Поле email не передано";
    exit();
}
if (empty($_POST['email'])) {
    echo "Поле email не може бути порожнім";
    exit();
}

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 3 || mb_strlen($login) > 99){
    echo "Недопустима длина логина";
    exit();
}else if(mb_strlen($email) < 2 || mb_strlen($email) > 50){
    echo "Недопустима длина почты";
    exit();
} else if(mb_strlen($password) < 6 || mb_strlen($password) > 33){
    echo "Недопустима длина пароля";
    exit();
}

$password = md5($password."");

$mysql->query("INSERT INTO `users` (`login`, `email`, `password`)
VALUES('$login','$email','$password')");

$mysql->close();

header('Location: /');
exit();
?>
