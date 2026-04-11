<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "tugas_php");

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// query update
$id = 1;
$namaBaru = "April Ade Putri";

$query = "UPDATE mahasiswa SET nama='$namaBaru' WHERE id=$id";

if(mysqli_query($conn, $query)){
    echo "Data berhasil diupdate";
}else{
    echo "Gagal update data";
}
?>