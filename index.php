<?php
require_once('admin/config.php');

// Get current page from URL
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$category = isset($_GET['category']) ? $_GET['category'] : null;

// Get articles
$articles = getRecentArticles($page, 5, $category);
$trending_articles = getTrendingArticles(5);

// Calculate total pages
$total_articles = getTotalArticles($category);
$total_pages = ceil($total_articles / 5);
?>


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
        <!--/nav-->
        <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <span class="fa fa-pencil-square-o"></span> Web Programming Blog</a>
                <!-- if logo is image enable this   
						<a class="navbar-brand" href="#index.html">
							<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
						</a> -->
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <span class="fa icon-expand fa-bars"></span>
                    <span class="fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown @@category__active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories <span class="fa fa-angle-down"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item @@cp__active" href="technology.php">Technology posts</a>
                                <a class="dropdown-item @@ls__active" href="lifestyle.php">Lifestyle posts</a>
                            </div>
                        </li>
                        <li class="nav-item @@contact__active">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item @@about__active">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin/admin.php">Dashboard Admin</a>
                        </li>
    </li>
                    </ul>

                    <!--/search-right-->
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
                        <!-- /search popup -->
                    </div>
                    <!--//search-right-->

                    <!-- author -->
                    <!-- <div class="header-author d-flex ml-lg-4 pl-2 mt-lg-0 mt-3">
                        <a class="img-circle img-circle-sm" href="#author">
                            <img src="assets/images/author.jpg" class="img-fluid" alt="...">
                        </a>
                        <div class="align-self ml-3">
                            <a href="#author">
                                <h5>Alexander</h5>
                            </a>
                            <span>Blog Writer</span>
                        </div>
                    </div> -->
                    <!-- // author-->
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

    <div class="w3l-homeblock1">
        <div class="container pt-lg-5 pt-md-4">
            <!-- block -->
            <div class="row">
            <div class="col-lg-9 most-recent">
    <h3 class="section-title-left">Most Recent Posts</h3>
    <div class="list-view">
        <?php foreach($articles as $article): ?>
        <div class="grids5-info img-block-mobile <?php echo ($article !== reset($articles)) ? 'mt-5' : ''; ?>">
            <div class="blog-info align-self">
                <span class="category"><?php echo ucfirst($article['kategori']); ?></span>
                <a href="article.php?id=<?php echo $article['id']; ?>" class="blog-desc mt-0">
                    <?php echo htmlspecialchars($article['judul']); ?>
                </a>
                <p><?php echo substr(strip_tags($article['isi']), 0, 150) . '...'; ?></p>
                <div class="author align-items-center mt-3 mb-1">
                    <a href="#author"><?php echo htmlspecialchars($article['author']); ?></a>
                </div>
                <ul class="blog-meta">
                    <li class="meta-item blog-lesson">
                        <span class="meta-value"><?php echo formatDate($article['tanggal_publikasi']); ?></span>
                    </li>
                    <li class="meta-item blog-students">
                        <span class="meta-value"><?php echo $article['view_count']; ?> reads</span>
                    </li>
                </ul>
            </div>
            <?php if(!empty($article['gambar'])): ?>
                        <a href="article.php?id=<?php echo $article['id']; ?>" class="d-block zoom mt-md-0 mt-3">
                            <img src="admin/<?php echo htmlspecialchars($article['gambar']); ?>" alt="<?php echo htmlspecialchars($article['judul']); ?>" class="img-fluid radius-image news-image">
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>

    <!-- Pagination -->
    <div class="pagination-wrapper mt-5">
        <ul class="page-pagination">
            <?php if($page > 1): ?>
            <li><a class="next" href="?page=<?php echo $page-1; ?>"><span class="fa fa-angle-left"></span></a></li>
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
            <li><a class="next" href="?page=<?php echo $page+1; ?>"><span class="fa fa-angle-right"></span></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<!-- Trending Section -->
<div class="col-lg-3 trending mt-lg-0 mt-5 mb-lg-5">
    <div class="pos-sticky">
        <h3 class="section-title-left">Trending</h3>
        <?php foreach($trending_articles as $index => $article): ?>
        <div class="grids5-info">
            <h4><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>.</h4>
            <div class="blog-info">
                <a href="article.php?id=<?php echo $article['id']; ?>" class="blog-desc1">
                    <?php echo htmlspecialchars($article['judul']); ?>
                </a>
                <div class="author align-items-center mt-2 mb-1">
                    <a href="#author"><?php echo htmlspecialchars($article['author']); ?></a>
                </div>
                <ul class="blog-meta">
                    <li class="meta-item blog-lesson">
                        <span class="meta-value"><?php echo formatDate($article['tanggal_publikasi']); ?></span>
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
            <!-- //block-->

            <!-- ad block -->
            <!-- <div class="ad-block text-center mt-5">
                <a href="#url"><img src="assets/images/ad.gif" class="img-fluid" alt="ad image" /></a>
            </div> -->
            <!-- //ad block -->

        </div>
    </div>
    <!-- footer -->
    <footer class="w3l-footer-16">
        <div class="footer-content py-lg-5 py-4 text-center">
            <div class="container">
                <div class="copy-right">
                    <h6>© 2024 Web Programming Blog . Made by <i>(your name)</i> with <span class="fa fa-heart" aria-hidden="true"></span><br>Designed by
                        <a href="https://w3layouts.com">W3layouts</a> </h6>
                </div>
                <ul class="author-icons mt-4">
                    <li><a class="facebook" href="#url"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                    </li>
                    <li><a class="twitter" href="#url"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                    <li><a class="google" href="#url"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                    </li>
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