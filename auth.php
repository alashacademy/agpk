<?php
  
  $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

  $mysql = new mysqli('localhost', 'root', 'root', 'agpk');

  $result = $mysql->query("SELECT * FROM `register` WHERE `login` = '$login' AND `pass` = '$pass'");
  
  $user = $result->fetch_assoc();
  if(count($user) == 0) {
    echo "Такой пользватель не найден";
    exit();
  } 

  $mysql->close();

  header('Location: index.html')
?>