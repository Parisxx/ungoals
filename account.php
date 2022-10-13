<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM user");

include_once("includes/header_ingelogd.php");

$email = $_SESSION["user"];
$sql = "SELECT * FROM user WHERE email = '" .$email."'";
$result = $pdo->query($sql);



while ($data = $stmt->fetch())
{
  echo "<div class='account_wrapper'>";
  echo "<p>Email: " . $data['email'] . "</p>";
  echo "</div>";
}
echo "<hr>";
echo "<form action='upload.php'>";
echo "<p>Upload an item</p>";
echo "<button type='submit'>Upload</button>";
echo "</form>";

include_once("includes/footer.php");