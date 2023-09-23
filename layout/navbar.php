<?php
if (isset($_SESSION['username'])) {
  $user = getUser($_SESSION['username']);
}
?>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
  <a class="navbar-brand" href="#">
    <img src="img/smklogo.png" width="75px" />
    <img src="img/logo.png" width="75px" />
  </a>
  <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
      <a href="index.php" class="nav-item nav-link">Home</a>
      <a href="about.html" class="nav-item nav-link">About</a>
      <a href="#" class="nav-item nav-link">PPDB</a>
      <div class="nav-item">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">JURUSAN</a>
        <div class="dropdown-menu fade-down m-0">
          <a href="tkj.html" class="dropdown-item">Tehnik Keterampilan Jaringan</a>
          <a href="ap.php" class="dropdown-item">Agribisnis Perikanan</a>
          <a href="mm.html" class="dropdown-item">Multi Media</a>
          <a href="keperawatan.html" class="dropdown-item">Keperawatan</a>
        </div>
      </div>
      <a href="contact.html" class="nav-item nav-link">Contact</a>
      <?php
      if (isset($_SESSION['username'])) { ?>
        <a href="./menuadmin.php" class="nav-item nav-link">Menu Admin</a>
      <?php
      }
      ?>
    </div>
    <?php
    if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
    ?>
      <a class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"><?= $username ?></a>
      <a href="./layout/logout.php" class="btn btn-danger py-4 px-lg-5 d-none d-lg-block">Log Out</a>
    <?php
    } else {
    ?>
      <a href="login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login SMK<i class="fa fa-arrow-right ms-3"></i></a>
    <?php
    }
    ?>
  </div>
</nav>
<!-- Navbar End -->