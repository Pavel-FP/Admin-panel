<?php
$dbhost = "localhost";
$dbname = "sales";
$username = "root";
$password = "";

$mysqli = new mysqli($dbhost, $username, $password, $dbname);
$mysql->query("SELECT * FROM sales");
if ($mysqli -> connect_errno) {
    echo "ти шерсть емани. вийди на связь карочи: ".$mysqli ->connect_error;
    exit();
}
$mysql>close();
exit();
?>