<?php
session_start();
include("db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM product");

include_once("header.php");

while ($data = $stmt->fetch())
{
  echo "<div class='wrapper_product'>";
  echo "<p class='product'>" . $data['name'] . "</p>";
  echo "<p class='product'>" . $data['price'] . "</p>";
  echo "<p class='product'>" . $data['location'] . "</p>";
  echo "</div>";
}

echo ("Hier komt de body content");

include_once("footer.php");
