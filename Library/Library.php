<?php
$jsonFile = 'books.json';

if (file_exists($jsonFile)) {
    $books = json_decode(file_get_contents($jsonFile), true);
} else {
    $books = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
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
    </style>
</head>
<body>

    <h1>List of Books</h1>

    <?php if (empty($books)): ?>
        <p>No books have been added yet.</p>
    <?php else: ?>
        <?php foreach ($books as $book): ?>
            <div class="book">
                <h2><?php echo $book['title']; ?></h2>
                <p>Author: <?php echo $book['author']; ?></p>
                <p>Publication Year: <?php echo $book['publicationYear']; ?></p>
                <?php if ($book['bookType'] == 'ebook'): ?>
                    <p>File Size: <?php echo $book['fileSize']; ?> MB</p>
                <?php else: ?>
                    <p>Number of Pages: <?php echo $book['numberOfPages']; ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <a href="index.php">Add More Books</a>

</body>
</html>
