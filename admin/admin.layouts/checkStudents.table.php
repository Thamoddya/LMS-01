<?php

include_once "../../connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $batchID = $_POST['batchID'];

  $query = "SELECT * FROM student INNER JOIN batch ON batch.batchId = student.batch_batchId INNER JOIN attendingstatus ON attendingstatus.id = student.attendingStatus_id WHERE student.batch_batchId = :batchID";
  $statement = $pdo->prepare($query);
  $statement->bindParam(':batchID', $batchID);
  $statement->execute();

  $students = $statement->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($students);
}
?>
