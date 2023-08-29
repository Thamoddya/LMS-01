<?php
session_start();
include_once "../connection.php";

$mobile = $_POST['mobile'];

// Prepare the update statement
$stmt = $pdo->prepare("INSERT INTO deletelog(deleteMObile,deletedDate) VALUES (?,NOW())");
$stmt->execute([$mobile]);

$stmt2=$pdo->prepare("UPDATE student SET verifyed = '3' WHERE mobile= ? ");
$stmt2->execute([$mobile]);

echo "success";

?>