<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM user");

include_once("includes/header_ingelogd.php");




include_once("includes/footer.php");