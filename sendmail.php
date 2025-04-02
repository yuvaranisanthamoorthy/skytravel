<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pickup = $_POST['pickup'];
    $drop = $_POST['drop'];
    $phone = $_POST['phone'];
    $trip_type = $_POST['trip_type'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $to = "s.yuvarani05112005@gmail.com"; // Your email address
    $subject = "New Booking Received";
    $message = "Pick-Up Location: $pickup\nDrop Location: $drop\nPhone: $phone\nTrip Type: $trip_type\nDate: $date\nTime: $time";

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 's.yuvarani05112005@gmail.com'; // Your Gmail address
        $mail->Password = '@05Nov2005'; // Use App Password for Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Settings
        $mail->setFrom('s.yuvarani05112005@gmail.com', 'Sky Travels');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;

        if ($mail->send()) {
            echo "<script>alert('Booking Submitted Successfully!'); window.location.href='index.html';</script>";
        } else {
            echo "<script>alert('Error! Please try again.'); window.location.href='index.html';</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Mail Error: " . $mail->ErrorInfo . "'); window.location.href='index.html';</script>";
    }
}
?>