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

// حذف القيم القديمة (اختياري)
$conn->query("DELETE FROM run_pose");

// إضافة القيم الجديدة
$stmt = $conn->prepare("INSERT INTO run_pose (motor1, motor2, motor3, motor4, motor5, motor6) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iiiiii", $motor1, $motor2, $motor3, $motor4, $motor5, $motor6);
$stmt->execute();

// الرجوع للصفحة الرئيسية
header("Location: index.php");
exit();
?>
