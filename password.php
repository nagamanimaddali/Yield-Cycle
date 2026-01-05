<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* Light green background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .password-frame {
            width: 400px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .password-frame h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #34495e;
            font-size: 14px;
        }
        .form-group input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
            display: none; /* Initially hidden */
        }
        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="password-frame">
        <h2>Set New Password</h2>
	
        <form id="password-form">
            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new-password" placeholder="Enter new password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-Enter new password" required>
            </div>
            <div class="error-message" id="error-message">Passwords do not match.</div>
            <button type="submit" class="submit-button">Set Password</button>
        </form>
    </div>

    <script>
        const form = document.getElementById('password-form');
        const newPassword = document.getElementById('new-password');
        const confirmPassword = document.getElementById('confirm-password');
        const errorMessage = document.getElementById('error-message');

        form.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent form submission

            if (newPassword.value !== confirmPassword.value) {
                errorMessage.style.display = 'block'; // Show error message
            } else {
                errorMessage.style.display = 'none'; // Hide error message
                alert('Password successfully set!');
                // Redirect or process form submission
                // window.location.href = 'login.html';
            }
        });
    </script>
</body>
</html>
