<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data processing page</title>
    <style>

    </style>
</head>
<body>


<h1><a href="javascript:history.go(-1)">Go back</a></h1>


<?php

use processing\Database;
use processing\Mail;

include 'processing/Database.php';
include 'processing/Mail.php';


if(isset($_POST["submit"])) {
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];
    echo '<br>Fetched details';



    $database = new Database('../db.json');
    echo '<br>Created database object';
    $database->insertContactDetails($mail, $name, $message);
    echo '<br>Database action executed';





    $mailer = new Mail('../mail.json');
    echo '<br>Created mail object';
    $mailer->sendConfirmation($mail, $name, $message);
    echo '<br>Email action executed';
    $mailer->sendSelf($mail, $name, $message);
    echo '<br>Email sent to owner';
}
?>



</body>
</html>



