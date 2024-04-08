<?php
// Add your database connection logic here
// For example:
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    // Execute the statement
    if ($stmt->execute()) {
        // Registration successful
        echo json_encode(array('success' => true, 'message' => 'Registration successful. You can now login.'));
    } else {
        // Registration failed
        echo json_encode(array('success' => false, 'message' => 'Registration failed. Please try again.'));
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
