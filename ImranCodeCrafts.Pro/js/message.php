<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>

<!-- contact section -->
<section class="contact_section">
  <h2>Request A Call Back</h2>
  <form action="contact.php" method="post">
      <div>
          <input type="text" name="name" placeholder="Name" required />
      </div>
      <div>
          <input type="text" name="phone" placeholder="Phone Number" required />
      </div>
      <div>
          <input type="email" name="email" placeholder="Email" required />
      </div>
      <div>
          <input type="text" class="message-box" name="message" placeholder="Message" required />
      </div>
      <div class="d-flex">
          <button type="submit">SEND</button>
      </div>
  </form>
</section>

<!-- PHP code to handle form submission -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Your email address
    $to = "imranshiundu@gmail.com";

    // Email subject and message
    $subject = "New Contact Form Submission";
    $email_message = "Name: $name\n";
    $email_message .= "Phone: $phone\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message: $message\n";

    // Email headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
}
?>

</body>
</html>

