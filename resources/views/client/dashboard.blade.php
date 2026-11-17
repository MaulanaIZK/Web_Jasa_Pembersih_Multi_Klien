@extends('layouts.mitra')

@section('title', 'Dasbor Mitra Klien')

@section('content')
    <h1 class="page-title">Selamat datang, {{ auth()->user()->name ?? 'CleanerShip' }} 👋</h1>
    <p class="page-sub">Berikut ringkasan aktivitas anda hari ini.</p>

    <div class="stats">
        <div class="stat">
            <div class="label">Pesanan hari ini</div>
            <div class="value text-blue">8 Pesanan</div>
            <div class="note">3 perlu konfirmasi</div>
        </div>
        <div class="stat">
            <div class="label">Estimasi pendapatan bersih</div>
            <div class="value text-green">Rp 4.250.000</div>
            <div class="note">Setelah komisi platform 10%</div>
        </div>
        <div class="stat">
            <div class="label">Status operasional</div>
            <div class="value text-green">BUKA</div>
            <div class="note">Menerima pesanan pre-order</div>
        </div>
    </div>

    <h2 class="section-title">Daftar Pesanan Kebersihan Masuk</h2>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No. Pesanan</th>
                    <th>Pelanggan</th>
                    <th>Paket Layanan</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders ?? [] as $order)
                    <tr>
                        <td class="code">{{ $order['id'] ?? $order->code }}</td>
                        <td>{{ $order['customer'] ?? $order->customer_name }}</td>
                        <td>{{ $order['service'] ?? $order->service_name }}</td>
                        <td>Rp {{ number_format($order['amount'] ?? $order->total_price ?? 0, 0, ',', '.') }}</td>
                        <td>
                            @php
                                $status = strtolower($order['status'] ?? $order->status ?? 'menunggu');
                            @endphp
                            @if ($status === 'pending' || $status === 'menunggu')
                                <span class="badge menunggu">Menunggu</span>
                            @elseif ($status === 'in_progress' || $status === 'diproses')
                                <span class="badge diproses">Diproses</span>
                            @else
                                <span class="badge selesai">Selesai</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="code">ORD-2026-001</td>
                        <td>Budi Santoso</td>
                        <td>Deep Cleaning Rumah</td>
                        <td>Rp 350.000</td>
                        <td><span class="badge menunggu">Menunggu</span></td>
                    </tr>
                    <tr>
                        <td class="code">ORD-2026-002</td>
                        <td>Siti Rahma</td>
                        <td>Pembersihan AC 2 Unit</td>
                        <td>Rp 180.000</td>
                        <td><span class="badge diproses">Diproses</span></td>
                    </tr>
                    <tr>
                        <td class="code">ORD-2026-003</td>
                        <td>Ahmad Razi</td>
                        <td>Cuci Sofa &amp; Karpet</td>
                        <td>Rp 450.000</td>
                        <td><span class="badge selesai">Selesai</span></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
