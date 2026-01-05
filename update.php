<?php
session_start();
$updateMessage = "";
if (isset($_GET['status']) && $_GET['status'] == "success") {
    $updateMessage = "Profile updated successfully!";
}

include 'db.php';

if (!isset($_SESSION['farmer_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['farmer_id']; 
    $username = $_POST['name'];
    $phone_number = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("UPDATE farmers SET username = ?, phone_number = ?, email = ?, address = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $username, $phone_number, $email, $address, $id);

    if ($stmt->execute()) {
        header("Location: farmerprofile.php?status=success");
        exit;
    } else {
        echo "Error updating profile.";
    }
}
?>
