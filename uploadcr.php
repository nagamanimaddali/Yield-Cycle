<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Crop Requirements - Yield Cycle</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #27ae60;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            border: 2px solid white;
        }

        .logo-container .logo-text {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .profile-container {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .profile-container img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .content-box {
            width: 90%;
            max-width: 500px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
        }

        .content-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #27ae60;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #34495e;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #27ae60;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1e8449;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo-container">
            <img src="log.jpg" alt="Yield Cycle Logo">
            <div class="logo-text">Yield Cycle</div>
        </div>
        <div class="profile-container" onclick="redirectToProfile()">
            <img src="profile.jpg" alt="User Profile">
            <span>Profile</span>
        </div>
    </header>

    <!-- Crop Upload Form -->
    <div class="content-box">
        <h2>Upload Crop Requirement</h2>
        <form action="upload_requirement.php" method="POST" enctype="multipart/form-data">
            <label for="crop-name">Name of the Crop</label>
            <input type="text" id="crop-name" name="crop_name" placeholder="Enter crop name" required>

            <label for="weight">Weight (in kilograms)</label>
            <input type="number" id="weight" name="weight" placeholder="Enter crop weight" required>

            <label for="crop-type">Type of Crop</label>
            <select id="crop-type" name="crop_type" required>
                <option value="" disabled selected>Select crop type</option>
                <option value="fresh">Fresh Crop</option>
                <option value="surplus">Surplus Crop</option>
            </select>

            <label for="additional-info">Additional Notes (Optional)</label>
            <textarea id="additional-info" name="additional_info" placeholder="Provide any additional details about the crop requirements" rows="4"></textarea>

            <input type="submit" value="Submit Crop Details">
        </form>
    </div>

    <script>
        function redirectToProfile() {
            // Redirect to the profile page
            window.location.href = "companyprofile.php";
        }

        function redirectToFarmerDetails(event) {
            // Prevent the default form submission
            event.preventDefault();
            // Redirect to the farmer details page
            window.location.href = "upload_requirement.php";
        }
    </script>
</body>
</html>

