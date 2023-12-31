<?php

$servername = "127.0.0.1";
$username = "root";
$password = "1234";
$dbname = "usersdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $phoneno = test_input($_POST["phoneno"]);
    $password = test_input($_POST["password"]);
    $location = test_input($_POST["location"]);

    // Insert data into the users table
    $sql = "INSERT INTO users (username, email, phoneno, password, location)
            VALUES ('$username', '$email', '$phoneno', '$password', '$location')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
