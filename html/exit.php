<?php
    date_default_timezone_set('Asia/Novosibirsk');
    $date = date("Y-m-d H:i:s");

    $mysqli = new mysqli('localhost', 'root', '', 'reg_user');
    $usercookie = $_COOKIE['user'];
    $result1 = $mysqli->query("SELECT * FROM polzovateli WHERE `login`= '$usercookie'");
    $usr = $result1->fetch_assoc();
    $iduser = $usr['id'];
    $log = $mysqli->query("INSERT INTO `log`(textLog, `date`, `user_id`) VALUES ('вышел из панели', '$date', '$iduser')");
    setcookie('user', $user['login'], time() - 3600, "/");
    setcookie('role', $user['role'], time() - 3600, "/");
    header('Location: /html/login.html');
    $mysqli->close();
?>