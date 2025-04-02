<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pickup = $_POST['pickup'];
    $drop = $_POST['drop'];
    $phone = $_POST['phone'];
    $trip_type = $_POST['trip_type'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $to = "your-s.yuvarani05112005@gmail.com";  // Replace with your email
    $subject = "New Booking Received";
    $message = "Pick-Up Location: $pickup\nDrop Location: $drop\nPhone: $phone\nTrip Type: $trip_type\nDate: $date\nTime: $time";
    $headers = "From: noreply@yourwebsite.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Booking Submitted Successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error! Please try again.'); window.location.href='index.html';</script>";
    }
}
?>