<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

class Mailer {

    private function initMailer() {
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

    public function sendEnquiryForm($data) {
        $mail = $this->initMailer();
        try {
            $mail->setFrom("trymywebsites@gmail.com", "Enquiry Form");
            $mail->addAddress("info@sathyacoatings.com");
            $mail->Subject = "New Enquiry from {$data['name']}";
            $mail->isHTML(true);
            $mail->Body = "
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

    public function sendContactMail($data) {
        $mail = $this->initMailer();
        try {
            $mail->setFrom("trymywebsites@gmail.com", "Contact Form");
            $mail->addAddress("info@sathyacoatings.com");
            $mail->Subject = "Contact Form Submission from {$data['name']}";
            $mail->isHTML(true);
            $mail->Body = "
                <p><strong>Name:</strong> {$data['name']}</p>
                <p><strong>Organization:</strong> {$data['organization']}</p>
                <p><strong>Designation:</strong> {$data['designation']}</p>
                <p><strong>Email:</strong> {$data['email']}</p>
                <p><strong>Phone:</strong> {$data['phone']}</p>
                <p><strong>Message:</strong><br>{$data['message']}</p>
            ";
            return $mail->send()
                ? ["success" => true]
                : ["success" => false, "message" => "Contact email failed"];
        } catch (Exception $e) {
            return ["success" => false, "message" => "Mailer error: " . $mail->ErrorInfo];
        }
    }    
}