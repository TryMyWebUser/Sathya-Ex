<?php

require_once __DIR__ . '/../vendor/autoload.php';
require "Mailer.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit();
}

// Log POST data safely for debugging (optional)
file_put_contents("debug_log.txt", print_r($_POST, true), FILE_APPEND);

if (!empty($_POST)) {
    // Sanitize form inputs
    $products = isset($_POST["products"]) ? $_POST["products"] : [];
    $name = trim($_POST["name"] ?? '');
    $org = trim($_POST["org"] ?? '');
    $designation = trim($_POST["des"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $phone = trim($_POST["phone"] ?? '');
    $message = trim($_POST["message"] ?? '');

    // Validation
    if (empty($name) || empty($org) || empty($designation) || empty($email) || empty($phone)) {
        echo json_encode(["success" => false, "message" => "Please fill all required fields."]);
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email address."]);
        exit();
    }

    // Format selected products into string
    $selectedSolutions = !empty($products) ? implode(", ", $products) : 'None selected';

    // Send email using Mailer class
    $emailService = new Mailer();
    if (!empty($products)) {
        $emailResult = $emailService->sendEnquiryForm([
            "name" => $name,
            "organization" => $org,
            "designation" => $designation,
            "email" => $email,
            "phone" => $phone,
            "message" => $message,
            "products" => $selectedSolutions
        ]);
    } else {
        $emailResult = $emailService->sendContactMail([
            "name" => $name,
            "organization" => $org,
            "designation" => $designation,
            "email" => $email,
            "phone" => $phone,
            "message" => $message
        ]);        
    }

    if ($emailResult["success"]) {
        echo json_encode([
            "success" => true,
            "message" => "Your enquiry has been submitted successfully.",
            "email_status" => true
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "There was an issue sending your enquiry. Please try again later.",
            "email_status" => false
        ]);
    }
} else {
    echo json_encode(["success" => false, "message" => "No data received."]);
}