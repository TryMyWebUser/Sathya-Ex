<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

// SMTP Configuration
function initMailer() {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "trymywebsites@gmail.com";
        $mail->Password = "nmhw uxqv vvpl fbvp"; // App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        return $mail;
    } catch (Exception $e) {
        die(json_encode(["success" => false, "message" => "Mailer config error: " . $e->getMessage()]));
    }
}

// Contact Form Handler
function sendContactEmail($fullName, $email, $subject, $phoneNumber, $message) {
    $mail = initMailer();
    try {
        $mail->setFrom("trymywebsites@gmail.com", $subject);
        $mail->addAddress("info@trymywebsites.com");
        $mail->Subject = "Contact Form: $fullName";
        $mail->isHTML(true);
        $mail->Body = "
            <h3>New Contact Form Submission</h3>
            <p><strong>Name:</strong> $fullName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phoneNumber</p>
            <p><strong>Message:</strong><br>$message</p>
        ";
        return $mail->send()
            ? ["success" => true]
            : ["success" => false, "message" => "Contact form email failed"];
    } catch (Exception $e) {
        return ["success" => false, "message" => "Mailer error: " . $mail->ErrorInfo];
    }
}

// Career Form Handler
function sendApplicationEmail($fullName, $email, $subject, $phoneNumber, $message, $resumeFile) {
    $mail = initMailer();
    try {
        $mail->setFrom("trymywebsites@gmail.com", $subject);
        $mail->addAddress("info@sathyacoatings.com");
        $mail->Subject = "Job Application: $fullName";

        if ($resumeFile) {
            $mail->addAttachment($resumeFile);
        }

        $mail->isHTML(true);
        $mail->Body = "
            <h3>Job Application</h3>
            <p><strong>Name:</strong> $fullName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phoneNumber</p>
            <p><strong>Message:</strong><br>$message</p>
            " . ($resumeFile ? "<p><strong>Resume:</strong> Attached</p>" : "");

        return $mail->send()
            ? ["success" => true]
            : ["success" => false, "message" => "Application email failed"];
    } catch (Exception $e) {
        return ["success" => false, "message" => "Mailer error: " . $mail->ErrorInfo];
    }
}

// Enquiry Form Handler
function sendEnquiryForm($data) {
    $mail = initMailer();
    try {
        $mail->setFrom("trymywebsites@gmail.com", "Enquiry Form");
        $mail->addAddress("saranmass685@gmail.com"); // info@sathyacoatings.com
        $mail->Subject = "New Enquiry from {$data['name']}";
        $mail->isHTML(true);
        $mail->Body = "
            <h3>Turnkey Solution Enquiry</h3>
            <p><strong>Name:</strong> {$data['name']}</p>
            <p><strong>Organization:</strong> {$data['organization']}</p>
            <p><strong>Designation:</strong> {$data['designation']}</p>
            <p><strong>Email:</strong> {$data['email']}</p>
            <p><strong>Phone:</strong> {$data['phone']}</p>
            <p><strong>Selected Products:</strong> {$data['products']}</p>
            <p><strong>Message:</strong><br>{$data['message']}</p>
        ";
        return $mail->send()
            ? ["success" => true]
            : ["success" => false, "message" => "Enquiry email failed"];
    } catch (Exception $e) {
        return ["success" => false, "message" => "Mailer error: " . $mail->ErrorInfo];
    }
}