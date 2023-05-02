
<?php
require_once 'vendor/autoload.php'; // Load Africa's Talking SDK

// Setting my credentials
// $username = "bulk_sms_sender";
// $apiKey = "614047be2aa4f222277a461bec466786cb367d6c89f4cfcc40f1185af57efc4f";

$username = "sandbox";
$apiKey = 'cd229204de0e6c06db4fa027cf1e8e38430bc25b605326dfe5727a0d8fa9822a';

// Initialize the SDK
$AT = new AfricasTalking\SDK\AfricasTalking($username, $apiKey);

// Get the selected send_to option and phone numbers
$sendTo = $_POST['send_to'];
$phoneNumbers = $_POST['phone_numbers'];
$message = $_POST['message'];

// Create a new SMS service instance
$sms = $AT->sms();

// Send message to a single number
if ($sendTo === 'single') {
    if (isset($_POST['phone_number'])) {
        $phoneNumber = $_POST['phone_number'];
        $result = $sms->send([
            'to' => $phoneNumber,
            'message' => $message,
        ]);

        // Display success message and button to navigate back to home screen
        if ($result['status'] === 'success') {
            echo "<p>Message sent successfully!</p>";
            echo "<button onclick=\"window.location.href='sendSms.php'\">Back to Home</button>";
        } else {
            echo "<p>Error sending message: " . $result['data']['message'] . "</p>";
        }
    } else {
        echo "Phone number is not set in the form data.";
    }
}

// Send message to multiple numbers
if ($sendTo === 'bulk') {
    $recipients = implode(',', $phoneNumbers);
    $result = $sms->send([
        'to' => $recipients,
        'message' => $message,
    ]);


    // Display success message and button to navigate back to home screen
    if ($result['status'] === 'success') {
        echo "<p>Message sent successfully!</p>";
        echo "<button onclick=\"window.location.href='sendSms.php'\">Back to Home</button>";
    } else {
        echo "<p>Error sending message: " . $result['data']['message'] . "</p>";
    }
}
