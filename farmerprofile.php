<?php
session_start();
include 'db.php';

if (!isset($_SESSION['farmer_id'])) {
    header("Location: login.php");    
    exit;
}

$farmer_id = $_SESSION['farmer_id'];
$sql = "SELECT * FROM farmers WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $farmer_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $farmer = $result->fetch_assoc();
} else {
    echo "Farmer not found!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Farmer Profile - Yield Cycle</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f6f6f6;
            margin: 0;
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
            margin-bottom: 30px;
        
        }

        .header img {
            height: 50px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
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


        .profile-container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-container h2 {
            color: #27ae60;
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-group {
            margin-bottom: 20px;
        }

        .profile-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .profile-group input,
        .profile-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
        }

        .update-btn {
            display: block;
            width: 100%;
            background-color: #27ae60;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }

        .update-btn:hover {
            background-color: #219150;
        }
    </style>
</head>
<body>
    <header>
    <div class="logo-container">
        <img src="log.jpg" alt="Logo" />
        <div class="logo-text">Yield Cycle</div>
    </div>
</header>

    <div class="profile-container">
        <h2>Farmer Profile</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $farmer['id'] ?>">

            <div class="profile-group">
                <label>Name</label>
		<input type="text" name="name" value="<?= htmlspecialchars($farmer['username'] ?? '') ?>" required>

            </div>

            <div class="profile-group">
                <label>Phone Number</label>
                <input type="tel" name="phone" value="<?= htmlspecialchars($farmer['phone_number']) ?>" required>
            </div>

            <div class="profile-group">
                <label>Email ID</label>
                <input type="email" name="email" value="<?= htmlspecialchars($farmer['email']) ?>" required>
            </div>

            <div class="profile-group">
                <label>Address</label>
                <textarea name="address" rows="4"><?= htmlspecialchars($farmer['address']) ?></textarea>
            </div>

            <button type="submit" class="update-btn">Update Profile</button>
        </form>
    </div>
</body>
</html>