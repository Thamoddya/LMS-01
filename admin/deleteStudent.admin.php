<?php
session_start();
include_once "../connection.php";

$mobile = $_POST['mobile'];

// Prepare the update statement
$stmt = $pdo->prepare("INSERT INTO deletelog(deleteMObile,deletedDate) VALUES (?,NOW())");
$stmt->execute([$mobile]);

$stmt2=$pdo->prepare("DELETE FROM student WHERE mobile= ? ");
$stmt2->execute([$mobile]);

echo "success";

?>