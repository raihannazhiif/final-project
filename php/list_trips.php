<?php
include 'config.php';  // Pastikan file config.php ada dan benar

$sql = "SELECT * FROM trips";
$result = $conn->query($sql);  // Query untuk mengambil semua data perjalanan

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Planner - Daftar Perjalanan</title>
    <link rel="stylesheet" href="lis.css">
</head>
<body>
    <header>
        <h1>Daftar Perjalanan</h1>
        <a href="add_trip.php" class="add-btn">Tambah Perjalanan Baru</a>
    </header>

    <section class="trip-list">
        <h2>Perjalanan yang Direncanakan</h2>

        <a href="search.php">Search</a>

        <div class="trips-container">
            <?php
            if ($result->num_rows > 0) {
                // Loop untuk menampilkan perjalanan
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='trip-card'>";
                    echo "<h3>" . htmlspecialchars($row['destination']) . "</h3>";
                    echo "<p><strong>Mulai:</strong> " . htmlspecialchars($row['start_date']) . " <strong>Hingga:</strong> " . htmlspecialchars($row['end_date']) . "</p>";
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                    echo "<div class='actions'>";
                    echo "<a href='edit_trip.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>";
                    echo "<a href='delete_trip.php?id=" . $row['id'] . "' class='btn btn-delete'>Hapus</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>Tidak ada perjalanan yang direncanakan. Tambahkan perjalanan baru!</p>";
            }
            $conn->close();  // Tutup koneksi ke database
            ?>
        
        </div>
       
    </section>
</body>
</html>
