<?php
include '../db.php';

$client_name = $_POST['client_name'];
$phone = $_POST['phone'];
$car_color = $_POST['car_color'];
$car_license = $_POST['car_license'];
$car_engine = $_POST['car_engine'];
$appointment_date = $_POST['appointment_date'];
$mechanic_id = $_POST['mechanic_id'];

$check = $conn->query("SELECT * FROM appointments WHERE phone='$phone' AND appointment_date='$appointment_date'");
if ($check->num_rows > 0) {
    echo "You already have an appointment on this date.";
    exit;
}

$mechanic_appointments = $conn->query("SELECT * FROM appointments WHERE mechanic_id='$mechanic_id' AND appointment_date='$appointment_date'");
$mechanic_limit = $conn->query("SELECT daily_limit FROM mechanics WHERE id='$mechanic_id'")->fetch_assoc()['daily_limit'];

if ($mechanic_appointments->num_rows >= $mechanic_limit) {
    echo "The mechanic is fully booked on this date.";
    exit;
}

$sql = "INSERT INTO appointments (client_name, phone, car_color, car_license, car_engine, appointment_date, mechanic_id)
VALUES ('$client_name', '$phone', '$car_color', '$car_license', '$car_engine', '$appointment_date', '$mechanic_id')";

if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
