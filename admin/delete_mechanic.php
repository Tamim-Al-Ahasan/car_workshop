<?php
include '../db.php';

$mechanic_id = $_POST['mechanic_id'];

$sql = "DELETE FROM mechanics WHERE id='$mechanic_id'";

if ($conn->query($sql) === TRUE) {
    echo "Mechanic deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: mechanics.php');
?>
