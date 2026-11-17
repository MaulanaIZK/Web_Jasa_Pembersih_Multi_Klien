<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Layanan - CleanerShip</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background-color: #f8fafc; color: #1e293b; min-height: 100vh; margin: 0; }
        
        .navbar { background: #ffffff; border-bottom: 1px solid #e2e8f0; position: sticky; top: 0; z-index: 50; }
        .navbar-container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; height: 4rem; display: flex; align-items: center; justify-content: space-between; }
        .logo { font-size: 1.5rem; font-weight: 900; color: #0284c7; text-decoration: none; }
        .logo span { color: #0f172a; }
        .btn-register { background: #0284c7; color: #ffffff; font-weight: 700; font-size: 0.875rem; padding: 0.5rem 1.25rem; border-radius: 0.5rem; text-decoration: none; }
        
        .main-container { max-width: 1200px; margin: 0 auto; padding: 2rem 1.5rem; }
        .hero { background: linear-gradient(135deg, #0f172a, #0c4a6e); color: #ffffff; border-radius: 1rem; padding: 2.5rem 2rem; margin-bottom: 2rem; }
        .hero h1 { font-size: 2rem; font-weight: 800; margin-bottom: 0.5rem; }
        .hero p { color: #94a3b8; font-size: 0.95rem; }
        
        .categories { display: flex; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap; }
        .cat-btn { background: #ffffff; border: 1px solid #cbd5e1; padding: 0.75rem 1.25rem; border-radius: 0.75rem; font-weight: 700; color: #334155; text-decoration: none; display: flex; align-items: center; gap: 0.5rem; }
        .cat-btn.active { border-color: #0284c7; background: #e0f2fe; color: #0369a1; }
        
        .grid-layout { display: grid; grid-template-columns: 240px 1fr; gap: 1.5rem; }
        @media (max-width: 768px) { .grid-layout { grid-template-columns: 1fr; } }
        
        .sidebar { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 0.75rem; padding: 1.25rem; height: fit-content; }
        .service-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1.25rem; }
        .card { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 0.75rem; padding: 1.25rem; display: flex; flex-direction: column; justify-content: space-between; }
        .badge { background: #e0f2fe; color: #0369a1; font-size: 0.7rem; font-weight: 800; padding: 0.2rem 0.5rem; border-radius: 0.25rem; width: fit-content; margin-bottom: 0.5rem; }
        .card-title { font-size: 1rem; font-weight: 800; color: #0f172a; margin-bottom: 0.35rem; }
        .card-desc { font-size: 0.8rem; color: #64748b; margin-bottom: 1rem; }
        .card-price { font-size: 1.1rem; font-weight: 800; color: #0284c7; }
        .btn-buy { background: #0284c7; color: #ffffff; padding: 0.4rem 0.8rem; border-radius: 0.5rem; text-decoration: none; font-size: 0.8rem; font-weight: 700; }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="navbar-container">
            <a href="/" class="logo">Cleaner<span>Ship</span> ✨</a>
            <div>
                <a href="{{ route('login') }}" style="margin-right: 1rem; color: #475569; font-weight: 600; text-decoration: none;">Masuk</a>
                <a href="{{ route('register') }}" class="btn-register">Daftar</a>
            </div>
        </div>
    </header>

    <main class="main-container">
        <div class="hero">
            <h1>Semua Layanan Kebersihan</h1>
            <p>Pilih paket layanan pembersihan profesional sesuai kebutuhan Anda.</p>
        </div>

        <div class="categories">
            <a href="#" class="cat-btn active">🏠 Rumah</a>
            <a href="#" class="cat-btn">🏢 Kantor</a>
            <a href="#" class="cat-btn">🚗 Mobil</a>
            <a href="#" class="cat-btn">📦 Gudang</a>
        </div>

        <div class="grid-layout">
            <aside class="sidebar">
                <h3 style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #475569; margin-bottom: 0.75rem;">Cari Layanan</h3>
                <input type="text" placeholder="Cari..." style="width: 100%; padding: 0.5rem; border: 1px solid #cbd5e1; border-radius: 0.5rem; font-size: 0.85rem; outline: none;">
            </aside>

            <section class="service-grid">
                <div class="card">
                    <div>
                        <span class="badge">Rumah</span>
                        <h3 class="card-title">Pembersihan Standar</h3>
                        <p class="card-desc">Sapu, pel lantai, lap debu perabot, &amp; pembersihan kamar mandi.</p>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 0.5rem;">
                        <span class="card-price">Rp 150.000</span>
                        <a href="{{ route('login') }}" class="btn-buy">Pesan Jasa</a>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <span class="badge">Rumah</span>
                        <h3 class="card-title">Deep Cleaning &amp; Steril</h3>
                        <p class="card-desc">Pembersihan kerak kamar mandi, dapur, &amp; penyemprotan disinfektan.</p>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 0.5rem;">
                        <span class="card-price">Rp 350.000</span>
                        <a href="{{ route('login') }}" class="btn-buy">Pesan Jasa</a>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <span class="badge">Mobil</span>
                        <h3 class="card-title">Cuci Mobil Interior</h3>
                        <p class="card-desc">Vakum interior, cuci karpet dasar, &amp; pembersihan dashboard.</p>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 0.5rem;">
                        <span class="card-price">Rp 120.000</span>
                        <a href="{{ route('login') }}" class="btn-buy">Pesan Jasa</a>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <span class="badge">Kantor</span>
                        <h3 class="card-title">Pembersihan Ruang Kerja</h3>
                        <p class="card-desc">Sanitasi meja kerja, pembersihan kaca jendela, &amp; tempat sampah.</p>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 0.5rem;">
                        <span class="card-price">Rp 250.000</span>
                        <a href="{{ route('login') }}" class="btn-buy">Pesan Jasa</a>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>