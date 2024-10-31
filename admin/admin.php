<?php
require_once('config.php');
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Admin Dashboard</h1>
            </div>
            <nav class="mt-4">
                <a href="?page=dashboard" class="block py-2 px-4 hover:bg-gray-700">Dashboard</a>
                <a href="?page=articles" class="block py-2 px-4 hover:bg-gray-700">Artikel</a>
                <a href="?page=new_article" class="block py-2 px-4 hover:bg-gray-700">Tambah Artikel</a>
                <a href="../index.php" class="block py-2 px-4 hover:bg-gray-700">Kembali ke Blog</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <?php
            $page = $_GET['page'] ?? 'dashboard';

            switch($page) {
                case 'dashboard':
                    // Dashboard content
                    ?>
                    <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
                    <div class="grid grid-cols-3 gap-4">
                        <?php
                        // Total artikel keseluruhan
                        $stmt = $pdo->query("SELECT COUNT(*) as total FROM artikel");
                        $total = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
                
                        // Total artikel per kategori
                        $stmt_teknologi = $pdo->query("SELECT COUNT(*) as total_teknologi FROM artikel WHERE kategori = 'teknologi'");
                        $total_teknologi = $stmt_teknologi->fetch(PDO::FETCH_ASSOC)['total_teknologi'];
                
                        $stmt_lifestyle = $pdo->query("SELECT COUNT(*) as total_lifestyle FROM artikel WHERE kategori = 'lifestyle'");
                        $total_lifestyle = $stmt_lifestyle->fetch(PDO::FETCH_ASSOC)['total_lifestyle'];
                        ?>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h3 class="text-xl font-semibold">Total Artikel</h3>
                            <p class="text-3xl mt-2"><?php echo $total; ?></p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h3 class="text-xl font-semibold">Artikel Teknologi</h3>
                            <p class="text-3xl mt-2"><?php echo $total_teknologi; ?></p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h3 class="text-xl font-semibold">Artikel Lifestyle</h3>
                            <p class="text-3xl mt-2"><?php echo $total_lifestyle; ?></p>
                        </div>
                    </div>
                    <?php
                    break;
                

                    case 'articles':
                        // Articles list
                        ?>
                        <h2 class="text-2xl font-bold mb-4">Daftar Artikel</h2>
                        <div class="bg-white rounded-lg shadow overflow-x-auto">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="px-6 py-3 text-left">Judul</th>
                                        <th class="px-6 py-3 text-left">Kategori</th>
                                        <th class="px-6 py-3 text-left">Author</th>
                                        <th class="px-6 py-3 text-left">Tanggal</th>
                                        <th class="px-6 py-3 text-left">Gambar</th> <!-- Moved image header here -->
                                        <th class="px-6 py-3 text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stmt = $pdo->query("SELECT * FROM artikel ORDER BY tanggal_publikasi DESC");
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr class="border-t">
                                            <td class="px-6 py-4"><?php echo htmlspecialchars($row['judul']); ?></td>
                                            <td class="px-6 py-4"><?php echo htmlspecialchars($row['kategori']); ?></td>
                                            <td class="px-6 py-4"><?php echo htmlspecialchars($row['author']); ?></td>
                                            <td class="px-6 py-4"><?php echo htmlspecialchars($row['tanggal_publikasi']); ?></td>
                                            <td class="px-6 py-4">
                                                <?php if (!empty($row['gambar'])): ?>
                                                    <img src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="Image for <?php echo htmlspecialchars($row['judul']); ?>" class="h-16 w-16 object-cover">
                                                <?php else: ?>
                                                    <span class="text-gray-500">No Image</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="?page=edit_article&id=<?php echo $row['id']; ?>" class="text-blue-500 hover:underline">Edit</a>
                                                <a href="?page=delete_article&id=<?php echo $row['id']; ?>" class="text-red-500 hover:underline ml-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        break;
                    

                case 'new_article':
                    // New article form
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $judul = $_POST['judul'];
                        $isi = $_POST['isi'];
                        $kategori = $_POST['kategori'];
                        $author = $_POST['author'];
                        $tanggal = $_POST['tanggal'];
                        
                        $gambar = uploadImage($_FILES['gambar']);
                        if ($gambar) {
                            $stmt = $pdo->prepare("INSERT INTO artikel (judul, isi, kategori, author, tanggal_publikasi, gambar) VALUES (?, ?, ?, ?, ?, ?)");
                            $stmt->execute([$judul, $isi, $kategori, $author, $tanggal, $gambar]);
                            echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4'>Artikel berhasil ditambahkan!</div>";
                        }
                    }
                    ?>
                    <h2 class="text-2xl font-bold mb-4">Tambah Artikel Baru</h2>
                    <form method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="isi">Isi Artikel</label>
                            <textarea name="isi" id="isi" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="6"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="teknologi">Teknologi</option>
                                <option value="lifestyle">Lifestyle</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="author">Author</label>
                            <input type="text" name="author" id="author" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">Tanggal Publikasi</label>
                            <input type="date" name="tanggal" id="tanggal" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan Artikel</button>
                    </form>
                    <?php
                    break;

                case 'edit_article':
                    // Edit article
                    $id = $_GET['id'];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $judul = $_POST['judul'];
                        $isi = $_POST['isi'];
                        $kategori = $_POST['kategori'];
                        $author = $_POST['author'];
                        $tanggal = $_POST['tanggal'];
                        
                        if (!empty($_FILES['gambar']['name'])) {
                            $gambar = uploadImage($_FILES['gambar']);
                            if ($gambar) {
                                $stmt = $pdo->prepare("UPDATE artikel SET judul=?, isi=?, kategori=?, author=?, tanggal_publikasi=?, gambar=? WHERE id=?");
                                $stmt->execute([$judul, $isi, $kategori, $author, $tanggal, $gambar, $id]);
                            }
                        } else {
                            $stmt = $pdo->prepare("UPDATE artikel SET judul=?, isi=?, kategori=?, author=?, tanggal_publikasi=? WHERE id=?");
                            $stmt->execute([$judul, $isi, $kategori, $author, $tanggal, $id]);
                        }
                        echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4'>Artikel berhasil diupdate!</div>";
                    }

                    $stmt = $pdo->prepare("SELECT * FROM artikel WHERE id = ?");
                    $stmt->execute([$id]);
                    $artikel = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <h2 class="text-2xl font-bold mb-4">Edit Artikel</h2>
                    <form method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" value="<?php echo htmlspecialchars($artikel['judul']); ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="isi">Isi Artikel</label>
                            <textarea name="isi" id="isi" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="6"><?php echo htmlspecialchars($artikel['isi']); ?></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="teknologi" <?php echo $artikel['kategori'] === 'teknologi' ? 'selected' : ''; ?>>Teknologi</option>
                                <option value="lifestyle" <?php echo $artikel['kategori'] === 'lifestyle' ? 'selected' : ''; ?>>Lifestyle</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="author">Author</label>
                            <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($artikel['author']); ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">Tanggal Publikasi</label>
                            <input type="date" name="tanggal" id="tanggal" value="<?php echo $artikel['tanggal_publikasi']; ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="gambar">Gambar (Biarkan kosong jika tidak ingin mengubah)</label>
                            <input type="file" name="gambar" id="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <?php if ($artikel['gambar']): ?>
                            <div class="mt-2">
                                <p class="text-sm text-gray-600">Gambar saat ini:</p>
                                <img src="<?php echo htmlspecialchars($artikel['gambar']); ?>" alt="Current image" class="mt-1 h-32">
                            </div>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Artikel</button>
                    </form>
                    <?php
                    break;

                case 'delete_article':
                    // Delete article
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        
                        // Get image path before deleting
                        $stmt = $pdo->prepare("SELECT gambar FROM artikel WHERE id = ?");
                        $stmt->execute([$id]);
                        $artikel = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        // Delete the image file if it exists
                        if ($artikel['gambar'] && file_exists($artikel['gambar'])) {
                            unlink($artikel['gambar']);
                        }
                        
                        // Delete the article from database
                        $stmt = $pdo->prepare("DELETE FROM artikel WHERE id = ?");
                        $stmt->execute([$id]);
                        
                        header("Location: ?page=articles");
                        exit;
                    }
                    break;
            }
            ?>
        </div>
    </div>

    <script>
        // Add confirmation for delete actions
        document.querySelectorAll('a[href*="delete_article"]').forEach(link => {
            link.addEventListener('click', (e) => {
                if (!confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>