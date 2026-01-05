<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e8f5e9, #f1f8e9); /* Light green gradient */
            color: #2c3e50;
            line-height: 1.8;
        }

        /* Header Section */
        .header {
            background: linear-gradient(90deg, #43a047, #66bb6a); /* Green header gradient */
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .header .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header img {
            height: 60px;
            width: 60px;
            border-radius: 50%;
            border: 3px solid white;
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

        /* Page Container */
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Section Header Styles */
        h2 {
            font-size: 3em;
            color: #27ae60;
            margin-bottom: 20px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
        }

        /* Paragraph Styles */
        p {
            font-size: 1.2em;
            color: #34495e;
            text-align: justify;
            margin-bottom: 20px;
            line-height: 1.8;
        }

        /* Highlight Text */
        .highlight {
            font-weight: bold;
            color: #27ae60;
        }

        /* Decorative Separator */
        .separator {
            width: 80px;
            height: 4px;
            background-color: #27ae60;
            margin: 20px auto;
            border-radius: 2px;
        }

        /* Interactive Buttons */
        .action-buttons {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .action-buttons a {
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

        .action-buttons a:hover {
            background: #2e7d32;
            transform: scale(1.1);
        }

        /* Image Styles */
        .about-image {
            width: 100%;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 2.5em;
            }

            p {
                font-size: 1em;
            }

            .action-buttons a {
                padding: 12px 25px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <div class="logo">
            <img src="log.jpg" alt="Yield Cycle Logo"> <!-- Replace with your logo path -->
            <h1>Yield Cycle</h1>
        </div>
      </div>

    <!-- Main Content -->
    <div class="container">
        <h2>About Us</h2>
        <div class="separator"></div>
        <p>
            <span class="highlight">Yield Cycle</span> is an innovative platform designed to <strong>bridge the gap between farmers and industries</strong>, creating a sustainable and efficient ecosystem for crop trading and resource management.
        </p>
        <p>
            Our mission is to <strong>empower farmers by providing direct access to industries</strong>, ensuring fair prices for their hard work,<strong> while enabling industries to source quality crops efficiently.</strong>
        </p>
        <p>
            We envision a future where technology and collaboration drive agricultural prosperity, benefiting communities and contributing to global food security.
        </p>
        <p>
        We aim to expand to more regions and include a wider variety of crops, helping even more farmers and companies connect.</p>
        </div>
    </div>
</body>
</html>
