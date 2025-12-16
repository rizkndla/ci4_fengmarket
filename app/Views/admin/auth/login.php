<!DOCTYPE html>
<html>
<head>
    <title>Admin Login – Feng Market</title>
    <style>
        body {
            background: #0f172a;
            color: #e5e7eb;
            font-family: system-ui;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: #020617;
            padding: 40px;
            width: 360px;
            border-radius: 14px;
            box-shadow: 0 0 40px rgba(20, 184, 166, 0.15);
        }
        h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #5eead4;
        }
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            background: #020617;
            border: 1px solid #1e293b;
            color: #fff;
            border-radius: 8px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #14b8a6, #22d3ee);
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        .error {
            background: #7f1d1d;
            padding: 10px;
            margin-bottom: 16px;
            border-radius: 8px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Admin Login</h2>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form method="post" action="/admin/login">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>