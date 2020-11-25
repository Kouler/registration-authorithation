<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$hashed_pas = md5($password."hl1k32j5gGGn");

$my_sql = new mysqli('localhost'/*host*/, 'root' /*user*/, 'root' /*password*/, 'register_bd' /*DB_name*/);

$result = $my_sql->query("SELECT * FROM `users` WHERE (`login` =
'$login') AND (`password` = '$hashed_pas')");
$user = $result->fetch_assoc();


if (count($user) == 0) {
  echo "Неверный логин или пароль :(";
  exit();
}

setcookie('user', $user['name'], time() + 3600 * 24 * 7, "/");
setcookie('login', $user['login'], time() + 3600 * 24 * 7, "/");

$my_sql->close();
header('Location: /');

 ?>
