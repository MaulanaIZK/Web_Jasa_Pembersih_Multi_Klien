<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan - CleanerShip</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { height: 100%; }
        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; 
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0c4a6e 100%); 
            min-height: 100vh; 
            display: flex; 
            justify-content: center; 
            align-items: flex-start; 
            padding: 3rem 1rem; 
            color: #334155; 
        }
        .auth-card { 
            background: #ffffff; 
            border-radius: 1rem; 
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.4), 0 10px 10px -5px rgba(0,0,0,0.2); 
            width: 100%; 
            max-width: 460px; 
            padding: 2.25rem 2rem; 
            margin-top: 1rem;
            margin-bottom: 2rem;
        }
        .auth-logo { font-size: 1.75rem; font-weight: 900; color: #0284c7; text-align: center; text-decoration: none; display: block; margin-bottom: 0.5rem; }
        .auth-logo span { color: #0f172a; }
        .auth-title { text-align: center; font-size: 1.3rem; font-weight: 800; color: #0f172a; margin-bottom: 0.25rem; }
        .auth-subtitle { text-align: center; font-size: 0.85rem; color: #64748b; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1rem; }
        .form-label { display: block; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #475569; margin-bottom: 0.35rem; }
        .form-input, .form-textarea { width: 100%; padding: 0.75rem 1rem; border-radius: 0.5rem; border: 1px solid #cbd5e1; font-size: 0.875rem; outline: none; background: #ffffff; color: #0f172a; font-family: inherit; transition: border-color 0.2s, box-shadow 0.2s; }
        .form-input:focus, .form-textarea:focus { border-color: #0284c7; box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.25); }
        .form-textarea { resize: vertical; min-height: 65px; }
        .btn-submit { width: 100%; background: #0284c7; color: #ffffff; font-weight: 700; font-size: 0.95rem; padding: 0.85rem; border-radius: 0.5rem; border: none; cursor: pointer; transition: background 0.2s; margin-top: 0.5rem; display: block; text-align: center; text-decoration: none; }
        .btn-submit:hover { background: #0369a1; }
        .auth-footer { text-align: center; font-size: 0.85rem; color: #64748b; margin-top: 1.5rem; padding-top: 1.25rem; border-top: 1px solid #f1f5f9; }
        .auth-footer a { color: #0284c7; font-weight: 700; text-decoration: none; }
        .auth-footer a:hover { text-decoration: underline; }
        .alert-error { background-color: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 0.75rem; border-radius: 0.5rem; font-size: 0.8rem; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <div class="auth-card">
        <a href="/" class="auth-logo">Cleaner<span>Ship</span> ✨</a>
        <h1 class="auth-title">Pendaftaran Pelanggan</h1>
        <p class="auth-subtitle">Buat akun untuk mulai memesan layanan pembersih</p>

        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus class="form-input" placeholder="Nama Lengkap Anda">
            </div>

            <div class="form-group">
                <label class="form-label">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="form-input" placeholder="nama@email.com">
            </div>

            <div class="form-group">
                <label class="form-label">Nomor Telepon / WA</label>
                <input type="text" name="phone" value="{{ old('phone') }}" required class="form-input" placeholder="08xxxxxxxxxx">
            </div>

            <div class="form-group">
                <label class="form-label">Alamat Domisili (Opsional)</label>
                <textarea name="address" class="form-textarea" placeholder="Jl. Kebersihan No. 12">{{ old('address') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Kata Sandi</label>
                <input type="password" name="password" required class="form-input" placeholder="Minimal 8 karakter">
            </div>

            <div class="form-group">
                <label class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" required class="form-input" placeholder="Ulangi kata sandi">
            </div>

            <button type="submit" class="btn-submit">Daftar Pelanggan</button>
        </form>

        <div class="auth-footer">
            Sudah memiliki akun? <a href="{{ route('login') }}">Sudah Punya Akun (Masuk)</a>
        </div>
    </div>
</body>
</html>