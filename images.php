<?php
require_once('config.php');

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
        echo "<div class='alert alert-success'>Artikel berhasil ditambahkan!</div>";
    }
}

function uploadImage($file) {
    if ($file['name']) {
        $target_dir = "assets/images/";
        $target_file = $target_dir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            return false;
        }
    }
    return false;
}