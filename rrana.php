<?php
$servername = "sql207.infinityfree.com";
$username = "if0_42435286";
$password = "sLngnfufon0uZg4";
$dbname = "if0_42435286_robotweb";
$name = $_GET['name'];
$age = $_GET['age'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
?>