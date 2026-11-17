<?php # [BlazeVersion]:{v3} ?>
<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Dasbor Admin Platform']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Dasbor Admin Platform']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

  <div class="space-y-8">
    <div>
      <h1 class="text-2xl font-bold text-gray-900">Selamat datang, Administrator CleanerShip 👋</h1>
      <p class="text-sm text-gray-500 mt-1">Berikut adalah ringkasan performa platform dan transaksi mitra hari ini.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
      <div class="bg-white rounded-xl shadow-sm border p-6">
        <p class="text-xs font-semibold tracking-wide text-gray-500 uppercase">Total Mitra Klien</p>
        <p class="mt-2 text-xl xl:text-2xl font-bold whitespace-nowrap text-gray-900"><?php echo e($stats['total_clients'] ?? 0); ?> Mitra</p>
        <p class="mt-2 text-sm text-green-600">● <?php echo e($stats['active_clients'] ?? 0); ?> Aktif Beroperasi</p>
      </div>
      <div class="bg-white rounded-xl shadow-sm border p-6">
        <p class="text-xs font-semibold tracking-wide text-gray-500 uppercase">Total Transaksi Platform</p>
        <p class="mt-2 text-xl xl:text-2xl font-bold whitespace-nowrap text-blue-600">Rp <?php echo e(number_format($stats['total_revenue'] ?? 0, 0, ',', '.')); ?></p>
        <p class="mt-2 text-sm text-gray-500">Bulan ini</p>
      </div>
      <div class="bg-white rounded-xl shadow-sm border p-6">
        <p class="text-xs font-semibold tracking-wide text-gray-500 uppercase">Komisi Platform (10%)</p>
        <p class="mt-2 text-xl xl:text-2xl font-bold whitespace-nowrap text-emerald-600">Rp <?php echo e(number_format($stats['platform_commission'] ?? 0, 0, ',', '.')); ?></p>
        <p class="mt-2 text-sm text-emerald-600">Terverifikasi ledger</p>
      </div>
      <div class="bg-white rounded-xl shadow-sm border p-6">
        <p class="text-xs font-semibold tracking-wide text-gray-500 uppercase">Pending Payouts</p>
        <p class="mt-2 text-xl xl:text-2xl font-bold whitespace-nowrap text-amber-500">3 Mitra</p>
        <p class="mt-2 text-sm text-amber-600">Menunggu verifikasi bank</p>
      </div>
    </div>
  </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php /**PATH C:\ServBay\www\servbay\Web_Jasa_Pembersih_Multi_Klien\app\Modules\Admin\resources\views/dashboard.blade.php ENDPATH**/ ?>