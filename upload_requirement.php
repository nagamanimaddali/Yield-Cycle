<?php
session_start();
include 'db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crop_name = $_POST['crop_name'];
    $weight = $_POST['weight'];
    $crop_type = $_POST['crop_type'];
    $additional_info = !empty($_POST['additional_info']) ? $_POST['additional_info'] : NULL;

    // Get company ID from session
    if (!isset($_SESSION['company_id'])) {
        echo "<script>alert('You must be logged in as a company to post requirements.'); window.location.href='login.php';</script>";
        exit();
    }
    $company_id = $_SESSION['company_id'];

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO crop_requirements (company_id, crop_name, weight, crop_type, additional_info) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isdss", $company_id, $crop_name, $weight, $crop_type, $additional_info);

    if ($stmt->execute()) {
        echo "<script>alert('Crop requirement uploaded successfully!'); 
        window.location.href='match_farmer.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
