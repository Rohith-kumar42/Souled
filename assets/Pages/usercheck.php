<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "games"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the username already exists in the database
$existingUsername = ""; // Initialize variable to store existing username
if (isset($_GET["username"])) {
    $inputUsername = $_GET["username"];
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        // Username exists in the database
        $existingUsername = $inputUsername;
    }
    $stmt->close();
}

// If the existing username is provided, use it. Otherwise, fetch the last entered username
if ($existingUsername == "") {
    // Prepare SQL statement to fetch the last entered username
    $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    // Check if there are any rows in the result
    if ($result->num_rows > 0) {
        // Output data of the last entered username
        $row = $result->fetch_assoc();
        $lastUsername = $row["username"];
    } else {
        // If no username found, set a default value
        $lastUsername = "No username found";
    }
} else {
    // Use the existing username
    $lastUsername = $existingUsername;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Entered Username</title>
</head>
<body>
    <h1>Hello, <?php echo htmlspecialchars($lastUsername); ?></h1>
</body>
</html>
