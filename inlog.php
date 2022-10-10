<?php
session_start();
include("includes/db_connect.php");
$pdo = connect();
$stmt = $pdo->query("SELECT * FROM user");
include ("includes/functions.php");

include_once("includes/header.php");

// echo "form method='post' action='check.php'";
// echo "Gebruikersnaam= 'input type='text' name='username' size='20' maxlength='20'";
// echo "Wachtwoord: 'input type='password' name='wachtwoord' size='20' maxlength='20'";
// echo "input type='submit' value='Log in!'";


// //kleine letters
// $naam = strtolower($_POST['username']);
// $wachtwoord = ($_POST['wachtwoord']);

// //gebruikersnamen.
// $gebruikers = array(
//     'test' => 'wachtwoord',
//     'gebruikersnaam2' => 'wachtwoord2'
//     //enz
// );

// //bestaat het?, zoja:
// if(isset($gebruikers[$naam]))
//     {
//          //als het wachtwoord gelijk is aan wat er in de variabele zit:
//         if($wachtwoord == $gebruikers[$naam])
//             {
//                 //zet variabele zo dat het script het herkent als ingelogd
//                 $_SESSION['login'] = "1";

//                 //zet naam in variabele, zodat het later nog gebruikt kan worden
//                 $_SESSION['login-naam'] = $naam;

//                 //laat de beveiligde pagina zien
//                 include ("index_ingelogd.php");
//             }
//         //als het wachtwoord niet klopt:
//         else
//             {
//                 echo 'Wachtwoord is onjuist. Probeer het nog eens. :)';
//             }
//     }
// //als de gebruikersnaam niet bekend is:
// else
//     {
//         echo 'Onbekende gebruikersnaam.';
//     }

include_once("includes/footer.php");

?>