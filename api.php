<?php
// start session
session_start();
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

// Set your app credentials
    $username   = "lazo";
    $apiKey     = "";

// Initialize the SDK
    $AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
    $sms        = $AT->sms();

// Set the numbers you want to send to in international format
    $recipients = $_POST['send_to'];

// Set your message
    $message    = $_POST['message'];

// Set your shortCode or senderId
    $from       = "AFRICASTKNG";

    try {
        // Thats it, hit send and we'll take care of the rest
        $result = $sms->send([
            'to'      => $recipients,
            'message' => $message,

        ]);

        print_r($result);
//    set session variable
        $_SESSION['success'] = "success";
//    redirect to index.php
        header('location: send_sms.php');

    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }

