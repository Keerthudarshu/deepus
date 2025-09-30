<!DOCTYPE html>
<html>
<head>
    <title>Form Action Test - Deepus</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .test-form { background: #f9f9f9; padding: 20px; border-radius: 5px; margin: 20px 0; border: 2px solid #46694F; }
        .info { background: #e8f4fd; padding: 15px; border-left: 4px solid #2196F3; margin: 20px 0; }
        input[type="email"] { padding: 10px; width: 300px; border: 1px solid #ccc; margin: 5px 0; }
        button { padding: 10px 20px; background: #46694F; color: white; border: none; cursor: pointer; margin: 5px; }
        pre { background: #f0f0f0; padding: 10px; border-radius: 3px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>Form Action Debugging - Forget Password</h1>
    
    <div class="info">
        <strong>Current Page Info:</strong><br>
        <strong>URL:</strong> <?php echo $_SERVER['REQUEST_URI']; ?><br>
        <strong>Document Root:</strong> <?php echo $_SERVER['DOCUMENT_ROOT']; ?><br>
        <strong>Script:</strong> <?php echo $_SERVER['SCRIPT_NAME']; ?>
    </div>

    <div class="test-form">
        <h3>Test Form - Same as Forget Password</h3>
        <p>This form uses the exact same action as the forget password form:</p>
        
        <form action="mailer" method="post" id="testForm">
            <label for="emailxn">Email Address:</label><br>
            <input type="email" name="emailxn" id="emailxn" placeholder="test@example.com" required>
            <br><br>
            <button type="submit" name="guima">Send Reset Code</button>
        </form>
        
        <div style="margin-top: 15px;">
            <strong>Form Action:</strong> <code>mailer</code> (relative path)<br>
            <strong>Resolved URL:</strong> <span id="resolvedUrl"></span>
        </div>
    </div>

    <div class="info">
        <h3>File Check:</h3>
        <?php
        $current_dir = dirname($_SERVER['SCRIPT_FILENAME']);
        $mailer_file = $current_dir . '/mailer.php';
        echo "<strong>Looking for mailer.php at:</strong> <code>$mailer_file</code><br>";
        
        if (file_exists($mailer_file)) {
            echo "<span style='color: green;'>✅ mailer.php exists</span><br>";
            echo "<strong>File size:</strong> " . filesize($mailer_file) . " bytes<br>";
            echo "<strong>Last modified:</strong> " . date('Y-m-d H:i:s', filemtime($mailer_file));
        } else {
            echo "<span style='color: red;'>❌ mailer.php NOT found</span>";
        }
        ?>
    </div>

    <?php
    // If form was submitted, show POST data
    if (isset($_POST['guima'])) {
        echo '<div class="info" style="background: #e8f5e8;">';
        echo '<h3>✅ Form Submitted Successfully!</h3>';
        echo '<strong>POST Data Received:</strong><br>';
        echo '<pre>' . print_r($_POST, true) . '</pre>';
        echo '<p><strong>This means the form routing is working!</strong> The issue might be in the mailer.php processing.</p>';
        echo '</div>';
    }
    ?>

    <div style="margin-top: 30px;">
        <a href="index?pg=forgetpass" style="display:inline-block; padding:10px; background:#46694F; color:white; text-decoration:none; border-radius:3px;">← Back to Forget Password</a>
        <a href="debug_mailer" style="display:inline-block; padding:10px; background:#2196F3; color:white; text-decoration:none; border-radius:3px; margin-left:10px;">Debug Mailer Routes</a>
    </div>

    <script>
    // Show the resolved URL
    const form = document.getElementById('testForm');
    const resolvedUrl = new URL(form.action, window.location.href);
    document.getElementById('resolvedUrl').textContent = resolvedUrl.href;
    
    // Add form submission logging
    form.addEventListener('submit', function(e) {
        console.log('Form submitting to:', resolvedUrl.href);
        console.log('Form method:', form.method);
        console.log('Form data:', new FormData(form));
    });
    </script>
</body>
</html>