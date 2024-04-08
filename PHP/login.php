<?php
session_start();

// Add your database connection logic here
// For example:
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if user exists
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables and redirect to profile page
            $_SESSION['username'] = $username;
             // Redirect to profile page
            header("Location: profile.php");
            exit(); // Ensure script execution stops after redirection
        } else {
            // Password is incorrect
            // Handle unsuccessful login, display error message, etc.
        }
    } else {
        // User not found
        // Handle unsuccessful login, display error message, etc.
    }
}

// Close database connection
$conn->close();
?>
