<?php
session_start();
include("db_connect.php");
$pdo = connect();

include_once("header.php");

echo ("Hier komt de body content");

include_once("footer.php");
