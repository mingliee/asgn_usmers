<?php
require_once './vendor/autoload.php';
$user_email=$_POST['user_email'];

// Create the Transport
//$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))

$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('usmers21@gmail.com')
    ->setPassword('fyp.usmers');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token)
{
    global $mailer;

    // Create a message
    $message = (new Swift_Message('Verify your email'));

    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }

      </style>
    </head>

    <body>
      <div class="wrapper">
      <img src="' . $message->embed(Swift_Image::fromPath('img/logo-p.png')) . '"/>
        <p>Thank you for signing up on our site. Please click on the link below to verify your account:</p>
        <a href="http://localhost/usmers/email/verifyEmail.php?token=' . $token . '" style="color:white">Verify Email!</a>
      </div>
    </body>

    </html>';
    
    $message ->setFrom('usmers21@gmail.com');
    $message ->setTo($userEmail);
    $message ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}