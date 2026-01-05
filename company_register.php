<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST["company-name"];
    $username = $_POST["username"];
    $phone_number = $_POST["phone-number"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $confirm_pass = $_POST["password"]; // storing plain confirm password, though it's not recommended

    // Check if username or email already exists
    $check_stmt = $conn->prepare("SELECT id FROM companies WHERE username = ? OR email = ?");
    $check_stmt->bind_param("ss", $username, $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "Error: Username or email already taken.";
    } else {
        // Insert into database
        $insert_stmt = $conn->prepare("INSERT INTO companies (company_name, username, phone_number, email, password, confirm_pass) VALUES (?, ?, ?, ?, ?, ?)");
        $insert_stmt->bind_param("ssssss", $company_name, $username, $phone_number, $email, $password, $confirm_pass);

        if ($insert_stmt->execute()) {
            echo "<script>window.location.href='thanks1.php';</script>";
        } else {
            echo "Error: " . $insert_stmt->error;
        }
    }

    $check_stmt->close();
    $insert_stmt->close();
    $conn->close();
}
?>
