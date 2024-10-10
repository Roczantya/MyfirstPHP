<?php
// Sertakan kelas yang diperlukan
require_once 'Ebook.php';
require_once 'Printedbook.php';

session_start(); // Mulai sesi

// Inisialisasi array untuk menyimpan detail buku jika belum ada
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Title = $_POST['title'];
    $Author = $_POST['author'];
    $Publication_Year = $_POST['publicationYear'];
    $bookType = $_POST['bookType'];

    if ($bookType == 'ebook') {
        $fileSize = $_POST['fileSize'];
        $ebook = new Ebook($Title, $Author, $Publication_Year, $bookType, $fileSize); // Membuat objek EBook
        $bookDetails = $ebook->getDetails(); // Mengambil detail dari objek EBook
    } else {
        $numberOfPages = $_POST['numberofpages'];
        $printedBook = new Printedbook($Title, $Author, $Publication_Year, $bookType, $numberOfPages);
        $bookDetails = $printedBook->getDetails(); // Mengambil detail dari objek PrintedBook
    }

    // Simpan detail buku ke dalam array sesi
    $_SESSION['books'][] = [
        'title' => $Title,
        'author' => $Author,
        'publicationYear' => $Publication_Year,
        'bookType' => $bookType,
        'details' => $bookDetails
    ];

    echo "<pre>";
        print_r($_SESSION['books']);
    echo "</pre>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Informasi Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        .form-group {
            margin-bottom: 10px;
        }
        button {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .book {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #fff;
        }
    </style>
</head>
<body>

<h1>Input Informasi Buku</h1>
<form method="post" action="">
    <div class="form-group">
        <label for="title">Judul:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="author">Pengarang:</label>
        <input type="text" id="author" name="author" required>
    </div>
    <div class="form-group">
        <label for="publicationYear">Tahun Publikasi:</label>
        <input type="number" id="publicationYear" name="publicationYear" min="1500" max="2024" required>
    </div>
    <div class="form-group">
        <label for="bookType">Pilih Tipe Buku:</label>
        <select id="bookType" name="bookType" required>
            <option value="ebook">EBook</option>
            <option value="printed">Buku Cetak</option>
        </select>
    </div>
    <div class="form-group" id="ebookFields">
        <label for="fileSize">Ukuran File (MB):</label>
        <input type="number" id="fileSize" name="fileSize" step="0.1" required>
    </div>
    <div class="form-group" id="printedFields" style="display: none;">
        <label for="numberofpages">Jumlah Halaman:</label>
        <input type="number" id="numberofpages" name="numberofpages" required>
    </div>
    <button type="submit">Kirim</button>
</form>

<!-- Tampilkan detail buku yang disubmit -->
<?php if (!empty($_SESSION['books'])): ?>
    <h2>Detail Buku yang Disubmit:</h2>
    <?php foreach ($_SESSION['books'] as $book): ?>
        <div class="book">
            <h3><?php echo htmlspecialchars($book['title']); ?></h3>
            <p><strong>Pengarang:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
            <p><strong>Tahun Publikasi:</strong> <?php echo htmlspecialchars($book['publicationYear']); ?></p>
            <p><strong>Tipe:</strong> <?php echo htmlspecialchars($book['bookType']); ?></p>
            <p><strong>Detail:</strong> <?php echo nl2br(htmlspecialchars($book['details'])); ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


</body>
</html>
