<?php
session_start();
require_once("dbconnection.php");
$pdo = connect();

include_once("header.php");

echo ("Hier komt de body content");

include_once("footer.php");
