<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThankYou</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e8f5e9, #f1f8e9);
            color: #2c3e50;
            line-height: 1.6;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background: linear-gradient(90deg, #43a047, #66bb6a);
            color: white;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-container img {
            height: 60px;
            width: 60px;
            border-radius: 50%;
            border: 3px solid white;
        }

        .logo-container .logo-text {
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 1.2em;
            font-weight: bold;
            transition: color 0.3s, transform 0.3s;
        }

        nav ul li a:hover {
            color: #dcedc8;
            transform: scale(1.1);
        }

        /* Centered Thank You Section */
        .thank-you-container {
            text-align: center;
            padding: 100px 30px;
            background: linear-gradient(135deg, #a5d6a7, #c8e6c9);
            color: #1b5e20;
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            max-width: 900px;
            width: 100%;
            margin-top: 50px; /* Space between header and content */
        }

        .thank-you-container h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .thank-you-container p {
            font-size: 20px;
            margin-bottom: 30px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
        }

        .thank-you-container .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .thank-you-container .action-buttons a {
            text-decoration: none;
            background: #43a047;
            color: #fff;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
            transition: transform 0.3s, background 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .thank-you-container .action-buttons a:hover {
            background: #2e7d32;
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .thank-you-container h1 {
                font-size: 36px;
            }

            .thank-you-container p {
                font-size: 16px;
            }

            nav ul {
                flex-wrap: wrap;
                gap: 15px;
            }

            .thank-you-container .action-buttons a {
                padding: 12px 25px;
                font-size: 14px;
            }
        }

        /* Animation for buttons */
        .thank-you-container .action-buttons a {
            position: relative;
            overflow: hidden;
        }

        .thank-you-container .action-buttons a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 95%;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
            transition: left 0.3s;
            z-index: 0;
        }

        .thank-you-container .action-buttons a:hover::before {
            left: 100%;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo-container">
            <img src="log.jpg" alt="Logo">
            <div class="logo-text">Yield Cycle</div>
        </div>
        </header>

    <!-- Centered Thank You Section -->
    <section class="thank-you-container">
        <h1>Thank You for Joining Yield Cycle!</h1>
        <p>We appreciate your commitment to connecting farmers and industries for a sustainable future. Let’s make a difference together!</p>
        <div class="action-buttons">
            <a href="loginpg.php">Return to Login</a>
        </div>
    </section>
</body>
</html>
