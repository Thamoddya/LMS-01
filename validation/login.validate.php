<?php
session_start();
include_once "../connection.php";

$studentMobile = $_POST['mobile'];
$studentPassword = $_POST['password'];

if (!empty($studentMobile) && !empty($studentPassword)) {
    // Prepare the select statement
    $stmt = $pdo->prepare("SELECT * FROM student INNER JOIN batch ON  student.batch_batchId = batch.batchId WHERE mobile = ? AND password = ?");
    $stmt->execute([$studentMobile, $studentPassword]);

    // Fetch the student record
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student) {
        // Authentication successful
        $_SESSION['student'] = $student;

        $response = array('status' => 'success');
        echo json_encode($response);
    } else {
        // Invalid login
        $response = array('status' => 'error');
        echo json_encode($response);
    }
} else {
    // Empty or invalid data
    $response = array('status' => 'Data Error');
    echo json_encode($response);
}
?>