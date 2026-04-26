<?php
$level_akses = "admin";
include "../login_level/cek.php";
include "../login_level/koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 24px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        h2 { color: #6a0dad; }

        .logout-btn {
            background: #dc3545;
            color: #fff;
            padding: 8px 14px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        .logout-btn:hover { background: #b02a37; }

        hr { border: none; border-top: 1px solid #ddd; margin: 16px 0; }

        .btn-tambah {
            display: inline-block;
            background: #6a0dad;
            color: #fff;
            padding: 8px 14px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 16px;
        }

        .btn-tambah:hover { background: #570aab; }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th {
            background: #6a0dad;
            color: #fff;
            padding: 10px 12px;
            text-align: left;
        }

        td {
            padding: 10px 12px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        tr:hover td { background: #f9f5ff; }

        .action-link {
            text-decoration: none;
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 13px;
            margin-right: 4px;
        }

        .link-detail { background: #17a2b8; color: #fff; }
        .link-edit   { background: #ffc107; color: #333; }
        .link-hapus  { background: #dc3545; color: #fff; }

        .action-link:hover { opacity: 0.85; }

        .no-data {
            text-align: center;
            color: #999;
            padding: 24px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div>
                <h2>Dashboard Admin</h2>
                <p style="color:#555; margin-top:4px;">Selamat datang, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
            </div>
            <a href="../login_level/logout.php" class="logout-btn">Logout</a>
        </div>

        <hr>

        <h3 style="margin-bottom:12px; color:#333;">Data Siswa</h3>
        <a href="create.php" class="btn-tambah">+ Tambah Data</a>

        <table>
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Ekskul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT nis, nama, kelas, jk, ekskul FROM tb_siswa ORDER BY nama ASC");

                if ($result && $result->num_rows > 0):
                    while ($d = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= htmlspecialchars($d['nis']); ?></td>
                        <td><?= htmlspecialchars($d['nama']); ?></td>
                        <td><?= htmlspecialchars($d['kelas']); ?></td>
                        <td><?= $d['jk'] === 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                        <td><?= htmlspecialchars($d['ekskul']); ?></td>
                        <td>
                            <a href="detail.php?nis=<?= urlencode($d['nis']); ?>" class="action-link link-detail">Detail</a>
                            <a href="edit.php?nis=<?= urlencode($d['nis']); ?>" class="action-link link-edit">Edit</a>
                            <a href="delete.php?nis=<?= urlencode($d['nis']); ?>"
                               class="action-link link-hapus"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                    endwhile;
                else:
                ?>
                    <tr>
                        <td colspan="6" class="no-data">Belum ada data siswa.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
