<?php
include 'db.php';

// Mengambil detail barang berdasarkan ID yang diberikan 
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Mendapatkan ID barang yang dipilih dari parameter URL
    $stmt = $pdo->prepare("SELECT * FROM barang WHERE id = ?");
    $stmt->execute([$id]);
    $barang = $stmt->fetch();
} else {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-bold mb-6 text-center">Detail Barang</h1>

        <div class="bg-white p-8 rounded-lg shadow-md mb-6 max-w-lg mx-auto border border-gray-200">
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">No:</span>
                    <span class="text-gray-900"><?php echo $barang['id']; ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">Nama Barang:</span>
                    <span class="text-gray-900"><?php echo $barang['nama_barang']; ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">Jumlah Stok:</span>
                    <span class="text-gray-900"><?php echo $barang['jumlah_stok']; ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">Harga Barang:</span>
                    <span class="text-gray-900"><?php echo 'Rp ' . number_format($barang['harga_barang'], 0, ',', '.'); ?></span>
                </div>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="text-center mt-6">
            <a href="index.php" class="bg-blue-500 hover:bg-blue-700 text-white text-center py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                Kembali ke Daftar Barang
            </a>
        </div>

    </div>
</body>
</html>
