<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FengMarket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* === VARIABEL WARNA & DASAR === */
        :root {
            --color-navy: #0a192f;
            --color-navy-light: #112240;
            --color-teal: #00ffcc;
            --color-teal-light: #64ffda;
            --color-cyan: #08d9ff;
            --color-glow: rgba(0, 255, 204, 0.4);
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        /* === BACKGROUND & ANIMASI LAYER === */
        body {
            background: var(--color-navy);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow-x: hidden;
            position: relative;
        }
        /* Animasi Blob Gradien */
        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, 
                rgba(10, 25, 47, 0) 0%, 
                rgba(0, 255, 204, 0.15) 60%, 
                rgba(8, 217, 255, 0.08) 100%);
            filter: blur(60px);
            animation: floatBlob 20s infinite alternate ease-in-out;
            z-index: 0;
            top: -200px;
            left: -200px;
        }
        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, 
                rgba(10, 25, 47, 0) 0%, 
                rgba(8, 217, 255, 0.1) 50%, 
                rgba(0, 255, 204, 0.05) 100%);
            filter: blur(50px);
            animation: floatBlob 25s infinite alternate-reverse ease-in-out;
            z-index: 0;
            bottom: -150px;
            right: -150px;
        }
        @keyframes floatBlob {
            0% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(30px, -40px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 30px) scale(0.95);
            }
            100% {
                transform: translate(0, 0) scale(1);
            }
        }

        /* === KARTU UTAMA (Glassmorphism Premium) === */
.login-card {
    background: rgba(17, 34, 64, 0.75); /* Sedikit lebih solid */
    backdrop-filter: blur(16px);
    border-radius: 20px; /* Sudut lebih halus */
    border: 1px solid rgba(0, 255, 204, 0.2);
    padding: 32px 28px; /* PADDING DIKURANGI SIGNIFIKAN */
    width: 90%; /* Lebih fleksibel */
    max-width: 380px; /* MAKSIMAL LEBIH KECIL */
    margin: 30px auto; /* RUANG PUTIH di sekeliling kartu */
    box-shadow: 
        0 15px 40px rgba(0, 0, 0, 0.5),
        inset 0 1px 0 rgba(255, 255, 255, 0.08);
    position: relative;
    z-index: 10;
    animation: cardEntrance 0.7s ease-out;
}
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 30px 85px rgba(0, 0, 0, 0.7),
                inset 0 1px 0 rgba(255, 255, 255, 0.12),
                0 0 25px rgba(0, 255, 204, 0.2);
        }
        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* === HEADER DENGAN ICON ANIMATED === */
        .card-header {
            text-align: center;
            margin-bottom: 32px;
        }
        .icon-wrapper {
            width: 72px;
            height: 72px;
            margin: 0 auto 18px;
            position: relative;
        }
        .icon-wrapper::before {
            content: '';
            position: absolute;
            inset: -4px;
            background: linear-gradient(135deg, 
                var(--color-teal), 
                var(--color-cyan), 
                var(--color-teal-light));
            border-radius: 50%;
            filter: blur(10px);
            opacity: 0.6;
            z-index: 1;
            animation: iconPulse 3s infinite alternate ease-in-out;
        }
        .icon-wrapper i {
            position: relative;
            z-index: 2;
            background: linear-gradient(135deg, var(--color-teal), var(--color-cyan));
            width: 100%;
            height: 100%;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: var(--color-navy);
            box-shadow: 
                inset 0 2px 4px rgba(255, 255, 255, 0.3),
                0 5px 25px rgba(0, 255, 204, 0.4);
        }
        @keyframes iconPulse {
            0% {
                transform: scale(0.95);
                opacity: 0.5;
            }
            100% {
                transform: scale(1.05);
                opacity: 0.8;
            }
        }
        .card-header h1 {
            color: #e6f1ff;
            font-weight: 700;
            font-size: 26px;
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }
        .card-header p {
            color: #8892b0;
            font-weight: 400;
            font-size: 14px;
        }

        /* === FORM INPUT === */
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .form-group label {
            display: block;
            color: #a8b2d1;
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 10px;
            padding-left: 5px;
        }
        .form-control {
            width: 100%;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.05);
            border: 1.5px solid rgba(100, 255, 218, 0.1);
            border-radius: 12px;
            color: #e6f1ff;
            font-size: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .form-control::placeholder {
            color: #5a6888;
            font-weight: 400;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--color-teal);
            background: rgba(0, 255, 204, 0.03);
            box-shadow: 0 0 0 3px var(--color-glow);
        }
        /* Animasi garis bawah saat fokus */
        .form-group::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 20px;
            right: 20px;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent, 
                var(--color-teal), 
                transparent);
            border-radius: 2px;
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }
        .form-control:focus ~ .form-group::after {
            transform: scaleX(1);
        }

        /* === TOMBOL LOGIN (GLOWING EFFECT) === */
        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, 
                var(--color-teal) 0%, 
                var(--color-cyan) 100%);
            color: var(--color-navy);
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 15.5px;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-top: 10px;
            position: relative;
            overflow: hidden;
            z-index: 1;
            box-shadow: 
                0 10px 30px rgba(0, 255, 204, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
        }
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.2), 
                transparent);
            transition: left 0.7s ease;
            z-index: -1;
        }
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 15px 40px rgba(0, 255, 204, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }
        .btn-login:hover::before {
            left: 100%;
        }
        .btn-login:active {
            transform: translateY(0);
        }

        /* === LINK & FOOTER === */
        .card-footer {
            text-align: center;
            margin-top: 35px;
            color: #5a6888;
            font-size: 14.5px;
        }
        .card-footer a {
            color: var(--color-teal-light);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding-bottom: 3px;
            transition: color 0.3s;
        }
        .card-footer a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--color-teal-light);
            transition: width 0.4s ease;
        }
        .card-footer a:hover {
            color: #ffffff;
        }
        .card-footer a:hover::after {
            width: 100%;
        }

        /* === RESPONSIVE === */
        @media (max-width: 500px) {
            .login-card {
                padding: 35px 30px;
            }
            .card-header h1 {
                font-size: 28px;
            }
        }
    </style>
    <!-- FontAwesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="login-card">
        <div class="card-header">
            <div class="icon-wrapper">
                <i class="fas fa-lock"></i>
            </div>
            <h1>FengMarket Admin</h1>
            <p>Masuk dengan akun Anda</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>

        <form method="post" action="/admin/login">
            <div class="form-group">
                <label for="username"><i class="fas fa-user" style="margin-right: 8px;"></i>Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="admin@fengmarket" required autofocus>
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-key" style="margin-right: 8px;"></i>Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt" style="margin-right: 10px;"></i>LOGIN SEKARANG
            </button>
        </form>

        <div class="card-footer">
            <a href="#"><i class="fas fa-question-circle" style="margin-right: 8px;"></i>Butuh Bantuan?</a>
        </div>
    </div>
</body>
</html>