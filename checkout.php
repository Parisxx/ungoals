<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM checkout");

include_once("includes/header_ingelogd.php");


while ($data = $stmt->fetch())
{
    echo "<div class='product_wrapper'>";
    echo "<p>" . $data['product_id'] . "</p>";
    echo "</div>";


  
}

include_once("includes/footer.php");
