<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM product");

include_once("includes/header_ingelogd.php");


echo "<form method='post' name='upload_form' action='upload.php' enctype='multipart/form-data'>";
echo "<p> Title </p>";
echo "<input class='form' type='text' name='name' required>";
echo "<p> Price </p>";
echo "<input class='form' type='number' name='price' required>";
echo "<p> Location </p>";
echo "<input class='form' type='text' name='location' required>";
echo "<br>";
echo "<br>";
echo "<input type='file' name='file' required>";
echo "<br>";
echo "<br>";
echo "<input class='upload_button' type='submit' name='submit' value='Upload'>";
echo "</form>";

if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $price = $_POST['price'];
  $location = $_POST['location'];
  $file_name=$_FILES['file']['name'];
  $file_tmp=$_FILES['file']['tmp_name'];

  $sql = "INSERT INTO product (name, price, location, picture) VALUES ('$name', '$price', '$location','$file_name')";
  move_uploaded_file($file_tmp, "uploads/".$file_name);
  $result = $pdo->query($sql);

}



include_once("includes/footer.php");