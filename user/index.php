<?php
include '../db.php';

$mechanics = $conn->query("SELECT * FROM mechanics");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Car Workshop Appointment</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <h1>Book an Appointment</h1>
    <form action="submit_appointment.php" method="post">
        <label>Name:</label>
        <input type="text" name="client_name" required><br>
        <label>Phone:</label>
        <input type="text" name="phone" required><br>
        <label>Car Color:</label>
        <input type="text" name="car_color"><br>
        <label>Car License:</label>
        <input type="text" name="car_license"><br>
        <label>Car Engine Number:</label>
        <input type="text" name="car_engine"><br>
        <label>Appointment Date:</label>
        <input type="date" name="appointment_date" required><br>
        <label>Choose Mechanic:</label>
        <select name="mechanic_id">
            <?php while ($row = $mechanics->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
