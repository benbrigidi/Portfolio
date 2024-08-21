<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/phpmailer/src/Exception.php';
require __DIR__ . '/phpmailer/src/PHPMailer.php';
require __DIR__ . '/phpmailer/src/SMTP.php';



$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$date = $_POST['date'];
$time = $_POST['time'];
$message = $_POST['message'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$form_time = date('h:i A', strtotime($time));


$from = $email;
$to = "benbrigidi67@gmail.com";
$subject = "Freelance Work";
$msg = <<<EOT
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
</head>
<div class="conts" style=" font-family: inter;
            width: 390px;
            border-radius: 10px;
            box-shadow: 0px 6px 18px 0px rgba(16, 5, 54, 0.17);
            background-color: #1f252e;
            padding: 30px;
           margin:auto;
           display:block;">
    <img src="cid:profile" class="middle" style=" margin-right: auto;
            margin-left: auto;
            display: block;
            width: 100px;
            height: 100px;">
    <div class="text" style="color: white;
            padding-top: 40px;
            font-size: 25px;
            font-weight: 500;
            line-height: 1.5rem;
            margin-bottom: 30px;">
          Ben's Profile
    </div>
    <div class="white" style="color: white; font-size:16px">
        Yo Dramani,<br><br>
        There is a potential client, book the date quick<br>The message left is <br><br>$message <br>
        Below is the person's information:
    </div>
    <div class="cred" style="background-color: white;
            padding:10px 0px 10px 5px;
            font-size:15px;
            font-weight:800;
            line-height:2rem">
        Name: $fname $lname<br>
        Email: $email <br>
        Phone: $phone <br>
        Service Type: $service <br>
        Booking Date: $date <br>
        Booking Time (GMT): $form_time <br>
    </div>
    
    
</div>
</body>
</html> 
EOT;

$mail = new PHPMailer(true);
$mail->SMTPDebug = 3;
$mail->IsSMTP();
$mail->addEmbeddedImage('../assets/img/logo/logo.png', 'profile');
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;
$mail->SMTPSecure = 'tls';
$mail->isHTML(true);                   //Enable SMTP authentication
$mail->Username   = 'johnmahama65@gmail.com';                     //SMTP username
$mail->Password   = 'vxqrasfuzmcicelm';                                 //SMTP password           //Enable implicit TLS encryption
$mail->Port       = 587; //587
$mail->SMTPDebug  = SMTP::DEBUG_OFF;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
//SMTP username
//Recipients
$mail->setFrom($from, 'Dramani - Software Developer');
$mail->addAddress($to);     //Add a recipient            //Name is optional

//Content                 //Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = $msg;

$mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
));
if (!$mail->Send()) {
    echo "<script>alert('failed')</script>";
} else {
    // Sending to the user
    $from = "benbrigidi67@gmail.com";
    $to = $email;
    $subject = "Booking Appointment with Dramani";
    $msg = <<<EOT
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    </head>
    <div class="conts" style=" font-family: inter;
                width: 390px;
                border-radius: 10px;
                box-shadow: 0px 6px 18px 0px rgba(16, 5, 54, 0.17);
                background-color: #1f252e;
                padding: 30px;
               margin:auto;
               display:block;">
        <img src="cid:profile" class="middle" style=" margin-right: auto;
                margin-left: auto;
                display: block;
                width: 100px;
                height: 100px;">
        <div class="text" style="color: white;
                padding-top: 40px;
                font-size: 25px;
                font-weight: 500;
                line-height: 1.5rem;
                margin-bottom: 30px;">
            Ben's Profile 
        </div>
        <div class="white" style="color: white; font-size:16px">
            Dear $lname,<br><br>
            Thank you for booking with me! I have saved your appointed date in my calender <br><br>
            Below is your booking details:
        </div>
        <div class="cred" style="background-color: white;
                padding:10px 0px 10px 5px;
                font-size:15px;
                font-weight:800;
                line-height:2rem">
             Name: $fname $lname<br>
        Email: $email <br>
        Phone: $phone <br>
        Service Type: $service <br>
        Booking Date: $date <br>
        Booking Time (GMT): $form_time <br>
        </div>
        
        <div class="last" style="margin-top: 20px; color:white; font-size:16px">
            <p>Best regards, <br>Ben Brigidi</p>
        </div>
    </div>
    </body>
    </html>     

EOT;

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 3;
    $mail->IsSMTP();
    $mail->addEmbeddedImage('../assets/img/logo/logo.png', 'profile');
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    $mail->isHTML(true);                   //Enable SMTP authentication
    $mail->Username   = 'johnmahama65@gmail.com';                     //SMTP username
    $mail->Password   = 'vxqrasfuzmcicelm';                                 //SMTP password           //Enable implicit TLS encryption
    $mail->Port       = 587; //587
    $mail->SMTPDebug  = SMTP::DEBUG_OFF;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //SMTP username
    //Recipients
    $mail->setFrom($from, 'Dramani - Software Developer');
    $mail->addAddress($to);     //Add a recipient            //Name is optional

    //Content                 //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;

    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));

    if (!$mail->Send()) {
        echo "<script>alert('Sorry, couldn't book. Please report this error'); </script>.";
    } 
}
