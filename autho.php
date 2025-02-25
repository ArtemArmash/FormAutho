<?php

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);



$password = md5($password."");

$mysql = new mysqli('localhost','root','','register-form');
$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'
 AND `password` = '$password'");

$user = $result->fetch_assoc();

if(!$user){
       
    echo "Такой пользователь или пароль не найден";
    exit();
        
}


setcookie('user', $user['login'], time()+3600, "/");


$mysql->close();

header('Location: /');

?>