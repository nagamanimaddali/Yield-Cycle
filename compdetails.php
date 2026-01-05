<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crop_name = $_POST["crop_name"];
    $weight = $_POST["quantity"];
    $farmer_id = $_POST["farmer_id"];

    // Insert crop details
    $sql = "INSERT INTO crop_details (farmer_id, crop_name, weight) VALUES ('$farmer_id', '$crop_name', '$weight')";
    if ($conn->query($sql) === TRUE) {
        // Fetch matching companies
        $fetchCompanies = "SELECT c.company_name, c.email, c.phone_number 
                           FROM crop_requirements cr 
                           JOIN companies c ON cr.company_id = c.id 
                           WHERE cr.crop_name = '$crop_name' 
                           AND cr.weight <= '$weight'";
        $result = $conn->query($fetchCompanies);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Crop Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #27ae60;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #1e8449;
        }
        .company-list {
            margin-top: 30px;
        }
        .company-item {
            background-color: #fafafa;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submit Crop Details</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="crop_name">Crop Name:</label>
                <input type="text" id="crop_name" name="crop_name" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity (in kg):</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>
            <input type="hidden" name="farmer_id" value="1">  <!-- Replace with dynamic farmer ID -->
            <button type="submit" class="submit-btn">Submit</button>
        </form>

        <div class="company-list">
            <h2>Companies Interested in Your Crop</h2>
            <?php if (isset($result) && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="company-item">
                        <p><strong>Company:</strong> <?= $row['company_name']; ?></p>
                        <p><strong>Email:</strong> <?= $row['email']; ?></p>
                        <p><strong>Phone:</strong> <?= $row['phone_number']; ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No matching companies found for your crop.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
