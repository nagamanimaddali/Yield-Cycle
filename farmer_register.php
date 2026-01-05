<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $phone_number = $_POST["phone-number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location.href='farmersign.php';</script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the username, email, or phone number already exists
    $checkQuery = "SELECT * FROM farmers WHERE username='$username' OR email='$email' OR phone_number='$phone_number'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "<script>alert('Username, Email, or Phone already exists!'); window.location.href='farmersign.php';</script>";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO farmers (username, phone_number, email, password) 
                VALUES ('$username', '$phone_number', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Signup successful!'); window.location.href='thanks.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>
