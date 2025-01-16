<?php
// Menghubungkan file 'db.php' untuk mengakses koneksi database
include 'db.php';

// Operasi untuk mengambil semua data dari tabel 'barang'
$stmt = $pdo->query("SELECT * FROM barang");
$barang = $stmt->fetchAll();

// Operasi untuk menghapus data berdasarkan ID yang diterima melalui parameter URL 'delete'
if (isset($_GET['delete'])) {
    $id = $_GET['delete']; // Mendapatkan ID yang akan dihapus dari parameter URL
    $stmt = $pdo->prepare("DELETE FROM barang WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD BARANG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-bold mb-6">Data Barang</h1>

        <!-- Button untuk membuat list barang -->
        <a href="create.php" class="bg-green-500 hover:bg-green-700 transition duration-200 text-white py-2 px-4 rounded mb-6 inline-block">Tambah Barang</a>

        <!-- Daftar Barang -->
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border-b text-center">No</th>
                    <th class="py-2 px-4 border-b text-center">Nama Barang</th>
                    <th class="py-2 px-4 border-b text-center">Jumlah Stok</th>
                    <th class="py-2 px-4 border-b text-center">Harga Barang</th>
                    <th class="py-2 px-4 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang as $row): ?>
                    <tr>
                        <td class="py-2 px-4 border-b text-center"><?php echo $row['id']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $row['nama_barang']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $row['jumlah_stok']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo 'Rp ' . number_format($row['harga_barang'], 0, ',', '.'); ?></td>
                        <td class="py-2 px-4 border-b text-center">
                            <div class="flex justify-center gap-2">
                                <a href="view.php?id=<?php echo $row['id']; ?>" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-700 transition duration-200">View</a>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-700 transition duration-200">Update</a>
                                <a href="?delete=<?php echo $row['id']; ?>" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700 transition duration-200">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
