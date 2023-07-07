<?php
session_start();
include_once "../connection.php";

$adminEmail = $_POST['email'];
$adminPassword = $_POST['password'];

if (!empty($adminEmail) && !empty($adminPassword)) {
    // Prepare the select statement

    try {
        $stmt = $pdo->prepare("SELECT * FROM admin  WHERE adminEmail = ? AND adminPassword = ?");
        $stmt->execute([$adminEmail, $adminPassword]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin) {
            // Authentication successful
            $_SESSION['admin'] = $admin;

            $response = array('status' => 'success');
            echo json_encode($response);
        } else {
            // Invalid login
            $response = array('status' => 'error');
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response = array('Message' => $e->getMessage());
        echo json_encode($response);
    }
    // Fetch the student record

} else {
    // Empty or invalid data
    $response = array('status' => 'Data Error');
    echo json_encode($response);
}
