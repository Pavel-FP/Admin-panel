<?php
date_default_timezone_set('Asia/Novosibirsk');
$date = date("Y-m-d H:i:s");
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'root', '', 'reg_user');
$usercookie = $_COOKIE['user'];
$result = $mysqli->query("SELECT * FROM polzovateli WHERE `login`= '$usercookie'");
$user = $result->fetch_assoc();
$iduser = $user['id'];

$update = "UPDATE polzovateli SET `login` = '$login', email = '$email', `phone` = '$phone', pass = '$pass' WHERE `login`= '$usercookie'";
mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));

$log = $mysqli->query("INSERT INTO `log`(textLog, `date`, `user_id`) VALUES ('сменил свои данные', '$date', '$iduser')");
header('Location: ../html/options.php');
$mysqli->close();

?>