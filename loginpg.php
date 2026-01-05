<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('background.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            gap: 20px; 
        }
        .login-frame {
            width: 400px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .login-frame h2 {
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
        .forgot-password {
            text-align: right;
            margin-top: -10px;
            margin-bottom: 20px;
        }
        .forgot-password a {
            font-size: 14px;
            color: #2980b9;
            text-decoration: none;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        .login-button {
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
        .login-button:hover {
            background-color: #2980b9;
        }
        .signup-link-container {
            text-align: center;
            margin-top: 15px;
        }
        .signup-link {
            color: #2980b9;
            text-decoration: none;
            font-size: 14px;
        }
        .signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Farmer Login Frame -->
    <div class="login-frame">
        <h2>Farmer Login</h2>
        <form action="farmer_login.php" method="post">
            <div class="form-group">
                <label for="farmer-username">Username</label>
                <input type="text" id="farmer-username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="farmer-password">Password</label>
                <input type="password" id="farmer-password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="forgot-password">
                <a href="password.php">Forgot Password?</a>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
        <div class="signup-link-container">
            Don't have an account? <a href="farmersign.php" class="signup-link">Signup</a>
        </div>
    </div>

    <!-- Company Login Frame -->
    <div class="login-frame">
        <h2>Company Login</h2>
        <form action="company_login.php" method="post">
            <div class="form-group">
                <label for="company-username">Username</label>
                <input type="text" id="company-username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="company-password">Password</label>
                <input type="password" id="company-password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="forgot-password">
                <a href="password.html">Forgot Password?</a>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
        <div class="signup-link-container">
            Don't have an account? <a href="companysign.php" class="signup-link">Signup</a>
        </div>
    </div>
</body>
</html>
