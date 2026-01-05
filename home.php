<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yield Cycle</title>
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
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background: linear-gradient(90deg, #43a047, #66bb6a);
            color: white;
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

        .hero {
            text-align: center;
            padding: 170px 30px;
            background: linear-gradient(135deg, #a5d6a7, #c8e6c9);
            color: #1b5e20;
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            margin: 20px auto;
            max-width:900px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
        }

        .hero .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .hero .action-buttons .line-1,
        .hero .action-buttons .line-2 {
            display: flex;
            gap: 20px;
        }

        .hero .action-buttons a {
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

        .hero .action-buttons a:hover {
            background: #2e7d32;
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 16px;
            }

            nav ul {
                flex-wrap: wrap;
                gap: 15px;
            }

            .hero .action-buttons a {
                padding: 12px 25px;
                font-size: 14px;
            }
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
        <nav>
            <ul>
                <li><a href="about.php">About Us</a></li>
                <li><a href="loginpg.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to Yield Cycle</h1>
        <p>Your platform for connecting farmers and industries for a sustainable future.</p>
        <div class="action-buttons">
                        <div class="line-2">
                <a href="farmersign.php">Get Started as Farmer</a>
                <a href="companysign.php">Get Started as Company</a>
            </div>
        </div>
    </section>
</body>
</html>
