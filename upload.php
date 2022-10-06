<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM product");

include_once("includes/header_ingelogd.php");


echo "<form method='post' name='upload_form' action='upload.php'>";
echo "<p> Title </p>";
echo "<input class='form' type='text' name='title' required>";
echo "<p> Price </p>";
echo "<input class='form' type='text' name='title' required>";
echo "<p> Location </p>";
echo "<input class='form' type='text' name='title' required>";
echo "<input class='upload_button' type='submit' name='submit' value='Upload'>";
echo "</form>";

if(isset($_POST['submit']))
{
$name = $_POST['name'];
$price = $_POST['price'];
$location = $_POST['location'];

$sql = "INSERT INTO product (name, price, location) VALUES ('$name', '$price', '$location')";
$result = $pdo->query($sql);
}





include_once("includes/footer.php");