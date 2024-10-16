<?php
// Sertakan kelas yang diperlukan
require_once 'Ebook.php';
require_once 'Printedbook.php';

session_start(); // Mulai sesi

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inisialisasi array untuk menyimpan detail buku jika belum ada
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['title'], $_POST['author'], $_POST['publicationYear'], $_POST['bookType'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publicationYear = $_POST['publicationYear'];
        $bookType = $_POST['bookType'];

        // Inisialisasi pesan kesalahan
        $errorMessage = '';

        // Cek tipe buku dan buat objek sesuai
        if ($bookType == 'EBook' && isset($_POST['fileSize'])) {
            $fileSize = $_POST['fileSize'];
            $ebook = new Ebook($title, $author, $publicationYear, $fileSize);
            $errorMessage = ob_get_clean(); // Ambil output buffer untuk pesan kesalahan

            // Tambahkan detail buku jika tidak ada kesalahan
            if (empty($errorMessage)) {
                $bookDetails = "<strong>Judul: </strong> $title\n<strong>Pengarang: </strong> $author\n<strong>Tahun Publikasi: </strong> $publicationYear\n<strong>Tipe: </strong> E-Book\n<strong>Ukuran File: </strong> $fileSize MB";
                $_SESSION['books'][] = ['Details' => nl2br($bookDetails)];
            }
        } elseif ($bookType == 'Printed Book' && isset($_POST['numberofpages'])) {
            $numberOfPages = $_POST['numberofpages'];
            $printedBook = new Printedbook($title, $author, $publicationYear, $numberOfPages);
            $errorMessage = ob_get_clean(); // Ambil output buffer untuk pesan kesalahan

            // Tambahkan detail buku jika tidak ada kesalahan
            if (empty($errorMessage)) {
                $bookDetails = "<strong>Judul: </strong> $title\n<strong>Pengarang: </strong> $author\n<strong>Tahun Publikasi: </strong> $publicationYear\n<strong>Tipe: </strong> Buku Cetak\n<strong>Jumlah Halaman: </strong> $numberOfPages";
                $_SESSION['books'][] = ['Details' => nl2br($bookDetails)];
            }
        } else {
            $errorMessage = "Details are missing.";
        }

        // Jika ada pesan kesalahan, tampilkan
        if (!empty($errorMessage)) {
            echo $errorMessage; // Tampilkan pesan kesalahan
        }
    } else {
        echo "Please fill all required fields.";
    }
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
        <input type="text" id="author" name="author" >
    </div>
    <div class="form-group">
        <label for="publicationYear">Tahun Publikasi:</label>
        <input type="number" id="publicationYear" name="publicationYear" min="1500" max="2024" required>
    </div>
    <div class="form-group">
        <label for="bookType">Pilih Tipe Buku:</label>
        <select id="bookType" name="bookType" required>
            <option value="EBook">E-Book</option>
            <option value="Printed Book">Buku Cetak</option>
        </select>
    </div>
    <div class="form-group" id="ebookFields">
        <label for="fileSize">Ukuran File (MB):</label>
        <input type="number" id="fileSize" name="fileSize" step="0.1" required>
    </div>
    <div class="form-group" id="printedFields" style="display: none;">
        <label for="numberofpages">Jumlah Halaman:</label>
        <input type="number" id="numberofpages" name="numberofpages">
    </div>
    <button type="submit">Kirim</button>
</form>

<!-- Tampilkan detail buku yang disubmit -->
<?php if (!empty($_SESSION['books'])): ?>
    <h2>Detail Buku yang Disubmit:</h2>
    <ul>
        <?php foreach ($_SESSION['books'] as $book): ?>
            <li class="book">
                <p><?php echo $book['Details']; ?></p> <!-- Menampilkan detail lengkap dengan label bold -->
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="post" action="">
        <button type="submit" name="clearSession">Hapus Semua Data</button>
    </form>
<?php endif; ?>

<?php
// Cek jika tombol "Hapus Semua Data" ditekan
if (isset($_POST['clearSession'])) {
    session_destroy(); // Hapus semua data sesi
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect ke halaman yang sama untuk menghindari pengulangan form
    exit; // Hentikan skrip setelah redirect
} ?>

<script>
    document.getElementById('bookType').addEventListener('change', function () {
        if (this.value === 'EBook') {
            document.getElementById('ebookFields').style.display = 'block';
            document.getElementById('printedFields').style.display = 'none';
            document.getElementById('numberofpages').value = ''; // Reset value if not used
            document.getElementById('numberofpages').removeAttribute('required'); // Remove required attribute
            document.getElementById('fileSize').setAttribute('required', 'required'); // Add required attribute
        } else {
            document.getElementById('ebookFields').style.display = 'none';
            document.getElementById('printedFields').style.display = 'block';
            document.getElementById('fileSize').value = ''; // Reset value if not used
            document.getElementById('fileSize').removeAttribute('required'); // Remove required attribute
            document.getElementById('numberofpages').setAttribute('required', 'required'); // Add required attribute
        }
    });
</script>

</body>
</html>
