<?php
include '../db.php';

$mechanics = $conn->query("SELECT * FROM mechanics");

?>
<!DOCTYPE html>
<html>
head>
    <title>Mechanics</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <h1>Manage Mechanics</h1>
    <table border="1">
        <tr>
            <th>Mechanic Name</th>
            <th>Daily Limit</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $mechanics->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['daily_limit']; ?></td>
            <td>
                <form action="update_mechanic.php" method="post">
                    <input type="hidden" name="mechanic_id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="new_name" placeholder="New Name">
                    <input type="number" name="new_daily_limit" placeholder="New Daily Limit">
                    <button type="submit">Update</button>
                </form>
                <form action="delete_mechanic.php" method="post">
                    <input type="hidden" name="mechanic_id" value="<?php echo $row['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <h2>Add Mechanic</h2>
    <form action="add_mechanic.php" method="post">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Daily Limit:</label>
        <input type="number" name="daily_limit" required><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
