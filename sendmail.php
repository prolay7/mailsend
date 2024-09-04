<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader if you are using Composer
require 'vendor/autoload.php';

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'us-smtp-outbound-1.mimecast.com';                     // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'No-replytixportal@ravens.nfl.net';           // SMTP username
    #$mail->Password = 'your_password';                    // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS for SSL
    $mail->Port = 25;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom('No-replytixportal@ravens.nfl.net', 'Ravens'); // Sender's email and name
    $mail->addAddress('prolay.mobilefirst@gmail.com', 'Prolay Panda'); // Add a recipient
    // $mail->addAddress('another@example.com');            // Add more recipients if needed
    // $mail->addReplyTo('reply@example.com', 'Information'); // Reply-to address
    // $mail->addCC('cc@example.com');                     // Add CC
    // $mail->addBCC('bcc@example.com');                   // Add BCC

    // Attachments (optional)
    // $mail->addAttachment('/path/to/file.pdf');           // Add attachments
    // $mail->addAttachment('/path/to/image.jpg', 'new.jpg'); // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Email from PHPMailer';         // Email subject
    $mail->Body    = '<h1>This is the HTML Message Body</h1><p>This is a test email sent using PHPMailer.</p>'; // HTML message
    $mail->AltBody = 'This is the plain text version of the email.'; // Plain text message for non-HTML mail clients

    // Send the email
    $mail->send();
    echo 'Message has been sent successfully';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
