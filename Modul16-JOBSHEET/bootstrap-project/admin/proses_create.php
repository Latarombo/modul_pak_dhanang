<?php
include "../login_level/cek.php";
include "../login_level/koneksi.php";
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../login_level/login.php");
    exit();
}
$nis    = trim($_POST['nis']   ?? '');
$nama   = trim($_POST['nama']  ?? '');
$kelas  = trim($_POST['kelas'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$kota   = trim($_POST['kota']  ?? '');
$jk     = trim($_POST['jk']   ?? '');
if (empty($nis) || empty($nama) || empty($kelas) || empty($alamat) || empty($kota) || empty($jk)) {
    header("Location: " . ($_SESSION['level'] === 'admin' ? 'create.php' : '../user/user.php') . "?error=field_kosong");
    exit();
}
if (!in_array($jk, ['L', 'P'])) { header("Location: create.php?error=invalid_jk"); exit(); }
if (!in_array($kelas, ['X', 'XI', 'XII'])) { header("Location: create.php?error=invalid_kelas"); exit(); }
$tgl = str_pad(trim($_POST['tgl'] ?? ''), 2, '0', STR_PAD_LEFT);
$bln = str_pad(trim($_POST['bln'] ?? ''), 2, '0', STR_PAD_LEFT);
$thn = trim($_POST['thn'] ?? '');
$ttl = $thn . "-" . $bln . "-" . $tgl;
if (!checkdate((int)$bln, (int)$tgl, (int)$thn)) { header("Location: create.php?error=invalid_date"); exit(); }
$hobi_allowed = ['Membaca', 'Olahraga', 'Menyanyi', 'Menari', 'Traveling'];
$hobi_raw     = isset($_POST['hobi']) && is_array($_POST['hobi']) ? $_POST['hobi'] : [];
$hobi_clean   = array_filter($hobi_raw, fn($h) => in_array($h, $hobi_allowed));
$hobi         = implode(",", $hobi_clean);
$ekskul_allowed = ['Pramuka', 'Basket', 'Volly', 'Band', 'Seni Tari', 'Robotic', 'Bulu Tangkis'];
$ekskul_raw     = isset($_POST['ekskul']) && is_array($_POST['ekskul']) ? $_POST['ekskul'] : [];
$ekskul_clean   = array_filter($ekskul_raw, fn($e) => in_array($e, $ekskul_allowed));
if (empty($ekskul_clean)) { header("Location: create.php?error=ekskul_kosong"); exit(); }
$ekskul = implode(",", $ekskul_clean);
$stmt = $conn->prepare("INSERT INTO tb_siswa (nis, nama, kelas, ttl, alamat, kota, jk, hobi, ekskul) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $nis, $nama, $kelas, $ttl, $alamat, $kota, $jk, $hobi, $ekskul);
if ($stmt->execute()) {
    $stmt->close();
    if ($_SESSION['level'] === "admin") { header("Location: admin.php?success=1"); }
    else { header("Location: ../user/user.php?success=1"); }
} else {
    $stmt->close();
    header("Location: create.php?error=db_error");
}
exit();
