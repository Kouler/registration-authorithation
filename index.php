<?php
session_start();

 ?>

 <!DOCTYPE html>
 <html lang="ru">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

<?php
if ($_COOKIE['user'] == ''):
?>
   <link rel="shortcut icon" href="/images/x.png" type="image/x-icon">
   <title>Форма регистрации</title>
<?php
else:
  ?>
  <link rel="shortcut icon" href="/images/y.png" type="image/x-icon">
  <title>Logged <?=$_COOKIE['login']?></title>
<?php
endif;
  ?>
  </head>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="css/index.css">
 <body class="container-fluid">

<?php
if ($_COOKIE['user'] == ''):
?>

 <div class="container mt-4">
   <p class="text-danger" style="text-align: center"> Зарегистрируйтесь или войдите в систему, чтобы получить доступ.</p>
   <p class="text-danger" style="text-align: center"> Будьте осторожны, Виктор Шмелёв может не одобрить ваше присутствие здесь...</p>
   <div class="row">
     <div class="col">

       <form action="source/check.php" method="post">
         <h1 class="display-4">Форма <kbd>Регистрации</kbd></h1>
         <input type="login" class="form-control" name="login" id="login"
         placeholder="Придумайте логин...">
         <input type="text" class="form-control" name="name" id="name"
         placeholder="Ваше имя...">
         <input type="password" class="form-control" name="password" id="password"
         placeholder="Придумайте пароль...">
         <input type="password" class="form-control" name="password_conf" id="password_conf"
         placeholder="Повторите пароль...">
         <button type="submit" class="btn btn-primary" name="button_reg">Зарегистрировать</button>
       </form>
     </div>
     <div class="col">

       <form action="source/auth.php" method="post" style="float: right; width: 500px">
         <h1 class="display-4" style="float: right"><kbd>Войти</kbd> в мой аккаунт</h1>
         <input type="text" class="form-control" name="login" id="login"
         placeholder="Ваш логин...">
         <input type="password" class="form-control" name="password" id="password"
         placeholder="Ваш пароль...">
         <button type="submit" class="btn btn-success" style="float: right" name="button_auth">Войти</button>
       </form>
     </div>
    </div>
  </div>
<?php
else:
  ?>
  <form action="source/exit.php" style="float: right" method="post">
  <button type="submit" class="btn btn-danger" name="button_exit">Выйти</button>
</form>
  <h1 class="display-4">Здравствуйте, <kbd class='bg-primary'><?= $_COOKIE['user']?></kbd></h1>
  <p class="text-success">Вы получили доступ к информации на этом сайте.</p><br><br><p>Если хотите, чтобы никто не узнал
  о том, что вы здесь читаете, выйдите из аккаунта...</p>

<?php
endif;
?>


 <!--
 <form>
   <p>Придумайте логин:</p>
   <p><input name="ip" class="field" pattern="[A-Za-z]{4,}" autofocus> не менее 4 латинских букв.</p>
   <p>Введите имя:</p>
   <p><input name="ip" class="field" pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}"></p>
   <p>Пароль:</p>

   <p><input name="ip" class="field" pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}"></p>
   <p>Подтвердите пароль:</p>
   <p><input name="ip" class="field" pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}"></p>
   <p><input type="submit" value="Зарегистрироваться"></p>
 </form>
 -->
 </body>
 </html>
