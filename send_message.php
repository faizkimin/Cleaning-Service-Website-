<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $message = $_POST["message"];

    $to = "youremail@example.com";
    $subject = "New message from your website";
    $headers = "From: $name <$email>";

    if (mail($to, $subject, $message, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "There was an error sending your message. Please try again later.";
    }
}
?>