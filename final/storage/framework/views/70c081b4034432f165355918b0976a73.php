<?php $__env->startSection('title','Tambah Konten'); ?>
<?php $__env->startSection('page-title','Tambah Konten'); ?>
<?php $__env->startSection('page-subtitle','Tambahkan kartu belajar baru'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.flbl{display:block;font-size:11px;font-weight:700;color:var(--text2);text-transform:uppercase;letter-spacing:.6px;margin-bottom:6px}
.ferr{color:var(--red);font-size:12px;font-weight:600;margin-top:5px;display:flex;align-items:center;gap:5px}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div style="max-width:720px">

    
    <div style="display:flex;align-items:center;gap:8px;font-size:12px;color:var(--text3);margin-bottom:20px">
        <a href="<?php echo e(route('admin.konten.index')); ?>" style="color:var(--accent);font-weight:600;text-decoration:none">Konten SIBI</a>
        <i class="fas fa-chevron-right" style="font-size:9px"></i>
        <span>Tambah Baru</span>
    </div>

    <div class="adm-card">
        <div style="padding:16px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:10px">
            <div style="width:36px;height:36px;background:var(--accent-light);border-radius:10px;display:flex;align-items:center;justify-content:center">
                <i class="fas fa-plus" style="color:var(--accent);font-size:14px"></i>
            </div>
            <div>
                <div style="font-family:'Outfit',sans-serif;font-size:14px;font-weight:700;color:var(--text)">Form Tambah Konten</div>
                <div style="font-size:11px;color:var(--text3)">Isi semua kolom yang bertanda * (wajib diisi)</div>
            </div>
        </div>

        <div style="padding:24px">
            <form method="POST" action="<?php echo e(route('admin.konten.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo $__env->make('admin.konten._form', ['konten' => null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <div style="display:flex;gap:10px;margin-top:26px;padding-top:20px;border-top:1px solid var(--border)">
                    <button type="submit" class="btn-p">
                        <i class="fas fa-save"></i> Simpan Konten
                    </button>
                    <a href="<?php echo e(route('admin.konten.index')); ?>" class="btn-s">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\final\resources\views/admin/konten/create.blade.php ENDPATH**/ ?>