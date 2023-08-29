<?php
include_once "../connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate the incoming data
    $studentMobile = filter_input(INPUT_POST, 'studentMobile');
    $invoiceMonth = filter_input(INPUT_POST, 'invoiceMonthId');
    $invoicePrice = filter_input(INPUT_POST, 'invoicePrice');
    $invoiceId = filter_input(INPUT_POST, 'invoiceId');

    if (empty($studentMobile) || empty($invoiceMonth) || empty($invoicePrice) || empty($invoiceId)) {
        exit("Invalid data");
    }
    $currentYear = date("Y");
    $stmt = $pdo->prepare("INSERT INTO invoice (invoiceId, payedDate, price, student_id, month_id, year_id) SELECT ?, NOW(), ?, student.id, ?, year.id FROM student CROSS JOIN `year` WHERE student.mobile = ? AND year.yearName = ?");
    if ($stmt->execute([$invoiceId, $invoicePrice, $invoiceMonth, $studentMobile, $currentYear])) {
        exit("success");
    } else {
        exit("Error adding invoice");
    }

}
?>