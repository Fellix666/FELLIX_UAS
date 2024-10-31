<?php
require_once('admin/config.php');

// Get current page from URL
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Function to get lifestyle articles
function getLifestyleArticles($page = 1, $limit = 5) {
    global $pdo;
    
    $offset = ($page - 1) * $limit;
    $category = 'lifestyle';
    
    $query = "SELECT * FROM artikel WHERE kategori = :category ORDER BY tanggal_publikasi DESC LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($query);
    
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get trending lifestyle articles
function getTrendingLifestyleArticles($limit = 4) {
    global $pdo;
    
    $category = 'lifestyle';
    $query = "SELECT * FROM artikel WHERE kategori = :category ORDER BY view_count DESC LIMIT :limit";
    $stmt = $pdo->prepare($query);
    
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get total lifestyle articles count
function getTotalLifestyleArticles() {
    global $pdo;
    
    $category = 'lifestyle';
    $query = "SELECT COUNT(*) as total FROM artikel WHERE kategori = :category";
    $stmt = $pdo->prepare($query);
    
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

// Get articles and calculate pagination
$articles = getLifestyleArticles($page, 6);
$trending_articles = getTrendingLifestyleArticles(4);
$total_articles = getTotalLifestyleArticles();
$total_pages = ceil($total_articles / 5);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Web Programming - Final Semester Exam</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
  </head>
  <body>
<!-- header -->
<header class="w3l-header">
    <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <span class="fa fa-pencil-square-o"></span> Web Programming Blog</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="fa icon-expand fa-bars"></span>
                <span class="fa icon-close fa-times"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories <span class="fa fa-angle-down"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="technology.php">Technology posts</a>
                            <a class="dropdown-item active" href="lifestyle.php">Lifestyle posts</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>

                <div class="search-right mt-lg-0 mt-2">
                    <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
                    <!-- search popup -->
                    <div id="search" class="pop-overlay">
                        <div class="popup">
                            <h3 class="hny-title two">Search here</h3>
                            <form action="#" method="Get" class="search-box">
                                <input type="search" placeholder="Search for blog posts" name="search"
                                    required="required" autofocus="">
                                <button type="submit" class="btn">Search</button>
                            </form>
                            <a class="close" href="#close">×</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
		</div>
	</nav>
	<!--//nav-->
</header>
<!-- //header -->

<nav id="breadcrumbs" class="breadcrumbs">
    <div class="container page-wrapper">
        <a href="index.php">Home</a> / Categories / <span class="breadcrumb_last" aria-current="page">Lifestyle</span>
    </div>
</nav>

<div class="w3l-searchblock w3l-homeblock1 py-5">
    <div class="container py-lg-4 py-md-3">
        <!-- block -->
        <div class="row">
            <div class="col-lg-8 most-recent">
                <h3 class="section-title-left">Lifestyle Posts</h3>
                
                <?php if(!empty($articles)): ?>
                <div class="row">
                    <?php foreach($articles as $article): ?>
                    <div class="col-lg-6 col-md-6 item">
                        <div class="card">
                            <?php if(!empty($article['gambar'])): ?>
                            <div class="card-header p-0 position-relative">
                                <a href="article.php?id=<?php echo $article['id']; ?>">
                                    <img class="card-img-bottom d-block radius-image" src="admin/<?php echo htmlspecialchars($article['gambar']); ?>" 
                                        alt="<?php echo htmlspecialchars($article['judul']); ?>">
                                </a>
                            </div>
                            <?php endif; ?>
                            <div class="card-body p-0 blog-details">
                                <a href="article.php?id=<?php echo $article['id']; ?>" class="blog-desc">
                                    <?php echo htmlspecialchars($article['judul']); ?>
                                </a>
                                <p><?php echo substr(strip_tags($article['isi']), 0, 150) . '...'; ?></p>
                                <div class="author align-items-center mt-3 mb-1">
                                    <a href="#author"><?php echo htmlspecialchars($article['author']); ?></a> in <a href="#url">Lifestyle</a>
                                </div>
                                <ul class="blog-meta">
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value"><?php echo date('F j, Y', strtotime($article['tanggal_publikasi'])); ?></span>
                                    </li>
                                    <li class="meta-item blog-students">
                                        <span class="meta-value"><?php echo $article['view_count']; ?> reads</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                    <p>No lifestyle articles found.</p>
                <?php endif; ?>

                <!-- Pagination -->
                <div class="pagination-wrapper mt-5">
                    <ul class="page-pagination">
                        <?php if($page > 1): ?>
                        <li><a class="next" href="?page=<?php echo $page-1; ?>">
                            <span class="fa fa-angle-left"></span></a>
                        </li>
                        <?php endif; ?>
                        
                        <?php for($i = 1; $i <= $total_pages; $i++): ?>
                        <li>
                            <?php if($i == $page): ?>
                            <span aria-current="page" class="page-numbers current"><?php echo $i; ?></span>
                            <?php else: ?>
                            <a class="page-numbers" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            <?php endif; ?>
                        </li>
                        <?php endfor; ?>
                        
                        <?php if($page < $total_pages): ?>
                        <li><a class="next" href="?page=<?php echo $page+1; ?>">
                            <span class="fa fa-angle-right"></span></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <!-- Trending Section -->
            <div class="col-lg-4 trending mt-lg-0 mt-5">
                <div class="pos-sticky">
                    <h3 class="section-title-left">Trending in Lifestyle</h3>
                    <?php foreach($trending_articles as $index => $article): ?>
                    <div class="grids5-info">
                        <h4><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>.</h4>
                        <div class="blog-info">
                            <a href="article.php?id=<?php echo $article['id']; ?>" class="blog-desc1">
                                <?php echo htmlspecialchars($article['judul']); ?>
                            </a>
                            <div class="author align-items-center mt-2 mb-1">
                                <a href="#author"><?php echo htmlspecialchars($article['author']); ?></a> in <a href="#url">Lifestyle</a>
                            </div>
                            <ul class="blog-meta">
                                <li class="meta-item blog-lesson">
                                    <span class="meta-value"><?php echo date('F j, Y', strtotime($article['tanggal_publikasi'])); ?></span>
                                </li>
                                <li class="meta-item blog-students">
                                    <span class="meta-value"><?php echo $article['view_count']; ?> reads</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<footer class="w3l-footer-16">
  <div class="footer-content py-lg-5 py-4 text-center">
    <div class="container">
      <div class="copy-right">
        <h6>© 2020 Design Blog . Made with <span class="fa fa-heart" aria-hidden="true"></span>, Designed by <a
            href="https://w3layouts.com">W3layouts</a> </h6>
      </div>
      <ul class="author-icons mt-4">
        <li><a class="facebook" href="#url"><span class="fa fa-facebook" aria-hidden="true"></span></a> </li>
        <li><a class="twitter" href="#url"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
        <li><a class="google" href="#url"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>
        <li><a class="linkedin" href="#url"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
        <li><a class="github" href="#url"><span class="fa fa-github" aria-hidden="true"></span></a></li>
        <li><a class="dribbble" href="#url"><span class="fa fa-dribbble" aria-hidden="true"></span></a></li>
      </ul>
      <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-angle-up"></span>
      </button>
    </div>
  </div>

  <!-- move top -->
  <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
      } else {
        document.getElementById("movetop").style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <!-- //move top -->
</footer>
<!-- //footer -->

<!-- Template JavaScript -->
<script src="assets/js/theme-change.js"></script>

<script src="assets/js/jquery-3.3.1.min.js"></script>

<!-- disable body scroll which navbar is in active -->
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll which navbar is in active -->

<script src="assets/js/bootstrap.min.js"></script>

</body>

</html>