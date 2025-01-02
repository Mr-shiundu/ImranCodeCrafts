<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email setup
    $to = 'imranshiundu@gmail.com';
    $subject = "New Call Back Request from $name";
    $body = "Name: $name\nPhone: $phone\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        $email_sent = true;
    } else {
        $email_sent = false;
    }

    // Send SMS using Twilio API (replace with your preferred SMS gateway)
    $account_sid = 'YOUR_TWILIO_ACCOUNT_SID';
    $auth_token = 'YOUR_TWILIO_AUTH_TOKEN';
    $twilio_number = 'YOUR_TWILIO_PHONE_NUMBER';
    $recipient_number = '+254740293859';

    $sms_body = "New Call Back Request:\nName: $name\nPhone: $phone\nMessage:\n$message";

    $client = new Twilio\Rest\Client($account_sid, $auth_token);

    try {
        $client->messages->create(
            $recipient_number,
            [
                'from' => $twilio_number,
                'body' => $sms_body
            ]
        );
        $sms_sent = true;
    } catch (Exception $e) {
        $sms_sent = false;
    }

    // Feedback to user
    if ($email_sent && $sms_sent) {
        echo "<p>Thank you, your request has been sent successfully!</p>";
    } elseif ($email_sent) {
        echo "<p>Your request was sent, but we couldn't send the SMS. We'll reach out via email.</p>";
    } else {
        echo "<p>Sorry, there was an error. Please try again later.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
