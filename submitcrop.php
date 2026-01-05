<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crop_name = $_POST["crop_name"];
    $quantity = $_POST["quantity"];
    $farmer_id = $_POST["farmer_id"];  

    $sql = "INSERT INTO crops (farmer_id, crop_name, quantity, price) VALUES ('$farmer_id', '$crop_name', '$quantity', '$price')";
    if ($conn->query($sql) === TRUE) {
        // Fetch matching companies
        $fetchCompanies = "SELECT c.company_name, c.email, c.phone_number FROM crop_requests cr JOIN companies c ON cr.company_id = c.id WHERE cr.crop_name = '$crop_name' AND cr.quantity <= '$quantity'";
        $result = $conn->query($fetchCompanies);
        
        if ($result->num_rows > 0) {
            echo "<h2>Companies Interested in Your Crop:</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p>Company: " . $row['company_name'] . " | Email: " . $row['email'] . " | Phone: " . $row['phone_number'] . "</p>";
            }
        } else {
            echo "<p>No matching companies found for your crop.</p>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
