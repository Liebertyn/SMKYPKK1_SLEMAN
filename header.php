<?php
session_start();
include 'koneksi.php';
$username = $_SESSION['username'];

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="container">
  <nav class="navbar bg-white navbar-expand-md sticky-top mt-2">
    <div class="container-lg">
      <a class="navbar-brand" href="main.php"><i class="bi bi-film"></i> Te Amovie</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="main.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active " aria-current="page" href="upload.php">Upload</a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <form class="d-flex me-3" role="search" action="search.php" method="GET">
          <input class="form-control" type="" placeholder="Find something..." aria-label="Search" name="search">
          <button class="btn" type="submit">Search</button>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mb-3   " href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <?php echo $username ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" aria-current="page" href="profile.php"><i class="bi bi-person-fill"></i>
                  Profile</a></li>
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmLogout"><i
                    class="bi bi-box-arrow-in-left"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class='modal fade' id='confirmLogout' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
    aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Konfirmasi Logout</h5>
        </div>
        <div class='modal-body'>
          Apakah Anda yakin ingin logout?
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tidak</button>
          <form method='post' action='logout.php'>
            <button type='submit' class='btn btn-primary'>Ya</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>