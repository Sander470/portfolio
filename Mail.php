<?php

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;

class Mail
{
    private $Host;
    private $Port;
    private $Username;
    private $Password;
    private phpmailer $phpmailer;

    public function __construct($file)
    {
        // DECODING JSON DATA
        $json = file_get_contents($file);
        $data = json_decode($json);

        $this->Host = $data->Host;
        $this->Port = $data->Port;
        $this->Username = $data->Username;
        $this->Password = $data->Password;
    }

    public function sendConfirmation($submitMail, $submitName, $message): void
    {
        $subject = 'Confirmation of contact request';
        $senderName = 'Contactform Alex';
        $this->sendMail($submitMail, $submitName, $subject, $message, $senderName);
    }

    public function sendSelf($submitMail, $submitName, $message): void
    {
        $message = $submitName.' has contacted you from '.$submitMail.'.'.
            '<br>They have sent you the following message: <br><br>'.
            $message;
        $subject = $submitName.'has tried to contact you';
        $senderName = 'Contactform: '.$submitName;

        $this->sendMail('sander-grootjans@hotmail.com','contactForm: '.$submitName, $subject, $message, $senderName);
    }

    private function sendMail($rcpMail, $rcpName, $subject, $message, $senderName): void{
        $this->logIn();

        try {
            $this->phpmailer->setFrom("mailtrap@sandergrootjans.online", $senderName);
        } catch (Exception $e) {
            echo 'error: '.$e->getMessage();
        }

        try {
            $this->phpmailer->addAddress($rcpMail, $rcpName);
            echo '<br>added address';
        } catch (Exception $e) {
            echo 'error: '.$e->getMessage();
        }

        $this->phpmailer->Subject = $subject;
        $this->phpmailer->Body = $message;

        try {
            $this->phpmailer->send();
        } catch (Exception $E) {
            echo $E;
        }
    }



    private function logIn(): void
    {
// Setting credentials for mail server
        $this->phpmailer = new PHPMailer(true);
//  debug mode - disable if functional.
//        $this->phpmailer->SMTPDebug = 2;
        $this->phpmailer->isSMTP();
        $this->phpmailer->Host = $this->Host;
        $this->phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->phpmailer->SMTPAuth = true;
        $this->phpmailer->Port = $this->Port;
        $this->phpmailer->Username = $this->Username;
        $this->phpmailer->Password = $this->Password;
        $this->phpmailer->isHTML(true);
    }
}