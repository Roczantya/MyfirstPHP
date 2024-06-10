<?php
// Menampilkan 10 baris text "Hello World"
for ($i = 1; $i <= 10; $i++) {
    echo "Hello World<br>";
}

echo "<br>"; // Untuk memisahkan output

// Menampilkan 10 baris text "Hello World", tapi setiap baris genap ditambah text "Hello World - [no baris]"
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        echo "Hello World - $i<br>";
    } else {
        echo "Hello World<br>";
    }
}

echo "<br>"; // Untuk memisahkan output

// Membuat array berisi nama bulan dari Januari hingga Desember, dan menampilkannya
$months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
foreach ($months as $month) {
    echo "$month<br>";
}

echo "<br>"; // Untuk memisahkan output

// Membuat array 2 dimensi dengan nama bulan dan hari libur nasional di bulan tersebut, dan menampilkannya
$holidays = [
    "Januari" => ["Tahun Baru"],
    "Februari" => ["Imlek"],
    "Maret" => ["Nyepi"],
    "April" => ["Paskah"],
    "Mei" => ["Hari Buruh", "Kenaikan Isa Almasih"],
    "Juni" => ["Hari Lahir Pancasila"],
    "Juli" => ["Idul Adha"],
    "Agustus" => ["Hari Kemerdekaan"],
    "September" => ["Tahun Baru Islam"],
    "Oktober" => ["Maulid Nabi"],
    "November" => ["Tidak ada hari libur nasional"],
    "Desember" => ["Hari Natal"]
];

foreach ($holidays as $month => $holiday) {
    echo "$month - " . implode(", ", $holiday) . "<br>";
}

echo "<br>"; // Untuk memisahkan output

// Membuat 4 functions untuk operasi aritmatika
function pengurangan($a, $b) {
    return $a - $b;
}

function perkalian($a, $b) {
    return $a * $b;
}

function pembagian($a, $b) {
    if ($b != 0) {
        return $a / $b;
    } else {
        return "Tidak bisa membagi dengan nol";
    }
}

function penjumlahan($a, $b) {
    return $a + $b;
}

// Memanggil function tersebut dengan contoh nilai
$a = 23;
$b = 2;

echo "Hasil pengurangan $a dan $b adalah " . pengurangan($a, $b) . "<br>";
echo "Hasil perkalian $a dan $b adalah " . perkalian($a, $b) . "<br>";
echo "Hasil pembagian $a dan $b adalah " . pembagian($a, $b) . "<br>";
echo "Hasil penjumlahan $a dan $b adalah " . penjumlahan($a, $b) . "<br>";
?>
