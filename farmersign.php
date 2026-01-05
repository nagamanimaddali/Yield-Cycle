<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Signup</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('bg1.jpg'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
        }
        .signup-container {
            width: 100%;
            max-width: 500px; 
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7); 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }
        .signup-container h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
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
        .signup-button {
            width: 100%;
            padding: 10px;
            background-color: #2ecc71;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .signup-button:hover {
            background-color: #27ae60;
        }
        .login-link-container {
            text-align: center;
            margin-top: 15px;
        }
        .login-link {
            color: #2980b9;
            text-decoration: none;
            font-size: 14px;
        }
        .login-link:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Farmer Signup</h2>
        <form id="signup-form" action="farmer_register.php" method="POST">

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Choose a username" required>
            </div>
            <div class="form-group">
                <label for="phone-number">Phone Number</label>
                <input type="tel" id="phone-number" name="phone-number" placeholder="Enter your phone number" required>
                <div class="error-message" id="phone-error"></div>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            </div>
            <div class="form-group">
                <label for="password">Set Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password" minlength="8" required>
                <div class="error-message" id="password-error"></div>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                <div class="error-message" id="confirm-password-error"></div>
            </div>
            <button type="submit" class="signup-button">Sign Up</button>
        </form>
        <div class="login-link-container">
            Already have an account? <a href="loginpg.php" class="login-link">Login</a>
        </div>
    </div>
    <script>
        // JavaScript to validate phone number and password
        const form = document.getElementById('signup-form');
        const phoneNumberInput = document.getElementById('phone-number');
        const phoneError = document.getElementById('phone-error');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm-password');
        const confirmPasswordError = document.getElementById('confirm-password-error');

        form.addEventListener('submit', function(event) {
            let valid = true;

            // Validate phone number
            if (!/^\d{10}$/.test(phoneNumberInput.value)) {
                phoneError.textContent = "Phone number must be exactly 10 digits.";
                valid = false;
            } else {
                phoneError.textContent = "";
            }

            // Validate password match
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordError.textContent = "Passwords do not match.";
                valid = false;
            } else {
                confirmPasswordError.textContent = "";
            }

            if (!valid) {
                event.preventDefault(); // Prevent form submission if there are errors
            }
        });
    </script>
</body>
</html>
