<?php
session_start();
include 'db.php';

if (!isset($_SESSION['farmer_id'])) {
    echo "Farmer not logged in.";
    exit();
}

$farmer_id = $_SESSION['farmer_id'];

$sql = "SELECT crop_name, weight FROM crop_details WHERE farmer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $farmer_id);
$stmt->execute();
$result = $stmt->get_result();

$matches = [];

while ($row = $result->fetch_assoc()) {
    $crop_name = $row['crop_name'];
    $weight = $row['weight'];

    $match_sql = "SELECT c.company_name, c.phone_number, c.email, cr.crop_name, cr.weight AS required_weight, cr.crop_type
                  FROM crop_requirements cr
                  JOIN companies c ON cr.company_id = c.id
                  WHERE cr.crop_name = ? AND cr.weight <= ?";
    
    $match_stmt = $conn->prepare($match_sql);
    $match_stmt->bind_param("sd", $crop_name, $weight);
    $match_stmt->execute();
    $match_result = $match_stmt->get_result();

    while ($match = $match_result->fetch_assoc()) {
        $matches[] = $match;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Matching Companies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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
            padding: 20px;
        }

        h2.text-center {
            font-weight: 700;
            color: #1b5e20;
            margin-bottom: 40px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(66, 165, 245, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
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
    <h2 class="text-center">Companies Matching Your Crops</h2>
    <div class="row">
        <?php if (!empty($matches)) : ?>
            <?php foreach ($matches as $row): ?>
                <div class="col-md-6 col-lg-4 mb-4 d-flex justify-content-center">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['company_name']); ?></h5>
                            <p class="card-text">
                                <strong>Company Name:</strong> <?php echo htmlspecialchars($row['company_name']); ?><br>
                                <strong>Phone:</strong> <?php echo htmlspecialchars($row['phone_number']); ?><br>
                                <strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?><br>
                                <strong>Crop:</strong> <?php echo htmlspecialchars($row['crop_name']); ?><br>
                                <strong>Type:</strong> <?php echo htmlspecialchars($row['crop_type']); ?><br>
                                <strong>Required Weight:</strong> <?php echo htmlspecialchars($row['required_weight']); ?> kg
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-warning text-center">No matching companies found for your crops.</div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
