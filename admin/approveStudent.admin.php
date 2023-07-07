<?php
session_start();
include_once "../connection.php";

$mobile = $_POST['mobile'];

// Prepare the update statement
$stmt = $pdo->prepare("UPDATE student SET verifyed = '1' WHERE mobile = ?");
$stmt->execute([$mobile]);

if ($stmt->rowCount() > 0) {
  echo 'success';
} else {
  echo 'error';
}
?>