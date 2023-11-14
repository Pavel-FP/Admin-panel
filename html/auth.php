<?php
    date_default_timezone_set('Asia/Novosibirsk');
    $date = date("Y-m-d H:i:s");
    $role = filter_var(trim($_POST['role']),FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root', '','reg_user');

    $result = $mysql->query("SELECT * FROM polzovateli WHERE `login` = '$login' AND `pass` = '$password' ");

    $user = $result->fetch_assoc();
    if($user == "") {
        echo "Такой пользователь не найден";
        exit();
    }

    #setcookie('user', $user['login'], time() + 3600, "/");


    setcookie('user', $user['login'], time()+86400, "/");
    setcookie('role', $user['role'], time()+86400, "/");
    $iduser = $user['id'];
    $log = $mysql->query("INSERT INTO `log`(textLog, `date`, `user_id`) VALUES ('авторизировался', '$date', '$iduser')");
    

    
    header('Location: ../html/test.php');
    $mysql->close();
?>