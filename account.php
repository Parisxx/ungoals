<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM user");

include_once("includes/header_ingelogd.php");

$email = $_SESSION["user"];
$sql = "SELECT * FROM login WHERE email = '" .$email."'";
$result = $conn->query($sql);

while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $email = $row['email'];
    $first = $row['firstname'];
    $last = $row['lastname'];

    echo "<p id='email1'>Your email is:</p>";
    echo "<p id='email'>$email</p>";
    echo "<p id='name1'>Your Full Name is:</p>";
    echo "<p id='name'>$first $last</p>";
}


include_once("includes/footer.php");