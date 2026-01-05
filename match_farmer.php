<?php
session_start();

if (!isset($_SESSION['company_id'])) {
    die("Company not logged in.");
}

$company_id = $_SESSION['company_id'];
require 'db.php'; // Your DB connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Matching Farmers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Your CSS remains unchanged for styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: linear-gradient(135deg, #e8f5e9, #f1f8e9);
            color: #2c3e50;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-bottom: 50px;
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
        .container {
            max-width: 1100px;
            width: 100%;
        }
        h2.text-center {
            font-weight: 700;
            color: #1b5e20;
            margin-bottom: 40px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(66, 165, 245, 0.2);
            background: linear-gradient(135deg, #a5d6a7, #c8e6c9);
            color: #1b5e20;
            margin: 0 auto;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(66, 165, 245, 0.35);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .card-text strong {
            color: #2e7d32;
        }
        .alert-warning {
            max-width: 600px;
            margin: 40px auto;
            font-size: 1.2rem;
            font-weight: 600;
            background: #fff3cd;
            color: #856404;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .row {
            justify-content: center;
        }
        @media (max-width: 768px) {
            .card-title {
                font-size: 18px;
            }
            .card-text {
                font-size: 14px;
            }
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

<div class="container my-5">
    <h2 class="text-center">Matching Farmer Details</h2>
    <div class="row">
        <?php
        // Step 1: Get all crop requirements for this company
        $sql = "SELECT crop_name, crop_type FROM crop_requirements WHERE company_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Use associative array to store unique matches
        $matches = [];

        // Prepare second statement outside the loop
        $sql2 = "SELECT cd.crop_name, cd.weight, cd.crop_type, f.username, f.phone_number, f.email 
                 FROM crop_details cd
                 JOIN farmers f ON cd.farmer_id = f.id
                 WHERE LOWER(cd.crop_name) = LOWER(?) AND cd.crop_type = ?";
        $stmt2 = $conn->prepare($sql2);

        while ($req = $result->fetch_assoc()) {
            $crop_name = $req['crop_name'];
            $crop_type = $req['crop_type'];

            $stmt2->bind_param("ss", $crop_name, $crop_type);
            $stmt2->execute();
            $res2 = $stmt2->get_result();

            while ($row = $res2->fetch_assoc()) {
                $key = $row['email'] . '|' . $row['crop_name'] . '|' . $row['crop_type'];
                $matches[$key] = $row; // Use key to prevent duplicates
            }
        }

        if (!empty($matches)) {
            foreach ($matches as $match) {
                ?>
                <div class="col-md-6 col-lg-4 mb-4 d-flex justify-content-center">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($match['username']); ?></h5>
                            <p class="card-text">
                                <strong>Farmer Name:</strong> <?php echo htmlspecialchars($match['username']); ?><br>
                                <strong>Phone:</strong> <?php echo htmlspecialchars($match['phone_number']); ?><br>
                                <strong>Email:</strong> <?php echo htmlspecialchars($match['email']); ?><br>
                                <strong>Crop:</strong> <?php echo htmlspecialchars($match['crop_name']); ?><br>
                                <strong>Type:</strong> <?php echo htmlspecialchars($match['crop_type']); ?><br>
                                <strong>Quantity:</strong> <?php echo htmlspecialchars($match['weight']); ?> kg
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="alert alert-warning text-center">No matching crops found.</div>';
        }
        ?>
    </div>
</div>
</body>
</html>
