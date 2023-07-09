<?php
include_once "../connection.php";

$subjectID = $_POST['subjectID'];
$unitName = $_POST['unitName'];
$unitGrade = $_POST['unitGrade'];
$unitText = $_POST['unitText'];

// Update the subject data using PDO
$updateStatement = $pdo->prepare("UPDATE subjecttitle SET titleName = ?, grade = ?, subjectText = ? WHERE id = ?");
$updateResult = $updateStatement->execute([$unitName, $unitGrade, $unitText, $subjectID]);

if ($updateResult) {
  echo "success";
} else {
  echo "error";
}
?>