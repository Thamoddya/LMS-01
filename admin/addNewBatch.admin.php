<?php

include_once "../connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $city = $_POST['city'];
  $grade = $_POST['grade'];

  if (empty($name) || empty($city)) {
    echo 'Please complete all data';
    exit;
  }

  $query = "INSERT INTO batch (batchName, city_cityId, grade) VALUES (:name, :city, :grade)";
  $statement = $pdo->prepare($query);
  $statement->bindParam(':name', $name);
  $statement->bindParam(':city', $city);
  $statement->bindParam(':grade', $grade);

  if ($statement->execute()) {
    echo 'success';
  } else {
    echo 'Failed to add batch';
  }
}
?>
