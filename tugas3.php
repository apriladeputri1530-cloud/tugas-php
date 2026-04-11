<?php
// array dengan tema berbeda
$pelajaran = ['pemrograman berbasis platform', 'machine learning', 'struktur data', 'sistem operasi'];

// cek apakah ini array
if(is_array($pelajaran)){
    echo "Data berhasil disimpan dalam array <br><br>";
}

// acak urutan data
shuffle($pelajaran);

// tampilkan hasil acak
echo "Data setelah diacak:<br>";
foreach($pelajaran as $p){
    echo "• $p <br>";
}

// ambil elemen terakhir
$ambil = end($pelajaran);

// ubah jadi huruf besar
$hurufBesar = strtoupper($ambil);

// ambil sebagian string dari tengah
$potong = substr($hurufBesar, 2, 5);

echo "<br>Data dipilih: $ambil <br>";
echo "Versi kapital: $hurufBesar <br>";
echo "Potongan tengah: $potong <br>";
?>