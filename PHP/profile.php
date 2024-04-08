<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}

// Add your database connection logic here
// For example:
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

// Check if user details exist in the database
$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $age = $row['age']; // Assuming 'age', 'dob', and 'contact' are columns in the 'users' table
    $dob = $row['dob'];
    $contact = $row['contact'];
} else {
    // Handle error if user details are not found
    $age = 'N/A';
    $dob = 'N/A';
    $contact = 'N/A';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>
   <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
   <div class="container">
      <h1>Profile</h1>
      <p>Welcome, <span id="username"><?php echo $_SESSION['username']; ?></span>!</p>
      <p>Age: <span id="age"><?php echo $age; ?></span></p>
      <p>Date of Birth: <span id="dob"><?php echo $dob; ?></span></p>
      <p>Contact: <span id="contact"><?php echo $contact; ?></span></p>
      <!-- Additional details such as age, dob, contact, etc. can be displayed here -->
      <a href="update_profile.php">Update Profile</a>
      <p><a href="logout.php">Logout</a></p>
   </div>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="assets/js/profile.js"></script>
</body>
</html>
