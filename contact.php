<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data processing page</title>
    <?php include 'imports.php' ?>
</head>
<body class="processing">
<h1>
<a href="../" style="text-decoration: underline;">Home</a>
</h1>

<?php //include 'nav.php'; ?>

</body>
</html>




<?php
    use processing\Database;
    use processing\Mail;

    include 'processing/Database.php';
    include 'processing/Mail.php';

if(isset($_POST["submit"])) {
    define ("debug", true);

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];


    $database = new Database('../db.json', debug);
    isDebug('<br>Created database object');
    $database->insertContactDetails($mail, $name, $message);
    isDebug('<br>Database action executed');




    $mailer = new Mail('../mail.json', debug);
    isDebug('<br>Created mail object');
    $mailer->sendConfirmation($mail, $name, $message);
    isDebug('<br>Email action executed');
    $mailer->sendSelf($mail, $name, $message);
    isDebug('<br>Email sent to owner');


    echo '<h1>Message sent successfully!</h1>';
}
function isDebug($str): void
{
    if(debug) {
        echo $str;
    }
}
?>
