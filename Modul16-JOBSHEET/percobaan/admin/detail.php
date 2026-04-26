<?php
$level_akses = "admin";
include "../login_level/cek.php";
include "../login_level/koneksi.php";

// Validasi parameter NIS
if (!isset($_GET['nis']) || trim($_GET['nis']) === '') {
    header("Location: admin.php");
    exit();
}

$nis = trim($_GET['nis']);

// Ambil data dengan prepared statement
$stmt = $conn->prepare("SELECT * FROM tb_siswa WHERE nis = ?");
$stmt->bind_param("s", $nis);
$stmt->execute();
$result = $stmt->get_result();
$d      = $result->fetch_assoc();
$stmt->close();

if (!$d) {
    header("Location: admin.php?error=not_found");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa - <?= htmlspecialchars($d['nama']); ?></title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 24px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            border-radius: 8px;
            padding: 28px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        h2 {
            color: #6a0dad;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        td {
            padding: 10px 12px;
            border-bottom: 1px solid #eee;
            vertical-align: top;
        }

        td:first-child {
            font-weight: bold;
            color: #555;
            width: 160px;
        }

        td:nth-child(2) {
            width: 10px;
            color: #999;
        }

        .action-bar {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-back   { background: #6c757d; color: #fff; }
        .btn-edit   { background: #ffc107; color: #333; }
        .btn-hapus  { background: #dc3545; color: #fff; }

        .btn:hover { opacity: 0.85; }
    </style>
</head>

<body>
    <div class="container">
        <h2>Detail Data Siswa</h2>

        <table>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><?= htmlspecialchars($d['nis']); ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= htmlspecialchars($d['nama']); ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= htmlspecialchars($d['kelas']); ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><?= date('d-m-Y', strtotime($d['ttl'])); ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= htmlspecialchars($d['alamat']); ?></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td>:</td>
                <td><?= htmlspecialchars($d['kota']); ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $d['jk'] === 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td>:</td>
                <td><?= !empty($d['hobi']) ? htmlspecialchars($d['hobi']) : '-'; ?></td>
            </tr>
            <tr>
                <td>Ekskul</td>
                <td>:</td>
                <td><?= htmlspecialchars($d['ekskul']); ?></td>
            </tr>
        </table>

        <div class="action-bar">
            <a href="admin.php" class="btn btn-back">← Kembali</a>
            <a href="edit.php?nis=<?= urlencode($d['nis']); ?>" class="btn btn-edit">Edit</a>
            <a href="delete.php?nis=<?= urlencode($d['nis']); ?>"
               class="btn btn-hapus"
               onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
        </div>
    </div>
</body>

</html>
