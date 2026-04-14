<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "tugas_php");

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$message = "";
$data = null;

// jika form disubmit
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $namaBaru = $_POST['nama'];

    // cek data dulu
    $cek = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
    $data = mysqli_fetch_assoc($cek);

    if (!$data) {
        $message = "❌ Data dengan ID $id tidak ditemukan";
    } else {
        // query update
        $query = "UPDATE mahasiswa SET nama='$namaBaru' WHERE id=$id";

        if (mysqli_query($conn, $query)) {
            $message = "✅ Data berhasil diupdate";

            // ambil data terbaru
            $cek = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
            $data = mysqli_fetch_assoc($cek);
        } else {
            $message = "❌ Gagal update data";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Mahasiswa</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            text-align: center;
        }

        .box {
            background: white;
            padding: 20px;
            width: 300px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input {
            width: 90%;
            padding: 8px;
            margin: 5px 0;
        }

        button {
            padding: 8px 15px;
            background: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background: blue;
            color: white;
        }

        .msg {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Update Data Mahasiswa</h2>

    <form method="POST">
        <input type="number" name="id" placeholder="Masukkan ID" required><br>
        <input type="text" name="nama" placeholder="Nama Baru" required><br>

        <button type="submit" name="update">Update</button>
    </form>

    <!-- pesan -->
    <?php if ($message != ""): ?>
        <p class="msg"><?= $message ?></p>
    <?php endif; ?>
</div>

<!-- tampil data -->
<?php if ($data): ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
    </tr>
    <tr>
        <td><?= $data['id']; ?></td>
        <td><?= $data['nama']; ?></td>
    </tr>
</table>
<?php endif; ?>

</body>
</html>