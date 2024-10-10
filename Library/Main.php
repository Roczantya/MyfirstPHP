<?php
// Include the necessary classes
require_once 'EBook.php';
require_once 'PrintedBook.php';

$bookDetails = "";
$books = []; // Array untuk menyimpan buku

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publicationYear = $_POST['publicationYear'];
    $bookType = $_POST['bookType'];

    if ($bookType == 'ebook') {
        $fileSize = $_POST['fileSize'];
        $ebook = new EBook($title, $author, $publicationYear, $fileSize);
        $bookDetails = $ebook->getDetails();
    } else {
        $numberOfPages = $_POST['numberOfPages'];
        $printedBook = new PrintedBook($title, $author, $publicationYear, $numberOfPages);
        $bookDetails = $printedBook->getDetails();
    }

    // Simpan detail buku ke file JSON
    $jsonFile = 'books.json';

    if (file_exists($jsonFile)) {
        $existingBooks = json_decode(file_get_contents($jsonFile), true);
    } else {
        $existingBooks = [];
    }

    $bookData = [
        'title' => $title,
        'author' => $author,
        'publicationYear' => $publicationYear,
        'bookType' => $bookType,
    ];

    if ($bookType == 'ebook') {
        $bookData['fileSize'] = $fileSize;
    } else {
        $bookData['numberOfPages'] = $numberOfPages;
    }

    $existingBooks[] = $bookData;
    file_put_contents($jsonFile, json_encode($existingBooks, JSON_PRETTY_PRINT));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }
        h1 {
            color: #333;
        }
        .book {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h1>Input Book Information</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="publicationYear">Publication Year:</label>
            <input type="number" id="publicationYear" name="publicationYear" min="2000" max="2100" required>
        </div>
        <div class="form-group">
            <label for="bookType">Select Book Type:</label>
            <select id="bookType" name="bookType" required>
                <option value="ebook">EBook</option>
                <option value="printed">Printed Book</option>
            </select>
        </div>
        <div class="form-group" id="ebookFields">
            <label for="fileSize">File Size (MB):</label>
            <input type="number" id="fileSize" name="fileSize" step="0.1" required>
        </div>
        <div class="form-group" id="printedFields" style="display: none;">
            <label for="numberOfPages">Number of Pages:</label>
            <input type="number" id="numberOfPages" name="numberOfPages" required>
        </div>
        <button type="submit">Submit</button>
    </form>

    <?php if ($bookDetails): ?>
        <div class="book">
            <h2>Book Details</h2>
            <p><?php echo $bookDetails; ?></p>
        </div>
    <?php endif; ?>

    <a href="books.php">View All Books</a>

    <script>
        // Show/hide fields based on book type selection
        document.getElementById('bookType').addEventListener('change', function () {
            if (this.value == 'ebook') {
                document.getElementById('ebookFields').style.display = 'block';
                document.getElementById('printedFields').style.display = 'none';
            } else {
                document.getElementById('ebookFields').style.display = 'none';
                document.getElementById('printedFields').style.display = 'block';
            }
        });
    </script>

</body>
</html>
