<div style="display:grid;grid-template-columns:1fr 110px;gap:14px;margin-bottom:18px">
    <div>
        <label class="flbl"><i class="fas fa-tag" style="color:var(--accent);margin-right:5px"></i>Kategori *</label>
        <select name="kategori" class="inp" required>
            <option value="">— Pilih Kategori —</option>
            <?php $__currentLoopData = ['angka'=>'🔢 Angka','keluarga'=>'🫂 Keluarga','benda'=>'📚 Benda Sekolah','sapaan'=>'👋 Kata Sapaan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($k); ?>" <?php echo e(old('kategori', $konten?->kategori) === $k ? 'selected' : ''); ?>><?php echo e($l); ?></option>
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
        <label class="flbl">Urutan</label>
        <input type="number" name="urutan" value="<?php echo e(old('urutan', $konten?->urutan ?? 0)); ?>" min="0" class="inp" placeholder="0">
    </div>
</div>

<div style="margin-bottom:18px">
    <label class="flbl"><i class="fas fa-font" style="color:var(--accent);margin-right:5px"></i>Kata / Judul *</label>
    <input type="text" name="judul" value="<?php echo e(old('judul', $konten?->judul)); ?>"
        placeholder="Contoh: Ayah, 5, Pensil, Selamat Pagi..." class="inp" required>
    <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="ferr"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div style="margin-bottom:18px">
    <label class="flbl"><i class="fas fa-hand-paper" style="color:var(--accent);margin-right:5px"></i>Teks SIBI *</label>
    <input type="text" name="teks_sibi" value="<?php echo e(old('teks_sibi', $konten?->teks_sibi)); ?>"
        placeholder="Contoh: AYAH, LIMA, PENSIL..." class="inp" required>
    <?php $__errorArgs = ['teks_sibi'];
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
        <i class="fas fa-comments" style="color:var(--yellow);margin-right:5px"></i>
        Teks Bahasa Belinyu
        <span style="font-weight:400;text-transform:none;letter-spacing:0;color:var(--text3)">(opsional)</span>
    </label>
    <input type="text" name="teks_belinyu" value="<?php echo e(old('teks_belinyu', $konten?->teks_belinyu)); ?>"
        placeholder="Terjemahan dalam Bahasa Belinyu..." class="inp">
</div>


<div>
    <label class="flbl">
        <i class="fas fa-film" style="color:var(--purple);margin-right:5px"></i>
        Upload GIF / Video Isyarat
        <span style="font-weight:400;text-transform:none;letter-spacing:0;color:var(--text3)">(opsional)</span>
    </label>

    
    <?php if(!empty($konten?->gif_url)): ?>
    <div id="current-media-wrap" style="margin-bottom:12px;border:1px solid var(--border);border-radius:var(--r);overflow:hidden;background:var(--bg);max-width:260px">
        <div style="padding:8px 12px;font-size:11px;font-weight:600;color:var(--text3);text-transform:uppercase;letter-spacing:.5px;border-bottom:1px solid var(--border)">
            <i class="fas fa-image" style="margin-right:5px;color:var(--accent)"></i>Media saat ini
        </div>
        <?php $ext = strtolower(pathinfo($konten->gif_url, PATHINFO_EXTENSION)); ?>
        <?php if(in_array($ext, ['mp4','webm','mov'])): ?>
            <video src="<?php echo e(asset($konten->gif_url)); ?>" autoplay loop muted playsinline
                   style="width:100%;display:block;max-height:180px;object-fit:contain;background:#000"></video>
        <?php else: ?>
            <img src="<?php echo e(asset($konten->gif_url)); ?>" alt="preview"
                 style="width:100%;display:block;max-height:180px;object-fit:contain">
        <?php endif; ?>
        <div style="padding:6px 12px;font-size:11px;color:var(--text3)">Upload file baru untuk mengganti</div>
    </div>
    <?php endif; ?>

    
    <div id="drop-zone"
         style="border:2px dashed var(--border);border-radius:var(--r);padding:28px 20px;text-align:center;cursor:pointer;transition:.2s;background:var(--bg);position:relative"
         onclick="document.getElementById('media_file_input').click()"
         ondragover="event.preventDefault();this.style.borderColor='var(--accent)';this.style.background='var(--accent-light)'"
         ondragleave="this.style.borderColor='var(--border)';this.style.background='var(--bg)'"
         ondrop="handleDrop(event)">
        <i class="fas fa-cloud-upload-alt" style="font-size:32px;color:var(--accent);margin-bottom:10px;display:block"></i>
        <div style="font-weight:600;color:var(--text);margin-bottom:4px">Klik atau seret file ke sini</div>
        <div style="font-size:12px;color:var(--text3)">GIF, MP4, WebM, MOV — maks. 20 MB</div>
        <input type="file" id="media_file_input" name="media_file"
               accept=".gif,.mp4,.webm,.mov" style="display:none"
               onchange="previewMedia(this)">
    </div>

    
    <div id="new-preview-wrap" style="display:none;margin-top:12px;border:1px solid var(--accent);border-radius:var(--r);overflow:hidden;max-width:260px">
        <div style="padding:8px 12px;font-size:11px;font-weight:600;color:var(--accent);text-transform:uppercase;letter-spacing:.5px;border-bottom:1px solid var(--accent);background:var(--accent-light)">
            <i class="fas fa-check-circle" style="margin-right:5px"></i>File baru dipilih
        </div>
        <div id="new-preview-media" style="background:#000"></div>
        <div style="padding:8px 12px;display:flex;justify-content:space-between;align-items:center">
            <span id="new-preview-name" style="font-size:12px;color:var(--text3);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:160px"></span>
            <button type="button" onclick="clearFile()"
                    style="font-size:11px;color:var(--red,#e53);border:none;background:none;cursor:pointer;font-weight:600;padding:2px 6px">
                <i class="fas fa-times"></i> Hapus
            </button>
        </div>
    </div>

    <?php $__errorArgs = ['media_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="ferr" style="margin-top:8px"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<script>
function previewMedia(input) {
    if (!input.files || !input.files[0]) return;
    const file  = input.files[0];
    const url   = URL.createObjectURL(file);
    const ext   = file.name.split('.').pop().toLowerCase();
    const wrap  = document.getElementById('new-preview-wrap');
    const media = document.getElementById('new-preview-media');
    const name  = document.getElementById('new-preview-name');

    if (['mp4','webm','mov'].includes(ext)) {
        media.innerHTML = `<video src="${url}" autoplay loop muted playsinline style="width:100%;display:block;max-height:180px;object-fit:contain"></video>`;
    } else {
        media.innerHTML = `<img src="${url}" style="width:100%;display:block;max-height:180px;object-fit:contain">`;
    }
    name.textContent = file.name;
    wrap.style.display = 'block';

    // highlight dropzone
    const dz = document.getElementById('drop-zone');
    dz.style.borderColor = 'var(--accent)';
    dz.style.background  = 'var(--accent-light)';
}

function clearFile() {
    document.getElementById('media_file_input').value = '';
    document.getElementById('new-preview-wrap').style.display = 'none';
    const dz = document.getElementById('drop-zone');
    dz.style.borderColor = 'var(--border)';
    dz.style.background  = 'var(--bg)';
}

function handleDrop(e) {
    e.preventDefault();
    const dz    = document.getElementById('drop-zone');
    dz.style.borderColor = 'var(--border)';
    dz.style.background  = 'var(--bg)';
    const input = document.getElementById('media_file_input');
    const dt    = e.dataTransfer;
    if (!dt.files.length) return;
    // assign files to input
    const transfer = new DataTransfer();
    transfer.items.add(dt.files[0]);
    input.files = transfer.files;
    previewMedia(input);
}
</script>
<?php /**PATH C:\laragon\www\final-fixed\resources\views/admin/konten/_form.blade.php ENDPATH**/ ?>