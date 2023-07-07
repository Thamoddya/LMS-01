<?php
include_once "../../connection.php";

$studentMobile = $_POST['studentMobile'];

// Prepare the select statement
$stmt = $pdo->prepare("SELECT mobile FROM student WHERE mobile LIKE ?");
$stmt->execute([$studentMobile.'%']);

// Fetch the mobile numbers
$numbers = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Return the suggestions as JSON
echo json_encode($numbers);
?>