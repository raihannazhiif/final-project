<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Perjalanan Baru</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>

    <header>
        <h1>Tambah Perjalanan Baru</h1>
        <a href="list_trips.php">Kembali ke Daftar Perjalanan</a>
    </header>

    <section class="trip-form">
        <form action="save_trip.php" method="POST">
            <label for="destination">Tujuan:</label>
            <input type="text" id="destination" name="destination" required>

            <label for="start_date">Tanggal Mulai:</label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">Tanggal Selesai:</label>
            <input type="date" id="end_date" name="end_date" required>

            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <button type="submit">Simpan Perjalanan</button>
        </form>
    </section>

</body>
</html>
