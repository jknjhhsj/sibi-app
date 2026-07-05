<?php $__env->startSection('title','Data Siswa'); ?>
<?php $__env->startSection('page-title','Data Siswa'); ?>
<?php $__env->startSection('page-subtitle','Pantau perkembangan siswa tunarungu'); ?>

<?php $__env->startSection('content'); ?>


<div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:24px">

    <div style="background:var(--surf);border:1px solid var(--border);border-radius:var(--r);padding:14px 18px;display:flex;align-items:center;gap:12px">
        <div style="width:38px;height:38px;background:var(--accent-light);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px">👥</div>
        <div>
            <div style="font-family:'Outfit',sans-serif;font-size:22px;font-weight:800;color:var(--text);line-height:1"><?php echo e($siswa->total()); ?></div>
            <div style="font-size:11px;font-weight:600;color:var(--text3);margin-top:1px">Total Siswa</div>
        </div>
    </div>

    <div style="background:var(--surf);border:1px solid var(--border);border-radius:var(--r);padding:14px 18px;display:flex;align-items:center;gap:12px">
        <div style="width:38px;height:38px;background:#DCFCE7;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px">✅</div>
        <div>
            <div style="font-family:'Outfit',sans-serif;font-size:22px;font-weight:800;color:var(--text);line-height:1"><?php echo e($siswa->where('status','aktif')->count()); ?></div>
            <div style="font-size:11px;font-weight:600;color:var(--text3);margin-top:1px">Aktif</div>
        </div>
    </div>

    <div style="background:var(--surf);border:1px solid var(--border);border-radius:var(--r);padding:14px 18px;display:flex;align-items:center;gap:12px">
        <div style="width:38px;height:38px;background:#FEE2E2;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px">🚫</div>
        <div>
            <div style="font-family:'Outfit',sans-serif;font-size:22px;font-weight:800;color:var(--text);line-height:1"><?php echo e($siswa->where('status','nonaktif')->count()); ?></div>
            <div style="font-size:11px;font-weight:600;color:var(--text3);margin-top:1px">Nonaktif</div>
        </div>
    </div>

</div>


<div class="adm-card">
    <div style="padding:14px 18px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px">
        <div style="display:flex;align-items:center;gap:10px">
            <div style="width:34px;height:34px;background:var(--accent-light);border-radius:9px;display:flex;align-items:center;justify-content:center">
                <i class="fas fa-user-group" style="color:var(--accent);font-size:13px"></i>
            </div>
            <div>
                <div style="font-family:'Outfit',sans-serif;font-size:14px;font-weight:700;color:var(--text)">Daftar Siswa / Pengguna</div>
                <div style="font-size:11px;color:var(--text3)">Klik nama siswa untuk melihat detail perkembangan</div>
            </div>
        </div>
    </div>
    <div style="overflow-x:auto">
        <table class="tbl" style="min-width:600px">
            <thead><tr>
                <?php $__currentLoopData = ['Siswa','Kelas','Skor Total','Kuis Selesai','Status','Bergabung','Aksi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo e($h); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr></thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td>
                    <a href="<?php echo e(route('admin.siswa.show',$s)); ?>" style="display:flex;align-items:center;gap:11px;text-decoration:none">
                        <div style="width:38px;height:38px;border-radius:11px;background:var(--accent-light);display:flex;align-items:center;justify-content:center;color:var(--accent);font-family:'Outfit',sans-serif;font-size:16px;font-weight:800;flex-shrink:0">
                            <?php echo e(strtoupper(substr($s->name,0,1))); ?>

                        </div>
                        <div>
                            <div style="font-weight:700;color:var(--text);font-size:13px;line-height:1.2"><?php echo e($s->name); ?></div>
                            <div style="font-size:11px;color:var(--text3)"><?php echo e($s->email); ?></div>
                        </div>
                    </a>
                </td>
                <td style="font-size:13px;color:var(--text2)"><?php echo e($s->kelas ?? '—'); ?></td>
                <td>
                    <span style="font-family:'Outfit',sans-serif;font-weight:800;font-size:15px;color:<?php echo e(($s->total_skor??0)>0?'var(--accent)':'var(--text3)'); ?>">
                        <?php echo e($s->total_skor ?? 0); ?>

                    </span>
                    <span style="font-size:10px;color:var(--text3)"> pts</span>
                </td>
                <td style="font-size:13px;font-weight:600;color:var(--text2)"><?php echo e($s->total_kuis ?? 0); ?>x</td>
                <td>
                    <?php if($s->status === 'aktif'): ?>
                    <span class="badge" style="background:#DCFCE7;color:#16A34A;border:1px solid #BBF7D0"><i class="fas fa-circle" style="font-size:6px"></i> Aktif</span>
                    <?php else: ?>
                    <span class="badge" style="background:var(--red-light);color:var(--red);border:1px solid #FECACA"><i class="fas fa-circle" style="font-size:6px"></i> Nonaktif</span>
                    <?php endif; ?>
                </td>
                <td style="font-size:12px;color:var(--text3)"><?php echo e($s->created_at->format('d M Y')); ?></td>
                <td>
                    <div style="display:flex;gap:6px;align-items:center">
                        <a href="<?php echo e(route('admin.siswa.show',$s)); ?>" class="btn-s" style="font-size:11px;padding:6px 11px;color:var(--accent);border-color:var(--accent-light2);background:var(--accent-light)">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                        <form method="POST" action="<?php echo e(route('admin.siswa.toggle',$s)); ?>">
                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="btn-s" style="font-size:11px;padding:6px 11px;<?php echo e($s->status==='aktif'?'color:var(--yellow);border-color:rgba(217,119,6,.3);background:var(--yellow-light)':'color:var(--accent);border-color:var(--accent-light2);background:var(--accent-light)'); ?>">
                                <?php if($s->status==='aktif'): ?><i class="fas fa-ban"></i><?php else: ?><i class="fas fa-check"></i><?php endif; ?>
                            </button>
                        </form>
                        <form method="POST" action="<?php echo e(route('admin.siswa.destroy',$s)); ?>" onsubmit="return confirm('Hapus akun <?php echo e(addslashes($s->name)); ?>?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-s" style="font-size:11px;padding:6px 10px;color:var(--red);border-color:rgba(220,38,38,.25);background:var(--red-light)"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="7" style="padding:60px;text-align:center">
                <div style="font-size:36px;margin-bottom:12px">👤</div>
                <div style="font-family:'Outfit',sans-serif;font-size:16px;font-weight:700;color:var(--text);margin-bottom:5px">Belum Ada Siswa</div>
                <div style="font-size:13px;color:var(--text3)">Siswa yang mendaftar akan muncul di sini.</div>
            </td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($siswa->hasPages()): ?>
    <div style="padding:14px 20px;border-top:1px solid var(--border)"><?php echo e($siswa->links()); ?></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\final-fixed\resources\views/admin/siswa/index.blade.php ENDPATH**/ ?>