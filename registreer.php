<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM user");

include_once("includes/header.php");


echo "<form action='' method='post'>";
echo "<h1>Registratie</h1>";
echo "<p>Email</p>";
echo "<input type='email' name='email' required>";
echo "<p>Password</p>";
echo "<input type='password' name='password' required>";
echo "<p>Confirm password</p>";
echo "<input type='password' name='confirm' required>";
echo "<button name='submit' type='submit'>Register</button>";
echo "</form>";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: registreer.php?error=invalidemail");
        exit();
    } else if(!preg_match("/^[a-zA-Z0-9]*$/", $password)){
        header("location: registreer.php?error=invalidpass");
        exit();
    } else if(!$password == $confirm){
        header("location: registreer.php?error=pwdontmatch");
    } else {
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        if($stmt->rowCount() !== 0){
            header("location: registreer.php?error=userexists");
            exit();
        } else {
            $query = "INSERT INTO user (email, password) VALUES(:email, :password)";
            $stmt = $pdo->prepare($query);
            if(!$stmt){
                header("location: registreer.php?error=stmtfailed");
                exit();
            } else {
                $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                $stmt->execute(['email' => $email, 'password' => $hashedpwd]);
                header("location: registreer.php?add=user");
                }
            }
            }
        }

include_once("includes/footer.php");