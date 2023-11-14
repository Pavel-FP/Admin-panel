<?php
	date_default_timezone_set('Asia/Novosibirsk');
	$date = date("Y-m-d H:i:s");

	$login = $_GET['login'];
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$mysql = new mysqli('localhost', 'root', '', 'reg_user');
	$usercookie = $_COOKIE['user'];
	$delete = $mysql->query("DELETE FROM polzovateli WHERE `login`='$login'");

    
	$result = $mysql->query("SELECT * FROM polzovateli WHERE `login`= '$usercookie'");
	
    $user = $result->fetch_assoc();
    $iduser = $user['id'];
    $log = $mysql->query("INSERT INTO `log`(textLog, `date`, `user_id`) VALUES ('удалил из базы данных пользователя $login', '$date', '$iduser')");
	
	header('Location: /html/users.php');
	$mysql->close();
?>