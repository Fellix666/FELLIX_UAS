<?php
try {
    $host = 'localhost';
    $dbname = 'blog_db';
    $username = 'root';
    $password = '';
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    die();
}

// Fungsi untuk upload gambar
function uploadImage($file) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $target_file = $target_dir . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file is an image
    if(getimagesize($file["tmp_name"]) === false) {
        echo "File bukan gambar.";
        return false;
    }
    
    // Check file size (max 5MB)
    if ($file["size"] > 5000000) {
        echo "File terlalu besar.";
        return false;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
        return false;
    }
    
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        echo "Gagal mengupload file.";
        return false;
    }
}

function getRecentArticles($page = 1, $limit = 5, $category = null) {
    global $pdo;
    
    $offset = ($page - 1) * $limit;
    $where = "";
    if ($category) {
        $where = "WHERE kategori = :category";
    }
    
    $query = "SELECT * FROM artikel $where ORDER BY tanggal_publikasi DESC LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($query);
    
    if ($category) {
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    }
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get trending articles
function getTrendingArticles($limit = 5) {
    global $pdo;
    
    $query = "SELECT * FROM artikel ORDER BY view_count DESC LIMIT :limit";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get total articles count (for pagination)
function getTotalArticles($category = null) {
    global $pdo;
    
    $where = "";
    if ($category) {
        $where = "WHERE kategori = :category";
    }
    
    $query = "SELECT COUNT(*) as total FROM artikel $where";
    $stmt = $pdo->prepare($query);
    
    if ($category) {
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    }
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

// Function to increment view count
function incrementViewCount($article_id) {
    global $pdo;
    
    $query = "UPDATE artikel SET view_count = view_count + 1 WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $article_id, PDO::PARAM_INT);
    $stmt->execute();
}

// Function to format date
function formatDate($date) {
    return date('F d, Y', strtotime($date));
}
?>