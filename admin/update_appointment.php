<?php
include '../db.php';

$appointment_id = $_POST['appointment_id'];
$new_date = $_POST['new_date'];
$new_mechanic_id = $_POST['new_mechanic_id'];

$sql = "UPDATE appointments SET appointment_date='$new_date', mechanic_id='$new_mechanic_id' WHERE id='$appointment_id'";

if ($conn->query($sql) === TRUE) {
    echo "Appointment updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: appointments.php');
?>
