<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yield Cycle-Company</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('homebg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #2f4f4f;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #43a047;
            padding: 20px;
            position: fixed;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-left: 10px; /* Align logo to the left */
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
            color: white;
        }

        .profile-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-right: 50px; /* Align profile to the right */
        }

        .profile-container img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .profile-container a {
            text-decoration: none;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            transition: color 0.3s;
        }

        .profile-container a:hover {
            color: #dcedc8;
        }

        .content {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
            padding-left: 50px;
            text-align: left;
        }

        h1 {
            font-size: 3rem;
            color: #2e7d32;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            max-width: 600px;
        }

        .buttons {
            display: flex;
            justify-content: flex-start;
            gap: 10px; /* Reduced gap */
            margin-left:150px
        }

        .button {
            text-decoration: none;
            padding: 20px 40px;
            font-size: 1rem;
            color: white;
            background-color: #2e7d32;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #1b5e20;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <img src="log.jpg" alt="Logo">
            <div class="logo-text">Yield Cycle</div>
        </div>
        <div class="profile-container">
            <img src="profile.jpg" alt="Profile Picture">
            <a href="companyprofile.php">Profile</a>
        </div>
    </div>
    <div class="content">
        <div>
            <h1>Welcome to Yield Cycle</h1>
            <p><span class="highlight">Yield Cycle</span> is an innovative platform designed to <strong>bridge the gap between farmers and industries</strong>, creating a sustainable and efficient ecosystem for crop trading and resource management.</p>
            <div class="buttons">
                <a href="uploadcr.php" class="button">Upload Crop Requirement</a>
            </div>
        </div>
    </div>
</body>
</html>
