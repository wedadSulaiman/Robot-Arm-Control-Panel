<?php
require_once 'connection.php';
$conn->select_db('robot_arm');

// جلب آخر قيم التشغيل
$result = $conn->query("SELECT * FROM run_pose ORDER BY id DESC LIMIT 1");
$pose = $result && $result->num_rows > 0 ? $result->fetch_assoc() : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Current Running Pose</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            border-collapse: collapse;
            text-align: center;
        }
        table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Current Running Pose</h2>

    <?php if ($pose): ?>
        <table>
            <tr>
                <th>Motor 1</th>
                <th>Motor 2</th>
                <th>Motor 3</th>
                <th>Motor 4</th>
                <th>Motor 5</th>
                <th>Motor 6</th>
                <th>Timestamp</th>
            </tr>
            <tr>
                <td><?= $pose['motor1'] ?></td>
                <td><?= $pose['motor2'] ?></td>
                <td><?= $pose['motor3'] ?></td>
                <td><?= $pose['motor4'] ?></td>
                <td><?= $pose['motor5'] ?></td>
                <td><?= $pose['motor6'] ?></td>
                <td><?= $pose['created_at'] ?></td>
            </tr>
        </table>
    <?php else: ?>
        <p>No pose has been run yet.</p>
    <?php endif; ?>
</body>
</html>

