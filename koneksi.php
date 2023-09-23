<?php
$servername = "localhost";  // Change this to your server name
$username = "root";    // Change this to your username
$password = "";    // Change this to your password
$dbname = "smkds";      // Change this to your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";
