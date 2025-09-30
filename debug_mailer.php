<!DOCTYPE html>
<html>
<head>
    <title>Mailer Route Test - Deepus</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .test-section { background: #f9f9f9; padding: 20px; border-radius: 5px; margin: 20px 0; }
        .info { background: #e8f4fd; padding: 15px; border-left: 4px solid #2196F3; margin: 20px 0; }
        .success { background: #e8f5e8; padding: 15px; border-left: 4px solid #4CAF50; margin: 20px 0; }
        .error { background: #fee; padding: 15px; border-left: 4px solid #f44336; margin: 20px 0; }
        input[type="email"] { padding: 10px; width: 300px; border: 1px solid #ccc; margin: 5px 0; }
        button { padding: 10px 20px; background: #46694F; color: white; border: none; cursor: pointer; margin: 5px; }
        button:hover { background: #355a40; }
        .url-test { background: #fff; border: 1px solid #ddd; padding: 10px; margin: 10px 0; font-family: monospace; }
    </style>
</head>
<body>
    <h1>Mailer Routing Debug - Deepus</h1>
    
    <div class="info">
        <strong>🔍 Debugging Mailer Routing Issues</strong><br>
        This page helps test and debug the mailer routing to ensure the forget password form works correctly.
    </div>

    <div class="test-section">
        <h3>Test 1: Direct Mailer Access</h3>
        <p>Test if the mailer can be accessed directly with different URL formats:</p>
        
        <div class="url-test">
            <strong>Method 1:</strong> <a href="mailer" target="_blank">mailer</a> (relative path)
        </div>
        <div class="url-test">
            <strong>Method 2:</strong> <a href="./mailer" target="_blank">./mailer</a> (current directory)
        </div>
        <div class="url-test">
            <strong>Method 3:</strong> <a href="mailer.php" target="_blank">mailer.php</a> (direct file)
        </div>
        <div class="url-test">
            <strong>Method 4:</strong> <a href="/deepus/mailer" target="_blank">/deepus/mailer</a> (absolute path)
        </div>
    </div>

    <div class="test-section">
        <h3>Test 2: Form Submission Test</h3>
        <p>Test form submission with different action URLs:</p>
        
        <h4>Form A: Relative Path (mailer)</h4>
        <form action="mailer" method="post" style="border: 1px solid #ccc; padding: 15px; margin: 10px 0;">
            <input type="email" name="emailxn" placeholder="test-email@example.com" required>
            <button type="submit" name="guima">Test Submit A</button>
            <small style="display: block; color: #666;">Form action: "mailer"</small>
        </form>

        <h4>Form B: Current Directory (./mailer)</h4>
        <form action="./mailer" method="post" style="border: 1px solid #ccc; padding: 15px; margin: 10px 0;">
            <input type="email" name="emailxn" placeholder="test-email@example.com" required>
            <button type="submit" name="guima">Test Submit B</button>
            <small style="display: block; color: #666;">Form action: "./mailer"</small>
        </form>

        <h4>Form C: Absolute Path (/deepus/mailer)</h4>
        <form action="/deepus/mailer" method="post" style="border: 1px solid #ccc; padding: 15px; margin: 10px 0;">
            <input type="email" name="emailxn" placeholder="test-email@example.com" required>
            <button type="submit" name="guima">Test Submit C</button>
            <small style="display: block; color: #666;">Form action: "/deepus/mailer"</small>
        </form>
    </div>

    <div class="test-section">
        <h3>Test 3: Current Configuration</h3>
        <div class="info">
            <strong>Current Page URL:</strong> <code><?php echo $_SERVER['REQUEST_URI']; ?></code><br>
            <strong>Document Root:</strong> <code><?php echo $_SERVER['DOCUMENT_ROOT']; ?></code><br>
            <strong>Script Name:</strong> <code><?php echo $_SERVER['SCRIPT_NAME']; ?></code><br>
            <strong>Server Name:</strong> <code><?php echo $_SERVER['SERVER_NAME']; ?></code>
        </div>
    </div>

    <div class="test-section">
        <h3>Check Mailer File Status</h3>
        <?php
        $mailer_paths = [
            'mailer.php' => './mailer.php',
            'Direct path' => 'C:\\xampp\\htdocs\\deepus\\mailer.php'
        ];
        
        foreach ($mailer_paths as $label => $path) {
            if (file_exists($path)) {
                echo "<div class='success'>✅ <strong>$label:</strong> File exists at <code>$path</code></div>";
            } else {
                echo "<div class='error'>❌ <strong>$label:</strong> File NOT found at <code>$path</code></div>";
            }
        }
        ?>
    </div>

    <div style="margin-top: 30px;">
        <a href="index?pg=forgetpass" style="display:inline-block; padding:10px; background:#46694F; color:white; text-decoration:none; border-radius:3px;">← Back to Forget Password</a>
        <a href="test_email" style="display:inline-block; padding:10px; background:#2196F3; color:white; text-decoration:none; border-radius:3px; margin-left:10px;">Test Email Config</a>
    </div>

    <script>
    // Add click handlers to test different URL access methods
    document.querySelectorAll('a[href^="mailer"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;
            console.log('Testing URL:', url);
            
            fetch(url, { method: 'GET' })
                .then(response => {
                    console.log('Response status:', response.status);
                    if (response.status === 200) {
                        alert(`✅ Success! URL "${url}" is accessible (Status: ${response.status})`);
                    } else {
                        alert(`❌ Error! URL "${url}" returned status: ${response.status}`);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert(`❌ Error accessing "${url}": ${error.message}`);
                });
        });
    });
    </script>
</body>
</html>