<?php
$level_akses = "admin";
include "../login_level/cek.php";
include "../login_level/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: admin.php");
    exit();
}

// Ambil & bersihkan input
$nis    = trim($_POST['nis']    ?? '');
$nama   = trim($_POST['nama']   ?? '');
$kelas  = trim($_POST['kelas']  ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$kota   = trim($_POST['kota']   ?? '');
$jk     = trim($_POST['jk']    ?? '');

// Validasi field wajib
if (empty($nis) || empty($nama) || empty($kelas) || empty($alamat) || empty($kota) || empty($jk)) {
    header("Location: edit.php?nis=" . urlencode($nis) . "&error=field_kosong");
    exit();
}

// Validasi nilai yang diperbolehkan
if (!in_array($kelas, ['X', 'XI', 'XII'])) {
    header("Location: edit.php?nis=" . urlencode($nis) . "&error=invalid_kelas");
    exit();
}

if (!in_array($jk, ['L', 'P'])) {
    header("Location: edit.php?nis=" . urlencode($nis) . "&error=invalid_jk");
    exit();
}

// Tanggal lahir
$tgl = str_pad(trim($_POST['tgl'] ?? ''), 2, '0', STR_PAD_LEFT);
$bln = str_pad(trim($_POST['bln'] ?? ''), 2, '0', STR_PAD_LEFT);
$thn = trim($_POST['thn'] ?? '');
$ttl = $thn . "-" . $bln . "-" . $tgl;

if (!checkdate((int)$bln, (int)$tgl, (int)$thn)) {
    header("Location: edit.php?nis=" . urlencode($nis) . "&error=invalid_date");
    exit();
}

// Hobi (opsional)
$hobi_allowed = ['Membaca', 'Olahraga', 'Menyanyi', 'Menari', 'Traveling'];
$hobi_raw     = isset($_POST['hobi']) && is_array($_POST['hobi']) ? $_POST['hobi'] : [];
$hobi_clean   = array_filter($hobi_raw, fn($h) => in_array($h, $hobi_allowed));
$hobi         = implode(",", $hobi_clean);

// Ekskul (wajib)
$ekskul_allowed = ['Pramuka', 'Basket', 'Volly', 'Band', 'Seni Tari', 'Robotic', 'Bulu Tangkis'];
$ekskul_raw     = isset($_POST['ekskul']) && is_array($_POST['ekskul']) ? $_POST['ekskul'] : [];
$ekskul_clean   = array_filter($ekskul_raw, fn($e) => in_array($e, $ekskul_allowed));

if (empty($ekskul_clean)) {
    header("Location: edit.php?nis=" . urlencode($nis) . "&error=ekskul_kosong");
    exit();
}
$ekskul = implode(",", $ekskul_clean);

// Update dengan prepared statement
$stmt = $conn->prepare(
    "UPDATE tb_siswa
     SET nama=?, kelas=?, ttl=?, alamat=?, kota=?, jk=?, hobi=?, ekskul=?
     WHERE nis=?"
);
$stmt->bind_param("sssssssss", $nama, $kelas, $ttl, $alamat, $kota, $jk, $hobi, $ekskul, $nis);

if ($stmt->execute()) {
    $stmt->close();
    header("Location: admin.php?success=updated");
} else {
    $stmt->close();
    header("Location: edit.php?nis=" . urlencode($nis) . "&error=db_error");
}
exit();
