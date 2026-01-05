<?php
session_start();
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check farmer credentials
    $query = "SELECT * FROM farmers WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['farmer_id'] = $row['id'];
            $_SESSION['farmer_username'] = $row['username'];
            header("Location: farmerhome.php"); // Redirect to farmer dashboard
            exit();
        } else {
            echo "<script>alert('Invalid Password!'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.location='login.php';</script>";
    }
    $stmt->close();
}
?>