<?php
include("PHPMailer-master/PHPMailerAutoload.php");
$account = 'rylerosint@gmail.com';
$password = 'Iloveharry630';
$email = $_POST['email'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$msg = $_POST['message'];
$to = $account;
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth= true;
$mail->Port = 465; // Or 587
$mail->Username= $account;
$mail->Password= $password;
$mail->SMTPSecure = 'ssl';
$mail->SetFrom = $email;
$mail->FromName= $name;
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $msg;
$mail->addAddress($to);
$mail->AddReplyTo($email, $name);
if(!$mail->send()){
include 'header.php';
 echo "Mailer Error: " . $mail->ErrorInfo;
 include 'footer.php';
}else{
include 'header.php';
 echo "E-Mail has been sent <br><a href=\"contactMe.php\">Go Back to Contacts page</a>";
 include 'footer.php';
}
?>