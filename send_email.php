<?php
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $messageText = $_POST["message"];
    $mainEmail = 'rahmathnovskyn@gmail.com';

    // Buat objek Transporter dengan SMTP Gmail
    $transport = (new Swift_SmtpTransport('smtp.hostinger.com', 587, 'tls'))
      ->setUsername('noreply@kalapatec.id')
      ->setPassword('@Password*1');
      //->setPassword('@Password.1');

    // Buat objek Mailer menggunakan Transporter
    $mailer = new Swift_Mailer($transport);

    // Buat objek Pesan
    $message = (new Swift_Message($subject))
      ->setFrom([$email => $name])
      ->setTo(['rahmat@kalapatec.id' => 'Recipient Name']) // Ganti dengan alamat email penerima
      ->setBody($messageText);

    // Kirim email
    $result = $mailer->send($message);

    if ($result) {
        echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }
} else {
    // Jika bukan metode POST, tampilkan pesan kesalahan
    echo "Invalid request.";
}
