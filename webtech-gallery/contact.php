<?php
$feedbackMessage = "";
$feedbackError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if ($name !== "" && $email !== "" && $message !== "") {
        $entry = "Name: " . htmlspecialchars($name) . "\n"
               . "Email: " . htmlspecialchars($email) . "\n"
               . "Message: " . htmlspecialchars($message) . "\n"
               . "-----------------------------\n";

        if (file_put_contents("feedback.txt", $entry, FILE_APPEND)) {
            $feedbackMessage = "Thank you for your feedback!";
        } else {
            $feedbackError = "Could not save your message.";
        }
    } else {
        $feedbackError = "Please fill in all fields.";
    }
}
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Contact / Feedback - WebTech Gallery</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <div id="container">
        <h1>Contact / Feedback</h1>

        <p>Have questions, suggestions, or feedback about the WebTech Gallery? Fill out the form below.</p>

        <form method="post" action="contact.php">
            <p>
                <label for="name">Name:</label><br />
                <input type="text" id="name" name="name" />
            </p>
            <p>
                <label for="email">Email:</label><br />
                <input type="text" id="email" name="email" />
            </p>
            <p>
                <label for="message">Message:</label><br />
                <textarea id="message" name="message" rows="5" cols="50"></textarea>
            </p>
            <p><input type="submit" value="Send Feedback" /></p>
        </form>

        <?php if ($feedbackMessage !== ""): ?>
            <p style="color: green;"><?php echo $feedbackMessage; ?></p>
        <?php elseif ($feedbackError !== ""): ?>
            <p style="color: red;"><?php echo $feedbackError; ?></p>
        <?php endif; ?>

        <h2>Example PHP (Form Processing):</h2>
        <pre>
&lt;?php
if ($_POST) {
    $msg = $_POST["message"];
    file_put_contents("feedback.txt", $msg, FILE_APPEND);
}
?&gt;
        </pre>

        <p><a href="index.html">← Back to Home</a></p>

        <div id="footer">
            <p>&copy; 2025 WebTech Gallery | Summer Project</p>
        </div>
    </div>
</body>
</html>
