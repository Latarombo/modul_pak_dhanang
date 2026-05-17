<?php
$level_akses = "admin";
include "../login/cek.php";

// menentukan halaman default
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// whitelist halaman
$allowed = ['dashboard', 'user', 'berita'];

// cek apakah halaman diizinkan
if (!in_array($page, $allowed)) {
  $page = 'dashboard';
}
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>

<div class="main">
  <div class="content">
    <?php include "pages/$page.php"; ?>
  </div>
  <?php include 'templates/footer.php'; ?>
</div>
