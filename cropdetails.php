<?php
include 'db.php'; // Database connection
session_start();  // Start the session to access logged-in farmer's ID

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crop_name = $_POST['crop_name'];
    $weight = $_POST['weight'];
    $crop_type = $_POST['crop_type'];
    
    // Retrieve logged-in farmer ID from session
    if (!isset($_SESSION['farmer_id'])) {
        echo "<script>alert('You must be logged in to upload crop details.'); window.location.href='farmer_login.php';</script>";
        exit();
    }
    $farmer_id = $_SESSION['farmer_id'];

    // File upload handling
    $target_dir = "uploads/";
    $crop_photo = NULL;

    if (!empty($_FILES["crop_photo"]["name"])) {
        $target_file = $target_dir . basename($_FILES["crop_photo"]["name"]);
        if (move_uploaded_file($_FILES["crop_photo"]["tmp_name"], $target_file)) {
            $crop_photo = $target_file;
        }
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO crop_details (farmer_id, crop_name, weight, crop_type, crop_photo) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isdss", $farmer_id, $crop_name, $weight, $crop_type, $crop_photo);
    
    if ($stmt->execute()) {
        echo "<script>alert('Crop details uploaded successfully!'); window.location.href='match_company.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
