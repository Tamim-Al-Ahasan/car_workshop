<?php
include '../db.php';

$appointments = $conn->query("SELECT a.*, m.name as mechanic_name FROM appointments a JOIN mechanics m ON a.mechanic_id = m.id");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <h1>Appointments</h1>
    <table border="1">
        <tr>
            <th>Client Name</th>
            <th>Phone</th>
            <th>Car License</th>
            <th>Appointment Date</th>
            <th>Mechanic</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $appointments->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['client_name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['car_license']; ?></td>
            <td><?php echo $row['appointment_date']; ?></td>
            <td><?php echo $row['mechanic_name']; ?></td>
            <td>
                <form action="update_appointment.php" method="post">
                    <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                    <input type="date" name="new_date">
                    <select name="new_mechanic_id">
                        <?php
                        $mechanics = $conn->query("SELECT * FROM mechanics");
                        while ($mechanic = $mechanics->fetch_assoc()):
                        ?>
                        <option value="<?php echo $mechanic['id']; ?>"><?php echo $mechanic['name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
