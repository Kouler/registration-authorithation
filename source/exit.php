<?php


setcookie('user', $user['name'], time() - 3600 * 24 * 7, "/");
setcookie('login', $user['login'], time() - 3600 * 24 * 7, "/");


header('Location: /');

 ?>
