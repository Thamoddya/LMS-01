<?php
session_start();
include_once "../connection.php";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$address = $_POST['address'];

// Check if any of the fields are empty
if (empty($firstName) || empty($lastName) || empty($email) || empty($address)) {
  echo 'Fill All the Feilds';
  exit; // Stop further execution
}

// Prepare the update statement
$stmt = $pdo->prepare("UPDATE student SET firstName = ?, lastName = ?, email = ?, adress = ? WHERE mobile = ?");
$stmt->execute([$firstName, $lastName, $email, $address, $_SESSION['student']['mobile']]);

if ($stmt->rowCount() > 0) {
  echo 'success';
} else {
  echo 'error';
}
?>