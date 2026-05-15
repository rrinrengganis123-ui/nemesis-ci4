<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Sistem Pemkot Bogor</title>
    <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
        font-family: sans-serif;
        background: #bde0fe;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .card {
        background: #fce4ec;
        padding: 2rem;
        border-radius: 16px;
        width: 100%;
        max-width: 420px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .logo { text-align: center; margin-bottom: 1.5rem; }
    .logo h2 { font-size: 1.3rem; color: #1a1a2e; }
    .logo p { font-size: 0.85rem; color: #555; }
    .form-group { margin-bottom: 1rem; }
    label { display: block; font-size: 0.85rem; color: #333; margin-bottom: 4px; }
    input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #f48fb1;
        border-radius: 8px;
        font-size: 0.95rem;
        background: #fff0f5;
    }
    input:focus { outline: none; border-color: #e91e8c; }
    button {
        width: 100%;
        padding: 11px;
        background: #4a6fa5;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        cursor: pointer;
        margin-top: 0.5rem;
    }
    button:hover { background: #3a5f95; }
    .error {
        background: #fee;
        color: #c00;
        padding: 10px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        margin-bottom: 1rem;
    }
</style>
</head>
<body>
    <div class="card">
        <div class="logo">
            <h2>🏛️ Pemerintah Kota Bogor</h2>
            <p>Sistem Informasi Daerah</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="/login" method="post" autocomplete="off">
    <?= csrf_field() ?>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" placeholder="Masukkan username" required autocomplete="off">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="••••••••" required autocomplete="new-password">
    </div>

        <div style="margin-top:1rem;display:flex;gap:10px;max-width:420px;width:100%;">
        <div style="flex:1;background:#fff0f5;border:1px solid #f48fb1;border-radius:8px;padding:10px;font-size:0.82rem;color:#555;text-align:center;">
            <strong style="color:#c0392b">SuperAdmin</strong><br>
            superadmin112007
        </div>
        <div style="flex:1;background:#fff0f5;border:1px solid #90caf9;border-radius:8px;padding:10px;font-size:0.82rem;color:#555;text-align:center;">
            <strong style="color:#2980b9">Bupati</strong><br>
            Bupati@1234
        </div>
    </div>

    <button type="submit">Masuk</button>
</form>