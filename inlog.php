<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM user");

include_once("includes/header.php");


echo "<form action='' method='post'>";
echo "<h1>Login</h1>";
echo "<p>Email</p>";
echo "<input type='email' name='email' required>";
echo "<p>Password</p>";
echo "<input type='password' name='password' required>";
echo "<button name='submit' type='submit'>Login</button>";
echo "</form>";
echo "<form action='registreer.php'>";
echo "<p>Don't have an account?</p>";
echo "<button type='submit'>Register</button>";
echo "</form>";

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $pdo->query("SELECT * FROM user WHERE email = '" . $email . "'");
    $user = $stmt->fetch();

    if ($user == 0) {
        header("Location: inlog.php?error=wrong_email");
        exit();
    } else {
        $pwdHashed = $user["password"];
        $checkpwd = password_verify($password, $pwdHashed);

        if ($checkpwd === false) {
            header("Location: inlog.php?error=wrong_pass");
            exit();
        } else {
            session_start();
            if ($user['user_type'] == "admin") {
                exit();
            } else {
                $_SESSION["user"] = $user['email'];
                header("Location: index_ingelogd.php");
                exit();
            }
        }
    }
}


include_once("includes/footer.php");

?>