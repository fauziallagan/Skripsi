<?php
require 'connection.php';

$sql2 = "SELECT DATE(timestamp) AS date
FROM coba
WHERE timestamp >= DATE_SUB((SELECT MAX(timestamp) FROM coba), INTERVAL 7 DAY) AND nama = 'Lora 0'
GROUP BY DATE(timestamp) 
ORDER BY date DESC
";

$result = $connection->query($sql2);

// Buat array kosong untuk menampung data
$data2 = array();

// Looping untuk mengambil data dari hasil query
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // Konversi nilai timestamp ke dalam format waktu dengan string H:i:s
    $waktu2 = date('Y-m-d', strtotime($row['date']));
    // Tambahkan nilai ke dalam array dengan format yang diinginkan
    $data2[] = "String('$waktu2')";
}

// Balik urutan array agar data terbaru berada di indeks pertama
$data2 = array_reverse($data2);

// Gabungkan array menjadi sebuah string dengan format yang diinginkan
$json_datawaktu = "[" . implode(",", $data2) . "]";

// Tampilkan data dalam format yang diinginkan
// echo $json_datawaktu;
?>
