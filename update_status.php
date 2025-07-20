<?php
require_once 'connection.php';
$conn->select_db('robot_arm');

// تأكد أن الطلب قادم من POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $motor1 = $_POST['motor1'];
    $motor2 = $_POST['motor2'];
    $motor3 = $_POST['motor3'];
    $motor4 = $_POST['motor4'];
    $motor5 = $_POST['motor5'];
    $motor6 = $_POST['motor6'];

    // تحديث البيانات في قاعدة البيانات
    $stmt = $conn->prepare("UPDATE poses SET motor1=?, motor2=?, motor3=?, motor4=?, motor5=?, motor6=? WHERE id=?");
    $stmt->bind_param("iiiiiii", $motor1, $motor2, $motor3, $motor4, $motor5, $motor6, $id);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating pose: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>

