<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM product");

include_once("includes/header_ingelogd.php");


while ($data = $stmt->fetch())
{



  
}

include_once("includes/footer.php");
