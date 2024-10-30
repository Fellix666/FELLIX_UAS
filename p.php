ini dasbror baru

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Artikel Management</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="assets/css/style-starter.css" />

    <link
      href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- header -->
    <header class="w3l-header">
      <!--/nav-->
      <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <span class="fa fa-pencil-square-o"></span> Web Programming Blog
          </a>

          <button
            class="navbar-toggler collapsed"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="fa icon-expand fa-bars"></span>
            <span class="fa icon-close fa-times"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown @@category__active">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  Categories <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item @@cp__active" href="technology.php"
                    >Technology posts</a
                  >
                  <a class="dropdown-item @@ls__active" href="lifestyle.php"
                    >Lifestyle posts</a
                  >
                </div>
              </li>
              <li class="nav-item @@contact__active">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>
              <li class="nav-item @@about__active">
                <a class="nav-link" href="about.html">About</a>
              </li>
            </ul>

            <!-- search-right -->
            <div class="search-right mt-lg-0 mt-2">
              <a href="#search" title="search"
                ><span class="fa fa-search" aria-hidden="true"></span
              ></a>
              <div id="search" class="pop-overlay">
                <div class="popup">
                  <h3 class="hny-title two">Search here</h3>
                  <form action="#" method="Get" class="search-box">
                    <input
                      type="search"
                      placeholder="Search for blog posts"
                      name="search"
                      required="required"
                      autofocus=""
                    />
                    <button type="submit" class="btn">Search</button>
                  </form>
                  <a class="close" href="#close">×</a>
                </div>
              </div>
            </div>
            <!-- //search-right -->

            <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
              <nav class="navigation">
                <div class="theme-switch-wrapper">
                  <label class="theme-switch" for="checkbox">
                    <input type="checkbox" id="checkbox" />
                    <div class="mode-container">
                      <i class="gg-sun"></i>
                      <i class="gg-moon"></i>
                    </div>
                  </label>
                </div>
              </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->

            <!-- Dashboard icon -->
            <a href="dashboard.html" class="ml-3" title="Dashboard">
              <span class="fa fa-user-circle fa-lg"></span>
            </a>
          </div>
        </div>
      </nav>

      <!--//nav-->
    </header>
    <!-- //header -->

    <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Artikel</h2>
        <button
          type="button"
          class="btn btn-primary"
          data-toggle="modal"
          data-target="#addArticleModal"
        >
          Tambah Artikel
        </button>
      </div>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Isi</th>
            <th>Kategori</th>
            <th>Author</th>
            <th>Tanggal Publikasi</th>
            <th>Image</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="articleTable">
          <!-- Rows will be loaded here via AJAX -->
          <tr>
            <td>Judul Artikel 1</td>
            <td>Isi Artikel 1</td>
            <td>Kategori 1</td>
            <td>Author 1</td>
            <td>2022-01-01</td>
            <td><?= $row['gambar']; ?></td>
            <td>
              <button class="btn btn-success edit-btn" onclick="editArticle(1)">
                Edit
              </button>
              <button class="btn btn-danger btn-sm" onclick="deleteArticle(1)">
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Add Artikel Modal -->
    <div
      class="modal fade"
      id="addArticleModal"
      tabindex="-1"
      aria-labelledby="addArticleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addArticleModalLabel">
              Tambah Artikel
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form
              id="addForm"
              method="POST"
              action="crud.php"
              enctype="multipart/form-data"
            >
              <input type="hidden" name="action" value="create" />
              <div class="form-group">
                <label for="judul">Judul Artikel:</label>
                <input
                  type="text"
                  class="form-control"
                  id="judul"
                  name="judul"
                  required
                />
              </div>
              <div class="form-group">
                <label for="isi">Isi Artikel:</label>
                <textarea
                  class="form-control"
                  id="isi"
                  name="isi"
                  required
                ></textarea>
              </div>
              <div class="form-group">
                <label for="kategori">Kategori:</label>
                <select
                  class="form-control"
                  id="kategori"
                  name="kategori"
                  required
                >
                  <option value="Technology">Technology</option>
                  <option value="Lifestyle">Lifestyle</option>
                </select>
              </div>
              <div class="form-group">
                <label for="author">Author:</label>
                <input
                  type="text"
                  class="form-control"
                  id="author"
                  name="author"
                  required
                />
              </div>
              <div class="form-group">
                <label for="tanggal_publikasi">Tanggal Publikasi:</label>
                <input
                  type="date"
                  class="form-control"
                  id="tanggal_publikasi"
                  name="tanggal_publikasi"
                  required
                />
              </div>
              <div class="form-group">
                <label for="gambar">Upload Gambar:</label>
                <input
                  type="file"
                  class="form-control"
                  id="gambar"
                  name="gambar"
                  accept="image/jpeg"
                  required
                />
              </div>
              <button type="submit" class="btn btn-primary">
                Simpan Artikel
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Artikel Modal -->
    <div
      class="modal fade"
      id="editArticleModal"
      tabindex="-1"
      aria-labelledby="editArticleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editArticleModalLabel">Edit Artikel</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form
              id="editForm"
              method="POST"
              action="crud.php"
              enctype="multipart/form-data"
            >
              <input type="hidden" name="action" value="update" />
              <input type="hidden" id="edit_id" name="id" />
              <div class="form-group">
                <label for="edit_judul">Judul Artikel:</label>
                <input
                  type="text"
                  class="form-control"
                  id="edit_judul"
                  name="judul"
                  required
                />
              </div>
              <div class="form-group">
                <label for="edit_isi">Isi Artikel:</label>
                <textarea
                  class="form-control"
                  id="edit_isi"
                  name="isi"
                  required
                ></textarea>
              </div>
              <div class="form-group">
                <label for="edit_kategori">Kategori:</label>
                <select
                  class="form-control"
                  id="edit_kategori"
                  name="kategori"
                  required
                >
                  <option value="Technology">Technology</option>
                  <option value="Lifestyle">Lifestyle</option>
                </select>
              </div>
              <div class="form-group">
                <label for="edit_author">Author:</label>
                <input
                  type="text"
                  class="form-control"
                  id="edit_author"
                  name="author"
                  required
                />
              </div>
              <div class="form-group">
                <label for="edit_tanggal_publikasi">Tanggal Publikasi:</label>
                <input
                  type="date"
                  class="form-control"
                  id="edit_tanggal_publikasi"
                  name="tanggal_publikasi"
                  required
                />
              </div>
              <div class="form-group">
                <label for="edit_gambar">Upload Gambar:</label>
                <input
                  type="file"
                  class="form-control"
                  id="edit_gambar"
                  name="gambar"
                  accept="image/*"
                />
              </div>
              <button type="submit" class="btn btn-primary">
                Simpan Perubahan
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Artikel Modal -->
    <div
      class="modal fade"
      id="deleteArticleModal"
      tabindex="-1"
      aria-labelledby="deleteArticleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteArticleModalLabel">
              Hapus Artikel
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Anda yakin ingin menghapus artikel ini?</p>
            <button
              type="button"
              class="btn btn-danger"
              id="confirm-delete-btn"
            >
              Hapus
            </button>
            <button type="button" class="btn btn-success" data-dismiss="modal">
              Batal
            </button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      let articleIdToDelete = null;

      $(document).ready(function () {
        // Load articles on page load
        loadArticles();

        // Confirm delete button click
        $("#confirm-delete-btn").on("click", function () {
          if (articleIdToDelete !== null) {
            $.ajax({
              url: "crud.php",
              method: "POST",
              data: { id: articleIdToDelete, action: "delete" },
              success: function (response) {
                articleIdToDelete = null; // Reset articleIdToDelete
                $("#deleteArticleModal").modal("hide"); // Hide the delete modal
                loadArticles(); // Reload articles
                alert("Artikel berhasil dihapus."); // Optional success feedback
              },
              error: function () {
                alert("Gagal menghapus artikel. Silakan coba lagi.");
              },
            });
          }
        });
      });

      function loadArticles() {
        $.ajax({
          url: "crud.php",
          method: "GET",
          success: function (data) {
            $("#articleTable").html(data);
          },
        });
      }

      function editArticle(id) {
        $.ajax({
          url: "crud.php",
          method: "GET",
          data: { id: id, action: "read" },
          dataType: "json",
          success: function (data) {
            if (data && data.id) {
              $("#edit_id").val(data.id);
              $("#edit_judul").val(data.judul);
              $("#edit_isi").val(data.isi);
              $("#edit_kategori").val(data.kategori);
              $("#edit_author").val(data.author);
              $("#edit_tanggal_publikasi").val(data.tanggal_publikasi);
              $("#editArticleModal").modal("show");
            } else {
              alert("Data artikel tidak ditemukan.");
            }
          },
          error: function () {
            alert("Gagal memuat data artikel. Silakan coba lagi.");
          },
        });
      }

      function deleteArticle(id) {
        articleIdToDelete = id;
        $("#deleteArticleModal").modal("show");
      }
    </script>
  </body>
</html>