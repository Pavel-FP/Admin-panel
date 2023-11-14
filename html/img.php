<?php
	date_default_timezone_set('Asia/Novosibirsk');
	$date = date("Y-m-d H:i:s");
	$user = $_POST['user'];
	$file = "../img/".$_FILES['file']['name'];

	move_uploaded_file($_FILES['file']['tmp_name'],'../img/'.$_FILES['file']['name']);

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli('localhost', 'root', '', 'reg_user');

	$result = $mysqli -> query("UPDATE polzovateli SET img = '$file' WHERE id = '$user'"); 
	

	$usercookie = $_COOKIE['user'];
	$result1 = $mysqli->query("SELECT * FROM polzovateli WHERE `login`= '$usercookie'");
	$usr = $result1->fetch_assoc();
	$iduser = $usr['id'];
	$log = $mysqli->query("INSERT INTO `log`(textLog, `date`, `user_id`) VALUES ('сменил аватарку', '$date', '$iduser')");
	header("Location: /html/options.php");
?>