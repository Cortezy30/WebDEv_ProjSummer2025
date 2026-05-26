<?php
session_start();

// Handle form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["username"])) {
        $_SESSION["username"] = htmlspecialchars($_POST["username"]);
    }

    if (!empty($_POST["color"])) {
        setcookie("favcolor", htmlspecialchars($_POST["color"]), time() + 3600); // 1 hour
    }
}

// Get session and cookie values
$username = isset($_SESSION["username"]) ? $_SESSION["username"] : null;
$favColor = isset($_COOKIE["favcolor"]) ? $_COOKIE["favcolor"] : null;
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sessions & Cookies - WebTech Gallery</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body style="background-color: <?php echo $favColor ? $favColor : '#ffffff'; ?>;">
    <div id="container">
        <h1>Sessions & Cookies</h1>

        <p>Sessions and cookies allow web applications to remember information between different pages or visits. Sessions are stored on the server, while cookies are stored on the client.</p>

        <h2>Set Your Preferences</h2>
        <form method="post" action="sessions.php">
            <p>
                <label for="username">Enter your name:</label>
                <input type="text" name="username" id="username" />
            </p>
            <p>
                <label for="color">Choose your favorite background color:</label>
                <input type="color" name="color" id="color" />
            </p>
            <p>
                <input type="submit" value="Save Preferences" />
            </p>
        </form>

        <?php if ($username): ?>
            <p><strong>Session:</strong> Welcome back, <?php echo $username; ?>!</p>
        <?php endif; ?>

        <?php if ($favColor): ?>
            <p><strong>Cookie:</strong> Your favorite background color is set!</p>
        <?php endif; ?>

        <h2>Behind the Scenes:</h2>
        <pre>
&lt;?php
session_start();
$_SESSION["username"] = "Alice";
setcookie("favcolor", "blue", time() + 3600);
?&gt;
        </pre>

        <p><a href="index.html">← Back to Home</a></p>

        <div id="footer">
            <p>&copy; 2025 WebTech Gallery | Summer Project</p>
        </div>
    </div>
</body>
</html>
