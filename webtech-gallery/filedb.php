<?php
$filename = "messages.txt";
$message = "";
$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["msg"])) {
        $msg = htmlspecialchars(trim($_POST["msg"])) . "\n";
        if ($file = fopen($filename, "a")) {
            fwrite($file, $msg);
            fclose($file);
            $message = "Message saved!";
        } else {
            $error = "Error: Could not write to file.";
        }
    } else {
        $error = "Please enter a message.";
    }
}

// Read messages
$allMessages = "";
if (file_exists($filename)) {
    $allMessages = file_get_contents($filename);
}
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Files & Databases - WebTech Gallery</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <div id="container">
        <h1>Files & Databases</h1>

        <p>In this example, PHP writes and reads data from a simple text file. This simulates how a database might store user input, without using SQL.</p>

        <h2>Leave a Message</h2>
        <form method="post" action="filedb.php">
            <p>
                <label for="msg">Message:</label><br />
                <textarea id="msg" name="msg" rows="4" cols="50"></textarea>
            </p>
            <p><input type="submit" value="Submit Message" /></p>
        </form>

        <?php if (!empty($message)): ?>
            <p style="color: green;"><?php echo $message; ?></p>
        <?php elseif (!empty($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <h2>All Messages</h2>
        <pre><?php echo htmlspecialchars($allMessages); ?></pre>

        <h2>PHP File I/O Example:</h2>
        <pre>
&lt;?php
$file = fopen("messages.txt", "a");
fwrite($file, "Hello\n");
fclose($file);
?&gt;
        </pre>

        <p><a href="index.html">← Back to Home</a></p>

        <div id="footer">
            <p>&copy; 2025 WebTech Gallery | Summer Project</p>
        </div>
    </div>
</body>
</html>
