<?php

include_once "../connection.php";
$studentMobile = $_POST['student_id'];

try {
    $getStudentID = $pdo->prepare("SELECT student.id FROM student WHERE mobile = ?");
    $getStudentID->execute([$studentMobile]);

    $studentRow = $getStudentID->fetch(PDO::FETCH_ASSOC);
    $studentId = $studentRow['id'];

    $query = "SELECT * FROM invoice INNER JOIN `year` ON `year`.id = invoice.year_id INNER JOIN student ON invoice.student_id = student.id INNER JOIN batch ON student.batch_batchId = batch.batchId INNER JOIN `month` ON `month`.id = invoice.month_id WHERE student_id = :studentId ORDER BY invoice.id DESC";

    $invoiceStatement = $pdo->prepare($query);
    $invoiceStatement->bindParam(':studentId', $studentId, PDO::PARAM_INT);
    $invoiceStatement->execute();

    $result = $invoiceStatement->fetchAll(PDO::FETCH_ASSOC);

    $html = '';

    foreach ($result as $invoice) {

        // Repeat other sections here...

    }

    echo json_encode($result);
} catch (PDOException $e) {
    echo "An error occurred: " . $e->getMessage();
}
?>