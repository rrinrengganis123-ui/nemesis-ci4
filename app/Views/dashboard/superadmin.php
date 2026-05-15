<?php
/** @var int $total_provinsi */
/** @var int $total_pengguna */
/** @var int $total_kecamatan */
/** @var int $total_kelurahan */
/** @var int $total_anggaran */
/** @var array $provinces */
/** @var array $districts */
/** @var array $anggaran */
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Super Admin — Pemkot Bogor</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: sans-serif; background: #bde0fe; }
        .navbar { background: #90caf9; color: #1a1a2e; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 1rem; }
        .navbar a { color: #fff; text-decoration: none; font-size: 0.85rem; background: #c0392b; padding: 6px 14px; border-radius: 5px; }
        .container { max-width: 1100px; margin: 2rem auto; padding: 0 1rem; }
        .welcome { background: #fce4ec; padding: 1.5rem; border-radius: 10px; margin-bottom: 1.5rem; border-left: 5px solid #f48fb1; }
        .welcome h2 { color: #1a1a2e; margin-bottom: 4px; }
        .welcome p { color: #666; font-size: 0.9rem; }
        .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; }
        .card { background: #fce4ec; padding: 1.5rem; border-radius: 10px; text-align: center; border-top: 4px solid #4a6fa5; }
        .card h3 { font-size: 2rem; color: #1a1a2e; }
        .card p { color: #666; font-size: 0.85rem; margin-top: 4px; }

        
    </style>
</head>
<body>
    <div class="navbar">
        <h1>🏛️ Sistem Informasi — Pemerintah Kota Bogor</h1>
        <a href="/logout">Keluar</a>
    </div>
    <div class="container">
        <div class="welcome">
            <h2>👑 Selamat datang</h2>
            <p>Anda memiliki akses penuh ke seluruh fitur sistem.</p>
        </div>
        <div class="cards">
    <div class="card"><h3><?= $total_provinsi ?></h3><p>Total Provinsi</p></div>
    <div class="card"><h3><?= $total_pengguna ?></h3><p>Total Pengguna</p></div>
    <div class="card"><h3><?= $total_kecamatan ?></h3><p>Kecamatan Kota Bogor</p></div>
    <div class="card"><h3><?= $total_kelurahan ?></h3><p>Kelurahan</p></div>
    <div class="card"><h3><?= $total_anggaran ?></h3><p>Program Anggaran</p></div>
</div>

        <!-- Tabel Data Provinsi -->
<div style="margin-top:1.5rem">

    <h3 style="margin-bottom:1rem;color:#1a1a2e">
        Data Provinsi
    </h3>

    <table style="
        width:100%;
        background:#fce4ec;
        border-radius:10px;
        border-collapse:collapse;
        overflow:hidden;
    ">

        <thead style="background:#f48fb1;color:#fff">
            <tr>
                <th style="padding:10px 14px;text-align:left">No</th>
                <th style="padding:10px 14px;text-align:left">Kode</th>
                <th style="padding:10px 14px;text-align:left">Nama Provinsi</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($provinces as $i => $p): ?>

            <tr style="
                border-bottom:1px solid #f48fb1;
                background:#fff0f5
            ">
                <td style="padding:10px 14px">
                    <?= $i + 1 ?>
                </td>

                <td style="padding:10px 14px">
                    <?= $p->code ?>
                </td>

                <td style="padding:10px 14px">
                    <?= $p->province_name ?>
                </td>
            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>


<!-- Tabel Kecamatan Kota Bogor -->
<div style="margin-top:1.5rem">

    <h3 style="margin-bottom:1rem;color:#1a1a2e">
        Kecamatan Kota Bogor
    </h3>

    <table style="
        width:100%;
        background:#fce4ec;
        border-radius:10px;
        border-collapse:collapse;
        overflow:hidden;
    ">

        <thead style="background:#f48fb1;color:#fff">
            <tr>
                <th style="padding:10px 14px;text-align:left">No</th>
                <th style="padding:10px 14px;text-align:left">Kode</th>
                <th style="padding:10px 14px;text-align:left">Nama Kecamatan</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($districts as $i => $d): ?>

            <tr style="
                border-bottom:1px solid #f48fb1;
                background:#fff0f5
            ">
                <td style="padding:10px 14px">
                    <?= $i + 1 ?>
                </td>

                <td style="padding:10px 14px">
                    <?= $d->code ?>
                </td>

                <td style="padding:10px 14px">
                    <?= $d->district_name ?>
                </td>
            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>


<!-- Tabel Program Anggaran -->
<div style="margin-top:1.5rem;margin-bottom:2rem">

    <h3 style="margin-bottom:1rem;color:#1a1a2e">
        Program Anggaran Prioritas
    </h3>

    <table style="
        width:100%;
        background:#fce4ec;
        border-radius:10px;
        border-collapse:collapse;
        overflow:hidden;
    ">

        <thead style="background:#f48fb1;color:#fff">
            <tr>
                <th style="padding:10px 14px;text-align:left">Program</th>
                <th style="padding:10px 14px;text-align:left">Bidang</th>
                <th style="padding:10px 14px;text-align:right">Pagu</th>
                <th style="padding:10px 14px;text-align:right">Realisasi</th>
                <th style="padding:10px 14px;text-align:center">Status</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($anggaran as $a): ?>

            <tr style="
                border-bottom:1px solid #f48fb1;
                background:#fff0f5
            ">

                <td style="padding:10px 14px">
                    <?= $a->nama_program ?>
                </td>

                <td style="padding:10px 14px">
                    <?= $a->bidang ?>
                </td>

                <td style="padding:10px 14px;text-align:right">
                    Rp <?= number_format($a->pagu_anggaran, 0, ',', '.') ?>
                </td>

                <td style="padding:10px 14px;text-align:right">
                    Rp <?= number_format($a->realisasi, 0, ',', '.') ?>
                </td>

                <td style="padding:10px 14px;text-align:center">

                    <?php
                    $warna = [
                        'berjalan' => '#2980b9',
                        'selesai' => '#27ae60',
                        'perencanaan' => '#f39c12'
                    ];

                    $w = $warna[$a->status] ?? '#999';
                    ?>

                    <span style="
                        background:<?= $w ?>;
                        color:#fff;
                        padding:3px 10px;
                        border-radius:20px;
                        font-size:0.8rem;
                    ">
                        <?= ucfirst($a->status) ?>
                    </span>

                </td>

            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

    </div>
</body>
</html>