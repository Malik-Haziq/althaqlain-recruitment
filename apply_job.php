<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure to load PHPMailer

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cover_letter = $_POST['cover_letter'];
    $cv = $_FILES['cv'];

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($cover_letter) && !empty($cv)) {
        // Handle file upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($cv["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is a real CV (for example, checking file type)
        $allowedTypes = ['pdf', 'doc', 'docx'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Sorry, only PDF, DOC & DOCX files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($cv["tmp_name"], $target_file)) {
                // Prepare the email
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.zoho.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'toqeernaqvi66@gmail.com'; // Replace with your Zoho email address
                    $mail->Password = 'NaqviSyed@51214'; // Replace with your Zoho email password or app-specific password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use ENCRYPTION_SMTPS if using port 465
                    $mail->Port = 587; // Use 465 for SSL

                    //Recipients
                    // $mail->setFrom('your_email@yourdomain.com', 'Your Name');
                    $mail->addAddress('info@althaqlainrecruting.com'); // Add a recipient

                    // Attachments
                    $mail->addAttachment($target_file); // Add attachments

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Job Application: ' . $name;
                    $mail->Body    = "Name: $name<br>Email: $email<br>Cover Letter:<br>$cover_letter";

                    $mail->send();
                    echo "The file ". htmlspecialchars(basename($cv["name"])). " has been uploaded and emailed.";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request.";
}
?>
