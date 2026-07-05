<div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:18px">
    <div>
        <label class="flbl"><i class="fas fa-tag" style="color:var(--accent);margin-right:5px"></i>Kategori *</label>
        <select name="kategori" class="inp" required>
            <option value="">— Pilih Kategori —</option>
            <?php $__currentLoopData = ['angka'=>'🔢 Angka','keluarga'=>'🫂 Keluarga','benda'=>'📚 Benda','sapaan'=>'👋 Sapaan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($k); ?>" <?php echo e(old('kategori', $soal?->kategori) === $k ? 'selected' : ''); ?>><?php echo e($l); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="ferr"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div>
        <label class="flbl"><i class="fas fa-layer-group" style="color:var(--yellow);margin-right:5px"></i>Level (1–5) *</label>
        <select name="level" class="inp" required>
            <?php $__currentLoopData = [1=>'⭐ Mudah',2=>'⭐⭐ Sedang',3=>'⭐⭐⭐ Menantang',4=>'⭐⭐⭐⭐ Sulit',5=>'⭐⭐⭐⭐⭐ Ahli']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n => $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($n); ?>" <?php echo e(old('level', $soal?->level) == $n ? 'selected' : ''); ?>><?php echo e($l); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="ferr"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<div style="margin-bottom:18px">
    <label class="flbl"><i class="fas fa-question-circle" style="color:var(--accent);margin-right:5px"></i>Pertanyaan *</label>
    <input type="text" name="pertanyaan" value="<?php echo e(old('pertanyaan', $soal?->pertanyaan)); ?>"
        placeholder="Contoh: Tunjukkan angka 5 dalam SIBI!" class="inp" required>
    <?php $__errorArgs = ['pertanyaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="ferr"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div style="margin-bottom:18px">
    <label class="flbl">
        <i class="fas fa-film" style="color:var(--purple);margin-right:5px"></i>
        Path GIF Soal
        <span style="font-weight:400;text-transform:none;letter-spacing:0;color:var(--text3)">(opsional)</span>
    </label>
    <input type="text" name="gif_soal" value="<?php echo e(old('gif_soal', $soal?->gif_soal)); ?>"
        placeholder="/assets/gifs/angka/angka-5.gif" class="inp" style="font-family:monospace;font-size:13px">
</div>

<div style="background:var(--bg);border:1px solid var(--border);border-radius:var(--r);padding:18px;margin-bottom:18px">
    <div style="font-size:11px;font-weight:700;color:var(--text2);text-transform:uppercase;letter-spacing:.6px;margin-bottom:14px">
        Pilihan Jawaban *
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr;gap:12px">
        <?php $__currentLoopData = ['a'=>'A','b'=>'B','c'=>'C','d'=>'D']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <label class="flbl" style="margin-bottom:5px">
                <span style="display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;background:var(--accent);color:#fff;border-radius:5px;font-size:11px;font-weight:800;margin-right:4px"><?php echo e($label); ?></span>
                Pilihan <?php echo e($label); ?> *
            </label>
            <input type="text" name="pilihan_<?php echo e($k); ?>"
                value="<?php echo e(old('pilihan_'.$k, $soal?->{'pilihan_'.$k})); ?>"
                placeholder="Jawaban <?php echo e($label); ?>..." class="inp" required>
            <?php $__errorArgs = ['pilihan_'.$k];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="ferr"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div>
    <label class="flbl"><i class="fas fa-check-circle" style="color:var(--accent);margin-right:5px"></i>Jawaban Benar *</label>
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:10px">
        <?php $__currentLoopData = ['a'=>'A','b'=>'B','c'=>'C','d'=>'D']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <label style="display:flex;align-items:center;gap:10px;padding:13px 16px;border-radius:var(--r-sm);background:var(--surface);border:1.5px solid var(--border);cursor:pointer;transition:all .15s;font-weight:700;font-size:14px;color:var(--text2)"
               id="lbl-<?php echo e($k); ?>">
            <input type="radio" name="jawaban_benar" value="<?php echo e($k); ?>"
                <?php echo e(old('jawaban_benar', $soal?->jawaban_benar) === $k ? 'checked' : ''); ?>

                style="accent-color:var(--accent);width:16px;height:16px"
                required onchange="highlightAnswer('<?php echo e($k); ?>')">
            <span style="display:inline-flex;align-items:center;justify-content:center;width:28px;height:28px;background:var(--bg);border-radius:7px;font-size:13px;font-weight:800;flex-shrink:0"><?php echo e($label); ?></span>
            Pilihan <?php echo e($label); ?>

        </label>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php $__errorArgs = ['jawaban_benar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="ferr"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function highlightAnswer(selected) {
    ['a','b','c','d'].forEach(k => {
        const el = document.getElementById('lbl-' + k);
        if (!el) return;
        if (k === selected) {
            el.style.borderColor = 'var(--accent)';
            el.style.background  = 'var(--accent-light)';
            el.style.color       = 'var(--accent)';
        } else {
            el.style.borderColor = 'var(--border)';
            el.style.background  = 'var(--surface)';
            el.style.color       = 'var(--text2)';
        }
    });
}
// init on load
document.addEventListener('DOMContentLoaded', () => {
    const checked = document.querySelector('input[name="jawaban_benar"]:checked');
    if (checked) highlightAnswer(checked.value);
});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\final-fixed\resources\views/admin/kuis/_form.blade.php ENDPATH**/ ?>