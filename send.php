<?php



require 'assets/vendor/autoload.php'; // Replace with the actual path to the Twilio PHP library autoload file.

use Twilio\Rest\Client;
if(isset($_POST['ok'])){
// Replace with your Twilio Account SID, Auth Token, and Twilio phone number.
$accountSid = 'ACd69022ff67e8080a7d4ccf7f85f56adf';
$authToken = '0fd5798bb0b0cf62d3abcc1ce637633e';
$twilioPhoneNumber = '07717060562';

// Recipient's phone number and the message you want to send.
$recipientPhoneNumber = '07706340486'; // Replace with the recipient's phone number in E.164 format (including the country code).
$message = 'أهلا , رسالة تجريبية من حوراء';

// Initialize the Twilio client.
$twilio = new Client($accountSid, $authToken);

try {
    // Send the SMS message.
    $twilio->messages->create(
        $recipientPhoneNumber,
        [
            'from' => $twilioPhoneNumber,
            'body' => $message,
        ]
    );

    echo "SMS sent successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

}
?>