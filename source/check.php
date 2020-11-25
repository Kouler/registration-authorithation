<?php
  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
  $password_conf = filter_var(trim($_POST['password_conf']), FILTER_SANITIZE_STRING);

  if (mb_strlen($login) < 5 || mb_strlen($login) > 19) {
    echo "Длина логина должна быть больше 5 и меньше 20 символов!";
    exit();
  } else if (mb_strlen($name) < 2 || mb_strlen($name) > 49) {
    echo "Длина имени должна быть больше 1 и меньше 50 символов!";
    exit();
  } else if (mb_strlen($password) < 6 || mb_strlen($password) > 20) {
    echo "Длина пароля должна быть больше 6 и меньше 20 символов!";
    exit();
  } else if ($password != $password_conf) {
    echo "Введённые пароли не совпадают!";
    exit();
  }


  $my_sql = new mysqli('localhost'/*host*/, 'root' /*user*/, 'root' /*password*/, 'register_bd' /*DB_name*/);

  $result = $my_sql->query("SELECT * FROM `users` WHERE (`login` =
  '$login')");
  $user = $result->fetch_assoc();

  if (count($user) != 0) {
    echo "Извините. Пользователь с таким логином уже занят. Попробуйте придумать другой.";
    exit();
  }

  $hashed_pas = md5($password."hl1k32j5gGGn");
  $my_sql->query("INSERT INTO `users` (`login`, `password`, `name`)
  VALUES ('$login', '$hashed_pas', '$name')");
  $my_sql->close();

  header('Location: /');
?>
