<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM product");
include ("includes/functions.php");

include_once("includes/header_ingelogd.php");



while ($data = $stmt->fetch())
{
  echo "<div class='product_wrapper'>";
  echo "<h1 class='product'>" . $data['name'] . "</h1>";
  echo "<h3 class='product'>€" . $data['price'] . "</h3>";
  echo "<p class='product'>" . $data['location'] . "</p>";
  echo "<img src='uploads/" . $data['picture'] ."' width='100' height='100'>";

  echo "<form action='index_ingelogd.php' method='post'>";
  echo "<button  value='" . $data['id'] . "' name='submit' type='submit'>Add to cart</button>";
  echo "</form>";

  echo "<form action='index_ingelogd.php' method='post'>";
  echo "<button  value='" . $data['id'] . "' name='submit' type='submit'>Add to cart</button>";
  echo "</form>";

  echo "</div>";
}


    if(isset($_POST['submit']))
    {
        $user_id= $_POST['user_id'];
        $product_id = $_POST['product_id'];

        $sql = "INSERT INTO checkout (user_id, product_id) VALUES ('$user_id','$product_id')";
        $result = $pdo->query($sql);
        
  
    } 
  
    // if add to cart then send to checkout tabel when bought product id deleted from tabel product




include_once("includes/footer.php");