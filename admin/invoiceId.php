<?php


function generateUniqueNumericId()
{
    return str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
}

// Function to check if the generated ID already exists in the database
function isUniqueIdExists($pdo, $uniqueId)
{
    $query = "SELECT COUNT(*) FROM invoice WHERE invoiceId = :uniqueId";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':uniqueId', $uniqueId);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    return $count > 0;
}

try {

    include_once "../connection.php";

    $maxAttempts = 10; // Set a maximum number of attempts to generate a unique ID to avoid an infinite loop
    $attempts = 0;

    do {
        $uniqueId = generateUniqueNumericId();
        $attempts++;

        // Check if the generated ID already exists in the database
        $exists = isUniqueIdExists($pdo, $uniqueId);
    } while ($exists && $attempts < $maxAttempts);

    if (!$exists) {
        // If a unique ID is found
        echo $uniqueId;
    } else {
        // If the maximum attempts are reached and a unique ID still can't be found, return an error message
        echo "Error: Unable to generate a Invoice ID.";
    }
} catch (PDOException $e) {
    // Handle any database connection errors
    echo "Error: " . $e->getMessage();
}

