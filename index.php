<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM product");

include_once("includes/header.php");

while ($data = $stmt->fetch())
{
  echo "<div class='product_wrapper'>";
  echo "<h1 class='product'>" . $data['name'] . "</h1>";
  echo "<h3 class='product'>€" . $data['price'] . "</h3>";
  echo "<p class='product'>" . $data['location'] . "</p>";
  echo "<img src='uploads/" . $data['picture'] ."' width='100' height='100'>";
  echo "</div>";
}


include_once("includes/footer.php");
