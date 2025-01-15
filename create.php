<?php
include 'db.php';

// Operasi untuk membuat data barang baru
if (isset($_POST['create'])) {
    // Mendapatkan data yang dikirimkan melalui form input
    $nama_barang = $_POST['nama_barang'];
    $jumlah_stok = $_POST['jumlah_stok'];
    $harga_barang = $_POST['harga_barang'];

    $stmt = $pdo->prepare("INSERT INTO barang (nama_barang, jumlah_stok, harga_barang) VALUES (?, ?, ?)");
    $stmt->execute([$nama_barang, $jumlah_stok, $harga_barang]);
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-bold mb-6">Tambah Barang Baru</h1>

        <!-- Form Input Barang -->
        <form action="create.php" method="POST" class="bg-white p-6 rounded shadow-lg mb-6">
            <div class="mb-4">
                <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="jumlah_stok" class="block text-sm font-medium text-gray-700">Jumlah Stok</label>
                <input type="number" name="jumlah_stok" id="jumlah_stok" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="harga_barang" class="block text-sm font-medium text-gray-700">Harga Barang</label>
                <input type="text" name="harga_barang" id="harga_barang" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" name="create" class="bg-green-500 text-white py-2 px-4 rounded">Tambah Barang</button>
            </div>
        </form>

        <!-- Kembali ke Halaman Utama -->
        <a href="index.php" class="bg-blue-500 text-white py-2 px-4 rounded">Kembali ke Daftar Barang</a>
    </div>
</body>
</html>
