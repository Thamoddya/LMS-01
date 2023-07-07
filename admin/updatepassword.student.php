<?php
session_start();
include_once "../connection.php";

$password = $_POST['newPassword'];
$mobile = $_POST['mobile'];

// Prepare the update statement
$stmt = $pdo->prepare("UPDATE student SET password = ? WHERE mobile = ?");
$stmt->execute([$password, $mobile]);

if ($stmt->rowCount() > 0) {
  echo 'success';
} else {
  echo 'error';
}
?>