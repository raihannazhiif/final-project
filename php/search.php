<?php
include 'config.php'; // Koneksi ke database

// Cek apakah form pencarian disubmit
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm']; // Ambil kata kunci pencarian
    $sql = "SELECT * FROM trips WHERE destination LIKE ? OR description LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $searchTerm . "%";  // Menambahkan wildcard (%) untuk pencarian sebagian
    $stmt->bind_param("ss", $searchTerm, $searchTerm); // Bind parameter ke query

    $stmt->execute();
    $result = $stmt->get_result(); // Ambil hasil pencarian
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Perjalanan</title>
    <link rel="stylesheet" href="sr.css">
</head>
<body>
    <header>
        <h1>Daftar Perjalanan yang Ditemukan</h1>
        <a href="list_trips.php">Kembali ke Daftar Perjalanan</a>
    </header>

    <section class="search-form">
        <form action="search.php" method="POST">
            <input type="text" name="searchTerm" placeholder="Cari perjalanan berdasarkan tujuan atau deskripsi..." required>
            <button type="submit" name="search">Cari</button>
        </form>
    </section>

    <section class="trip-list">
        <?php
        // Tampilkan hasil pencarian jika ada
        if (isset($result) && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='trip'>";
                echo "<h3>" . htmlspecialchars($row['destination']) . "</h3>";
                echo "<p>Mulai: " . htmlspecialchars($row['start_date']) . "</p>";
                echo "<p>Selesai: " . htmlspecialchars($row['end_date']) . "</p>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                echo "<a href='edit_trip.php?id=" . $row['id'] . "'>Edit</a> | ";
                echo "<a href='delete_trip.php?id=" . $row['id'] . "'>Hapus</a>";
                echo "</div>";
            }
        } else {
            echo "<p>Tidak ada perjalanan yang ditemukan. Coba pencarian lainnya!</p>";
        }

        // Menutup koneksi
        $conn->close();
        ?>
    </section>
</body>
</html>
