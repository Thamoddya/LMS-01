<?php

include_once "../connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $batchID = $_POST['batchID'];

  $query = "UPDATE batch SET batchStatus='1' WHERE batchId = :id ";
  $statement = $pdo->prepare($query);
  $statement->bindParam(':id', $batchID);

  if ($statement->execute()) {
    echo 'success';
  } else {
    echo 'Failed to add batch';
  }
}
?>