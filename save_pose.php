<?php
require_once 'connection.php';
$conn->select_db('robot_arm');

// استلام القيم من الفورم
$motor1 = $_POST['motor1'];
$motor2 = $_POST['motor2'];
$motor3 = $_POST['motor3'];
$motor4 = $_POST['motor4'];
$motor5 = $_POST['motor5'];
$motor6 = $_POST['motor6'];

// تحديد الإجراء
$action = $_POST['action'];

if ($action === "save") {
    // حفظ القيم كـ Pose جديد
    $stmt = $conn->prepare("INSERT INTO poses (motor1, motor2, motor3, motor4, motor5, motor6) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiii", $motor1, $motor2, $motor3, $motor4, $motor5, $motor6);
    $stmt->execute();
    header("Location: index.php");
    exit();
} elseif ($action === "run") {
    // تشغيل الحركة (عرض القيم فقط)
    echo "<h3>Running Pose:</h3>";
    echo "Motor1: $motor1<br>";
    echo "Motor2: $motor2<br>";
    echo "Motor3: $motor3<br>";
    echo "Motor4: $motor4<br>";
    echo "Motor5: $motor5<br>";
    echo "Motor6: $motor6<br>";
    echo "<br><a href='index.php'>Back</a>";
}
?>
