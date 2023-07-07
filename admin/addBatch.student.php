<?php
session_start();
include_once "../connection.php";

$batchId = $_POST['batchId'];
$mobile = $_POST['mobile'];

// Prepare the update statement
$stmt = $pdo->prepare("UPDATE student SET batch_batchId = ? WHERE mobile = ?");
$stmt->execute([$batchId, $mobile]);

if ($stmt->rowCount() > 0) {
  echo 'success';
} else {
  echo 'error';
}
?>