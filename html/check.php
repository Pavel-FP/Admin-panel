<?php
date_default_timezone_set('Asia/Novosibirsk');
$date = date("Y-m-d H:i:s");
   $role = filter_var(trim($_POST['role']),FILTER_SANITIZE_STRING);
   $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
   $password = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
   $email = 'youremail@sample.com';
   $phone = '1';
   $img = '../img/default-user.png';


    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysql = new mysqli('localhost', 'root', '', 'reg_user');
    $usercookie = $_COOKIE['user'];
    
    $reg = $mysql->query("INSERT INTO `polzovateli`(role, login, pass, email, phone, img) VALUES ('$role', '$login', '$password', '$email', '$phone', '$img')");


    $result = $mysql->query("SELECT * FROM polzovateli WHERE `login`= '$usercookie'");
    $user = $result->fetch_assoc();
    $iduser = $user['id'];
    $log = $mysql->query("INSERT INTO `log`(textLog, `date`, `user_id`) VALUES ('добавил пользователя $login', '$date', '$iduser')");
    header('Location: /html/users.php');
    $mysql->close();
?>