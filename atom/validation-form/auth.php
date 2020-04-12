<?php
$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING);

if(mb_strlen($login)<5||mb_strlen($login)>90){
  echo "Недопустимая длина логина";
  exit();
}else if(mb_strlen($pass)<2||mb_strlen($pass)>6){
  echo "Недопустимая длина пароля (от 2 до 6 символов)";
  exit();
}

$pass = md5($pass."greagrea2321");

$mysql = new mysqli('localhost','root','','register-bd');


$result = $mysql->query("SELECT*FROM `users` WHERE `login`= '$login' AND `pass`= '$pass'");

$user = $result->fetch_assoc();
if(count($user)==0){
  echo "Такой пользователь не найден";
  exit();
}

setcookie('user', $user['name'], time() + 3600, "/atom");

$mysql->close();

header('Location: /atom')
 ?>
