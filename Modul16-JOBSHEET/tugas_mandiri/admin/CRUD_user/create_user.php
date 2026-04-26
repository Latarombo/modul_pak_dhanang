<?php
$level_akses = "admin";
include "../../login_level/cek.php";

$page_title = "Tambah User";
$active     = "user";
include '../../_sidebar_open.php';
?>

<a href="../admin.php" class="btn-back">&larr; Kembali ke Dashboard</a>

<div class="form-wrap form-wrap-sm">
  <div class="form-head">
    <h2>Tambah User Baru</h2>
    <p>Buat akun baru untuk mengakses sistem</p>
  </div>
  <div class="form-body">
    <form action="proses_create_user.php" method="POST">

      <div class="field-block">
        <label class="f-label">Username <span class="f-req">*</span></label>
        <input type="text" name="username" class="f-control" placeholder="Pilih username unik" required>
      </div>

      <div class="field-block">
        <label class="f-label">Password <span class="f-req">*</span></label>
        <input type="password" name="password" class="f-control" placeholder="Buat password kuat" required>
      </div>

      <div class="field-block">
        <label class="f-label">Level Akses <span class="f-req">*</span></label>
        <select name="level" class="f-select" required>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn-submit">Simpan</button>
        <a href="../admin.php" class="btn-cancel">Batal</a>
      </div>

    </form>
  </div>
</div>

</div><!-- /page-body -->
</div><!-- /main-wrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
