<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();

function adduser($conn){
    // if(isset($_POST['submit'])){
    //     $email = $_POST['e-mail'];
    //     $firstname = $_POST['firstname'];
    //     $lastname = $_POST['lastname'];
    //     $password = $_POST['password'];
    //     $confirm = $_POST['confirm'];

    //     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //         header("location: registratie.php?error=invalidemail");
    //         exit();
    //     }else if(!preg_match("/^[a-zA-Z]*$/", $firstname)){
    //         header("location: registratie.php?error=invalidfname");
    //         exit();
    //     }else if(!preg_match("/^[a-zA-Z]*$/", $lastname)){
    //         header("location: registratie.php?error=invalidlname");
    //         exit();
    //     }
    //     else if(!preg_match("/^[a-zA-Z0-9]*$/", $password)){
    //         header("location: registratie.php?error=invalidpass");
    //         exit();
    //     }else if(!$password == $confirm){
    //         header("location: registratie.php?error=pwdontmatch");
    //     } else {
    //         $sql = "SELECT * FROM login WHERE email = :email";
    //         $stmt = $conn->prepare($sql);
    //         $stmt->execute(['email' => $email]);
    //         if($stmt->rowCount() !== 0){
    //             header("location: registratie.php?error=userexists");
    //             exit();
    //         } else {
    //             $query = "INSERT INTO login (email, firstname, lastname, password) VALUES(:email, :firstname, :lastname, :password)";
    //             $stmt = $conn->prepare($query);
    //             if(!$stmt){
    //                 header("location: registratie.php?error=stmtfailed");
    //                 exit();
    //             } else {
    //                 $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
    //                 $stmt->execute(['email' => $email, 'firstname' => $firstname, 'lastname' => $lastname, 'password' => $hashedpwd]);
    //                 header("location: registratie.php?add=user");
    //                 }
    //             }
    //             }
    //         }
        }

function add(){
    if(isset($_GET['add'])){
        $add = $_GET['add'];
    } else {
        $add = '';
    } switch($add){
        case "user";
        echo "<p id='update'>User added</p>";
        break;

    }
}

function errors(){
    if(isset($_GET['error'])){
        $errors = $_GET['error'];
    }else {
        $errors = '';
    } switch($errors){
        case "stmtfailed";
        echo "<p id='error'>something went wrong</p>";
        break;
        case "invalidusername";
        echo "<p id='error'>enter a valid username</p>";
        break;
        case "wrong_email";
        echo "<p id='error'>enter a valid email</p>";
        break;
        case "wrong_pass";
        echo"<p id='error'>Password invalid</p>";
        break;
        case "wrongusername";
        echo"<p id='error'>wrong username</p>";
        break;
        case "usernametaken";
        echo"<p id='error'>username is already taken</p>";
        break;
        case "wrongpass";
        echo"<p id='error'>wrong password</p>";
        break;
    }
}

function login_user($conn){
    if(isset($_POST['submit'])) {
        $email = $_POST['e-mail'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM login WHERE email = '" . $email . "'";

        $stmt = $conn->query($sql);
        $user = $stmt->fetch();

        if ($user == 0) {
            header("Location: inloggen.php?error=wrong_email");
            exit();
        } else {
            $pwdHashed = $user["password"];
            $checkpwd = password_verify($password, $pwdHashed);

            if ($checkpwd === false) {
                header("Location: inloggen.php?error=wrong_pass");
                exit();
            } else {
                session_start();
                if ($user['user_type'] == "admin") {
                    $_SESSION['user'] = $user['email'];
                    header("Location: admin/admin.php");
                    exit();
                } else {
                    $_SESSION["user"] = $user['email'];
                    header("Location: login/login_index.php");
                    exit();
                }
            }
        }
    }
}

function account($conn){
    // $email = $_SESSION["user"];
    // $sql = "SELECT * FROM login WHERE email = '" .$email."'";
    // $result = $conn->query($sql);

    // while($row = $result->fetch(PDO::FETCH_ASSOC)){
    //     $email = $row['email'];
    //     $first = $row['firstname'];
    //     $last = $row['lastname'];

    //     echo "<p id='email1'>Your email is:</p>";
    //     echo "<p id='email'>$email</p>";
    //     echo "<p id='name1'>Your Full Name is:</p>";
    //     echo "<p id='name'>$first $last</p>";
    // }
}

function show_all($conn){
    // $sql = "SELECT * FROM login";
    // $result = $conn->query($sql);
    // while($row = $result->fetch(PDO::FETCH_ASSOC)){
    //     $email = $row['email'];
    //     $first = $row['firstname'];
    //     $last = $row['lastname'];
    //     $user_type = $row['user_type'];
    //     $time = $row['time'];
    //     $date = $row['date'];

    //     echo "<tr>";
    //     echo "<td>$email</td>";
    //     echo "<td>$first $last</td>";
    //     echo "<td>$time</td>";
    //     echo "<td>$date</td>";
    //     if ($user_type == "admin"){
    //         echo"<td>$user_type</td>";
    //     } else {
    //         echo "<td>not admin</td>";
    //     }
    //     echo "</tr>";
    // }
}
