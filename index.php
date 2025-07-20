<?php
require_once 'connection.php';
$conn->select_db('robot_arm');

// استعلام سحب البيانات من جدول poses
$result = $conn->query("SELECT * FROM poses");

// ترتيب النتائج كمصفوفة
$poses = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $poses[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Robot Arm Control Panel</title>
    <style>
        .slider { width: 300px; }
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 5px; }
        th, td { text-align: center; }
    </style>
</head>
<body>

<h2>Robot Arm Control Panel</h2>

<form method="post" action="save_pose.php" id="poseForm">
    <?php for ($i = 1; $i <= 6; $i++): ?>
        <label>Motor <?= $i ?>:</label>
        <input 
            type="range" 
            min="0" 
            max="180" 
            value="90" 
            name="motor<?= $i ?>" 
            class="slider" 
            id="motor<?= $i ?>" 
            oninput="document.getElementById('value<?= $i ?>').innerText = this.value"
        >
        <span id="value<?= $i ?>">90</span><br>
    <?php endfor; ?>

    <!-- input hidden لتحديث pose -->
    <input type="hidden" name="id" id="poseId">

    <br>
    <button type="submit" name="action" value="save">Save Pose</button>
    <button type="submit" formaction="run_pose.php">Run</button>
    <button type="reset" onclick="resetSliders()">Reset</button>
    <button type="submit" formaction="update_status.php" id="updateBtn" style="display: none;">Update Pose</button>
</form>

<hr>

<h3>Saved Poses</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Motor 1</th><th>Motor 2</th><th>Motor 3</th>
        <th>Motor 4</th><th>Motor 5</th><th>Motor 6</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($poses as $pose): ?>
        <tr>
            <td><?= $pose['id'] ?></td>
            <td><?= $pose['motor1'] ?></td>
            <td><?= $pose['motor2'] ?></td>
            <td><?= $pose['motor3'] ?></td>
            <td><?= $pose['motor4'] ?></td>
            <td><?= $pose['motor5'] ?></td>
            <td><?= $pose['motor6'] ?></td>
            <td>
                <form method="get" action="delete_pose.php" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $pose['id'] ?>">
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this pose?')">Remove</button>
                </form>
                <button type="button" onclick='loadPose(<?= json_encode($pose) ?>)'>Load</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
function loadPose(pose) {
    for (let i = 1; i <= 6; i++) {
        const slider = document.getElementById('motor' + i);
        const value = pose['motor' + i];
        slider.value = value;
        document.getElementById('value' + i).innerText = value;
    }

    // تخزين ID للـ Update
    document.getElementById('poseId').value = pose['id'];
    document.getElementById('updateBtn').style.display = 'inline';
}

function resetSliders() {
    for (let i = 1; i <= 6; i++) {
        const slider = document.getElementById('motor' + i);
        slider.value = 90;
        document.getElementById('value' + i).innerText = 90;
    }

    // إخفاء زر التحديث عند إعادة الضبط
    document.getElementById('poseId').value = '';
    document.getElementById('updateBtn').style.display = 'none';
}
</script>

</body>
</html>
