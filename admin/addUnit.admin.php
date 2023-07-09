<?php
include_once "../connection.php";

$subjectID = $_POST['subjectID'];
$unitName = $_POST['unitName'];
$unitGrade = $_POST['unitGrade'];
$unitText = $_POST['unitText'];

// Update the subject data using PDO
$updateStatement = $pdo->prepare("INSERT INTO subjecttitle(titleName,grade,subjectText) VALUES (?,?,?)");
$updateResult = $updateStatement->execute([$unitName, $unitGrade, $unitText]);

if ($updateResult) {
  echo "success";
} else {
  echo "error";
}
?>