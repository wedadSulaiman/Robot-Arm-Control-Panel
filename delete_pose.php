<?php
require_once 'connection.php';
$conn->select_db('robot_arm');

// تحقق من وجود ID في الرابط
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // حذف الـ pose بناءً على ID
    $stmt = $conn->prepare("DELETE FROM poses WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// الرجوع للصفحة الرئيسية
header("Location: index.php");
exit();
?>

