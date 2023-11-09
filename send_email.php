<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    $to = "aziz.zaind@yahoo.com"; // Replace with the actual email address
    $subject = "Contact Form Submission: $subject";
    $headers = "From: cyber1duck@gmail.com\r\n" .
           "Reply-To: cyber1duck@gmail.com\r\n" .
           "X-Mailer: PHP/" . phpversion();
    
    $mailBody = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";
    
    if (mail($to, $subject, $mailBody, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed. Please try again later.";
    }
} else {
    echo "Invalid request";
}
?>