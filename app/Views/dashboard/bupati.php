<?php
/** @var float $total_pagu */
/** @var float $total_realisasi */
/** @var int $total_berjalan */
/** @var int $total_selesai */
/** @var array $anggaran_list */
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Bupati — Pemkot Bogor</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: sans-serif; background: #bde0fe; }
        .navbar { background: #90caf9; color: #1a1a2e; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 1rem; }
        .navbar a { color: #fff; text-decoration: none; font-size: 0.85rem; background: #90caf9; padding: 6px 14px; border-radius: 5px; }
        .container { max-width: 1100px; margin: 2rem auto; padding: 0 1rem; }
        .welcome { background: #fce4ec; padding: 1.5rem; border-radius: 10px; margin-bottom: 1.5rem; border-left: 5px solid #f48fb1; }
        .welcome h2 { color: #1a1a2e; margin-bottom: 4px; }
        .welcome p { color: #666; font-size: 0.9rem; }
        .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; }
        .card { background: #fce4ec; padding: 1.5rem; border-radius: 10px; text-align: center; border-top: 4px solid #f48fb1; }
        .card h3 { font-size: 2rem; color: #1a1a2e; }
        .card p { color: #666; font-size: 0.85rem; margin-top: 4px; }
        .readonly { background: #fffbe6; border: 1px solid #ffe082; padding: 10px 14px; border-radius: 6px; font-size: 0.85rem; color: #856404; margin-bottom: 1.5rem; }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>🏛️ Sistem Informasi — Pemerintah Kota Bogor</h1>
        <a href="/logout">Keluar</a>
    </div>
    <div class="container">
        <div class="welcome">
            <h2>🏛️ Selamat datang!</h2>
            <p>Anda dapat memantau Anggaran Prioritas Kota Bogor.</p>
        </div>
        <div class="readonly">⚠️ Mode read-only — Anda hanya dapat melihat data, tidak dapat mengubah.</div>
        <div class="cards">
    <div class="card">
        <h3>Rp <?= number_format($total_pagu, 0, ',', '.') ?></h3>
        <p>Total Pagu Anggaran 2026</p>
    </div>
    <div class="card">
        <h3>Rp <?= number_format($total_realisasi, 0, ',', '.') ?></h3>
        <p>Total Realisasi</p>
    </div>
    <div class="card"><h3><?= $total_berjalan ?></h3><p>Program Berjalan</p></div>
    <div class="card"><h3><?= $total_selesai ?></h3><p>Program Selesai</p></div>
</div>

<div style="margin-top:1.5rem">
    <h3 style="margin-bottom:1rem;color:#1a1a2e">Daftar Program Prioritas</h3>
    <table style="width:100%;background:#fce4ec;border-radius:10px;border-collapse:collapse;overflow:hidden">
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
            <?php foreach ($anggaran_list as $a): ?>
            <tr style="border-bottom:1px solid #f48fb1;background:#fff0f5">
                <td style="padding:10px 14px"><?= $a->nama_program ?></td>
                <td style="padding:10px 14px"><?= $a->bidang ?></td>
                <td style="padding:10px 14px;text-align:right">Rp <?= number_format($a->pagu_anggaran, 0, ',', '.') ?></td>
                <td style="padding:10px 14px;text-align:right">Rp <?= number_format($a->realisasi, 0, ',', '.') ?></td>
                <td style="padding:10px 14px;text-align:center">
                    <?php
                    $warna = ['berjalan' => '#2980b9', 'selesai' => '#27ae60', 'perencanaan' => '#f39c12'];
                    $w = $warna[$a->status] ?? '#999';
                    ?>
                    <span style="background:<?= $w ?>;color:#fff;padding:3px 10px;border-radius:20px;font-size:0.8rem">
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