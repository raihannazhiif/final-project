<?php
include 'config.php'; // Hubungkan ke database

// Periksa apakah parameter 'id' ada di URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Konversi ke integer untuk keamanan

    // Gunakan prepared statement untuk mengambil data berdasarkan ID
    $stmt = $conn->prepare("SELECT * FROM trips WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Ambil data perjalanan
    } else {
        echo "Perjalanan dengan ID ini tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak diberikan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Trip</title>
    <link rel="stylesheet" href="edit.css"> <!-- Optional: jika Anda menggunakan file CSS -->
</head>
<body>
    <h1>Edit Perjalanan</h1>
    <form action="update_trip.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" value="<?php echo htmlspecialchars($row['destination']); ?>" required>

        <label for="start-date">Start Date:</label>
        <input type="date" id="start-date" name="start_date" value="<?php echo htmlspecialchars($row['start_date']); ?>" required>

        <label for="end-date">End Date:</label>
        <input type="date" id="end-date" name="end_date" value="<?php echo htmlspecialchars($row['end_date']); ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($row['description']); ?></textarea>

        <button type="submit" onclick="">Update Trip</button>
    </form>
</body>
</html>
