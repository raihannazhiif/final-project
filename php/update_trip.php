<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $destination = $_POST['destination'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE trips SET destination = ?, start_date = ?, end_date = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $destination, $start_date, $end_date, $description, $id);

    if ($stmt->execute()) {
        echo "Trip updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
