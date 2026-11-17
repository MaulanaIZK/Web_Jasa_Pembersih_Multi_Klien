<?php # [BlazeVersion]:{v3} ?>
<?php
    $clients = $clients ?? \App\Models\Client::with('user')->latest()->get();
?>
<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Kelola Mitra Klien']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Kelola Mitra Klien']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

  <div class="space-y-6">
    <div>
      <h1 class="text-2xl font-bold text-gray-900">Kelola Mitra Klien</h1>
      <p class="text-sm text-gray-500 mt-1">Verifikasi, aktifkan, atau nonaktifkan mitra penyedia jasa di platform CleanerShip.</p>
      <a href="<?php echo e(route('admin.clients.create')); ?>" class="inline-block mt-4 bg-sky-500 hover:bg-sky-600 text-white text-sm font-bold px-4 py-2 rounded-lg">+ Tambah Mitra</a>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
      <div class="rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3"><?php echo e(session('success')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
      <div class="rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3"><?php echo e($errors->first()); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
      <div class="px-5 py-4 border-b border-gray-100 text-sm font-semibold text-gray-700">
        <?php echo e($clients->count()); ?> mitra terdaftar
      </div>
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
          <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-500">
            <tr>
              <th class="px-4 py-3 text-left">Mitra</th>
              <th class="px-4 py-3 text-left">Kontak</th>
              <th class="px-4 py-3 text-left">Area Layanan</th>
              <th class="px-4 py-3 text-left">Bank</th>
              <th class="px-4 py-3 text-left">Status</th>
              <th class="px-4 py-3 text-right">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
              <tr class="border-t border-gray-100">
                <td class="px-4 py-3">
                  <p class="font-semibold text-gray-900"><?php echo e($client->business_name ?: $client->name); ?></p>
                  <p class="text-xs text-gray-500"><?php echo e($client->name); ?></p>
                </td>
                <td class="px-4 py-3 text-gray-700">
                  <p><?php echo e($client->phone ?: '-'); ?></p>
                  <p class="text-xs text-gray-500"><?php echo e(optional($client->user)->email); ?></p>
                </td>
                <td class="px-4 py-3 text-gray-700"><?php echo e($client->service_area ?: '-'); ?></td>
                <td class="px-4 py-3 text-gray-700">
                  <p><?php echo e($client->bank_name ?: '-'); ?></p>
                  <p class="text-xs text-gray-500"><?php echo e($client->bank_account_holder); ?></p>
                </td>
                <td class="px-4 py-3">
                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->isActive()): ?>
                    <span class="inline-block rounded-full bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1">Aktif</span>
                  <?php else: ?>
                    <span class="inline-block rounded-full bg-amber-100 text-amber-700 text-xs font-semibold px-2.5 py-1"><?php echo e($client->status ?: 'Menunggu'); ?></span>
                  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                <td class="px-4 py-3 text-right whitespace-nowrap">
                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! $client->isActive()): ?>
                    <form method="POST" action="<?php echo e(route('admin.clients.verify', $client)); ?>" class="inline">
                      <?php echo csrf_field(); ?>
                      <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white text-xs font-bold px-3 py-1.5 rounded-md">Verifikasi</button>
                    </form>
                  <?php else: ?>
                    <form method="POST" action="<?php echo e(route('admin.clients.toggle-status', $client)); ?>" class="inline" onsubmit="return confirm('Nonaktifkan mitra ini?')">
                      <?php echo csrf_field(); ?>
                      <button type="submit" class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 text-xs font-bold px-3 py-1.5 rounded-md">Nonaktifkan</button>
                    </form>
                  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
              </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
              <tr>
                <td colspan="6" class="px-4 py-12 text-center text-gray-500">
                  Belum ada mitra terdaftar. Klik tombol Tambah Mitra untuk mendaftarkan mitra yang sudah menandatangani kontrak.
                </td>
              </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          </tbody>
        </table>
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
<?php endif; ?><?php /**PATH C:\ServBay\www\servbay\Web_Jasa_Pembersih_Multi_Klien\app\Modules\Governance\resources\views/index.blade.php ENDPATH**/ ?>