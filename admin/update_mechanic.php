<?php
include '../db.php';

$mechanic_id = $_POST['mechanic_id'];
$new_name = $_POST['new_name'];
$new_daily_limit = $_POST['new_daily_limit'];

$sql = "UPDATE mechanics SET name='$new_name', daily_limit='$new_daily_limit' WHERE id='$mechanic_id'";

if ($conn->query($sql) === TRUE) {
    echo "Mechanic updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: mechanics.php');
?>
