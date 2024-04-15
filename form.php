<?php
include("connect.php"); // Include the connection file
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact =$_POST['contact'];
    settype($contact, 'integer');

    // Ensure you're using the correct column names in your database table
    $query = "INSERT INTO form_data (username, lastname, email, contact) VALUES ('$fname', '$lname', '$email', '$contact')";
    $data = mysqli_query($conn, $query);

    if($data){
        // Your email sending code
        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'gour66855@gmail.com';
            $mail->Password   = 'ojstrllaykhnnelp';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('gour66855@gmail.com', 'form');
            $mail->addAddress($email, 'check');

            $mail->isHTML(true);
            $mail->Subject = 'student form';
            $mail->Body    = "Sender FirstName - $fname <br> Sender LastName - $lname <br> Sender Email - $email <br> Sender Contact - $contact";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "failed to save data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <div class="form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="fname" required>
            
            <label>Last Name:</label>
            <input type="text" class="input" name="lname" required/>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="contact">Contact:</label>
            <input type="number" id="contact" name="contact" required>
            
            <input type="submit" value="register" name="register">
        </div>
    </form><br/>
    <div class="link"> <a href="display.php">Display Record</a></div>
</body>
</html>
