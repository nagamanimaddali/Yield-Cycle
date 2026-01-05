<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check company credentials
    $query = "SELECT * FROM companies WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['company_id'] = $row['id'];
            $_SESSION['company_username'] = $row['username'];
            header("Location: companyhome1.php"); // Redirect to company dashboard
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