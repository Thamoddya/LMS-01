<?php
include_once "../connection.php";

// Check if the 'subjectID' key exists in the $_POST array
if (isset($_POST['subjectID'])) {
  $subjectID = $_POST['subjectID'];

  $getSubjectData = $pdo->prepare("SELECT * FROM subjecttitle WHERE id = ?");
  $getSubjectData->execute([$subjectID]);
  $SubjectData = $getSubjectData->fetchAll(PDO::FETCH_ASSOC); 

  // Return the subject data as JSON
  echo json_encode($SubjectData);
} else {
  // Handle the case when 'subjectID' key is not present
  echo json_encode(['error' => 'Missing subjectID']);
}
?>
