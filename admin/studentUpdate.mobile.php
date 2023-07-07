<?php
session_start();
include_once "../connection.php";

$mobile = $_POST['mobile'];
$studentNo = $_POST['studentNo'];

// Prepare the update statement
$stmt = $pdo->prepare("UPDATE student SET mobile = ? WHERE id = ?");
$stmt->execute([$mobile,$studentNo ]);

if ($stmt->rowCount() > 0) {
  echo 'success';
} else {
  echo 'error';
}
?>