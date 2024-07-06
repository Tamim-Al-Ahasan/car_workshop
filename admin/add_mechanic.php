<?php
include'../db.php';

$name = $_POST['name'];
$daily_limit = $_POST['daily_limit'];

$sql = "INSERT INTO mechanics (name, daily_limit) VALUES ('$name', '$daily_limit')";

if ($conn->query($sql) === TRUE) {
    echo "New mechanic added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: mechanics.php');
?>

