<?php # [BlazeVersion]:{v3} ?>
<?php
    $nama = $client->business_name ?? auth()->user()->name ?? 'Mitra';
    $layananAktif = $client ? \App\Models\Service::where('client_id', $client->id)->where('is_active', true)->count() : 0;
    $pesananTerbaru = [
        ['ORD-2026-001', 'Budi Santoso', 'Deep Cleaning Rumah', 'menunggu', 'Menunggu'],
        ['ORD-2026-002', 'Siti Rahma', 'Pembersihan AC 2 Unit', 'diproses', 'Diproses'],
        ['ORD-2026-003', 'Ahmad Razi', 'Cuci Sofa & Karpet', 'selesai', 'Selesai'],
    ];
?>
<?php if (isset($component)) { $__componentOriginala5c2b25d69a95c845c2d82309335dc14 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala5c2b25d69a95c845c2d82309335dc14 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.mitra','data' => ['title' => 'Dasbor Mitra Klien']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.mitra'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Dasbor Mitra Klien']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <h1 class="mp-title">Selamat datang, <?php echo e($nama); ?> &#128075;</h1>
    <p class="mp-sub">Berikut ringkasan aktivitas anda hari ini.</p>

    <div class="mp-stats">
        <div class="mp-stat">
            <div class="l">Pesanan hari ini</div>
            <div class="v">8</div>
        </div>
        <div class="mp-stat">
            <div class="l">Pendapatan bulan ini</div>
            <div class="v">Rp 4.250.000</div>
        </div>
        <div class="mp-stat">
            <div class="l">Layanan aktif</div>
            <div class="v"><?php echo e($layananAktif); ?></div>
        </div>
    </div>

    <h2 class="mp-h2">Pesanan Terbaru</h2>
    <table class="mp-table">
        <thead>
            <tr><th>ID</th><th>Pelanggan</th><th>Layanan</th><th>Status</th></tr>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $pesananTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$id, $pelanggan, $layanan, $kelas, $status]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <tr>
                    <td><?php echo e($id); ?></td>
                    <td><?php echo e($pelanggan); ?></td>
                    <td><?php echo e($layanan); ?></td>
                    <td><span class="mp-badge <?php echo e($kelas); ?>"><?php echo e($status); ?></span></td>
                </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </tbody>
    </table>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala5c2b25d69a95c845c2d82309335dc14)): ?>
<?php $attributes = $__attributesOriginala5c2b25d69a95c845c2d82309335dc14; ?>
<?php unset($__attributesOriginala5c2b25d69a95c845c2d82309335dc14); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5c2b25d69a95c845c2d82309335dc14)): ?>
<?php $component = $__componentOriginala5c2b25d69a95c845c2d82309335dc14; ?>
<?php unset($__componentOriginala5c2b25d69a95c845c2d82309335dc14); ?>
<?php endif; ?><?php /**PATH C:\ServBay\www\servbay\Web_Jasa_Pembersih_Multi_Klien\resources\views/client/dashboard.blade.php ENDPATH**/ ?>