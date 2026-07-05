<?php $__env->startSection('title','Kuis SIBI — Uji Kemampuanmu'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.main-content{ max-width:100% !important; padding:16px 20px !important; }

.screen{display:none}
.screen.active{display:block}

/* ══ HERO ══ */
.kuis-hero{
    background:linear-gradient(135deg,#7D4F00,#D68910);
    border-radius:var(--r-lg);padding:20px 24px;
    position:relative;overflow:hidden;margin-bottom:16px;
}
.kuis-hero::before{
    content:'🏆';position:absolute;right:24px;top:50%;transform:translateY(-50%);
    font-size:60px;opacity:.09;pointer-events:none;line-height:1;
}
.kuis-hero-pill{
    display:inline-flex;align-items:center;gap:6px;
    background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.2);
    border-radius:99px;padding:3px 10px;font-size:11px;font-weight:600;
    color:rgba(255,255,255,.9);margin-bottom:8px;
}
.kuis-hero h2{font-family:'Outfit',sans-serif;color:#fff;font-size:20px;font-weight:800;letter-spacing:-.3px;margin-bottom:4px}
.kuis-hero p{color:rgba(255,255,255,.7);font-size:12px;line-height:1.5}

/* ══ LEVEL GRID ══ */
.level-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:10px}
.level-card{
    background:var(--surface);border:1px solid var(--border);
    border-radius:var(--r-lg);padding:14px 10px;
    cursor:pointer;text-align:center;transition:all .18s;
    position:relative;overflow:hidden;
}
.level-card:hover{transform:translateY(-3px);box-shadow:var(--shadow-lg)}
.level-num{font-family:'Outfit',sans-serif;font-size:30px;font-weight:900;line-height:1;margin-bottom:4px}
.level-stars{font-size:10px;margin-bottom:4px;letter-spacing:1px}
.level-name{font-size:12px;font-weight:700;color:var(--text)}
.level-cnt{font-size:11px;color:var(--text3);margin-top:2px;font-weight:500}
.level-go{
    margin-top:10px;
    display:flex;align-items:center;justify-content:center;gap:5px;
    padding:7px 10px;border-radius:99px;
    font-size:11px;font-weight:700;color:#fff;
    border:none;cursor:pointer;width:100%;
    transition:all .15s;font-family:'Outfit',sans-serif;
}

/* ══ QUIZ PAGE ══ */
.quiz-page{max-width:860px;margin:0 auto}

.quiz-topbar{
    border-radius:var(--r-lg);padding:10px 14px;
    margin-bottom:12px;
    display:flex;align-items:center;gap:10px;
    position:relative;overflow:hidden;
}
.quiz-topbar-back{
    background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.22);
    border-radius:var(--r-sm);padding:6px 11px;
    color:#fff;font-family:'Outfit',sans-serif;font-weight:600;font-size:12px;
    cursor:pointer;display:flex;align-items:center;gap:5px;flex-shrink:0;
}
.quiz-topbar-back:hover{background:rgba(255,255,255,.25)}
.quiz-topbar-title{font-family:'Outfit',sans-serif;color:#fff;font-size:13px;font-weight:700;flex:1}
.quiz-prog-wrap{height:3px;background:rgba(255,255,255,.2);border-radius:99px;overflow:hidden;margin-top:4px;max-width:180px}
.quiz-prog-fill{height:100%;border-radius:99px;background:rgba(255,255,255,.9);transition:width .5s ease}
.quiz-topbar-score{
    background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.2);
    border-radius:var(--r-sm);padding:5px 13px;text-align:center;flex-shrink:0;
}
.quiz-topbar-score-lbl{font-size:8px;color:rgba(255,255,255,.65);font-weight:700;text-transform:uppercase;letter-spacing:.5px}
.quiz-topbar-score-num{font-family:'Outfit',sans-serif;color:#fff;font-size:18px;font-weight:800;line-height:1}

/* ══ QUIZ LAYOUT ══ */
.quiz-wrap{display:grid;grid-template-columns:1fr 240px;gap:12px;align-items:start}

/* Question */
.q-card{background:var(--surface);border:1px solid var(--border);border-radius:var(--r-lg);overflow:hidden;box-shadow:var(--shadow)}

/* GIF area: compact, scrollable */
.q-gif{
    background:var(--bg);padding:12px;text-align:center;
    max-height:160px;min-height:100px;
    display:flex;flex-direction:column;align-items:center;justify-content:center;
    border-bottom:1px solid var(--border);overflow:hidden;
}
.q-gif img{max-height:130px;max-width:100%;border-radius:var(--r);object-fit:contain}
.q-gif-ph{font-size:28px;opacity:.28;margin-bottom:6px}

.q-text{
    font-family:'Outfit',sans-serif;font-size:15px;font-weight:700;
    color:var(--text);padding:12px 14px;border-bottom:1px solid var(--border);line-height:1.35;
}

/* Options scrollable container */
.opt-list{
    padding:10px 12px;
    display:flex;flex-direction:column;gap:7px;
    max-height:220px;overflow-y:auto;
    scrollbar-width:thin;scrollbar-color:var(--border) transparent;
}
.opt-list::-webkit-scrollbar{width:4px}
.opt-list::-webkit-scrollbar-track{background:transparent}
.opt-list::-webkit-scrollbar-thumb{background:var(--border);border-radius:99px}

.opt-btn{
    display:flex;align-items:center;gap:10px;
    padding:10px 12px;border-radius:var(--r);width:100%;text-align:left;
    background:var(--bg);border:1.5px solid var(--border);
    cursor:pointer;font-family:'Plus Jakarta Sans',sans-serif;transition:all .15s;
    flex-shrink:0;
}
.opt-btn:hover:not(:disabled){border-color:var(--accent);background:var(--accent-light);transform:translateX(3px)}
.opt-btn:disabled{cursor:not-allowed}
.opt-btn.correct{border-color:var(--accent)!important;background:var(--accent-light)!important}
.opt-btn.wrong{border-color:var(--red)!important;background:var(--red-light)!important}
.opt-lbl{
    width:28px;height:28px;border-radius:7px;
    display:flex;align-items:center;justify-content:center;
    font-family:'Outfit',sans-serif;font-size:12px;font-weight:700;
    flex-shrink:0;background:var(--border);color:var(--text2);transition:all .15s;
}
.opt-btn.correct .opt-lbl{background:var(--accent);color:#fff}
.opt-btn.wrong .opt-lbl{background:var(--red);color:#fff}
.opt-text{font-weight:600;font-size:13px;color:var(--text);flex:1}
.opt-ico{font-size:16px;flex-shrink:0}

.feedback-box{
    display:flex;align-items:center;gap:10px;
    padding:10px 12px;border-radius:var(--r);margin:0 12px 10px;
    animation:fbIn .2s ease both;
}
.feedback-box.correct{background:var(--accent-light);border:1px solid var(--accent-light2)}
.feedback-box.wrong{background:var(--red-light);border:1px solid rgba(176,58,46,.15)}
@keyframes fbIn{from{opacity:0;transform:translateY(5px)}to{opacity:1;transform:none}}

/* Sidebar */
.quiz-sidebar{display:flex;flex-direction:column;gap:10px;position:sticky;top:12px}
.q-score-card{background:var(--surface);border:1px solid var(--border);border-radius:var(--r-lg);padding:14px;text-align:center}
.q-score-lbl{font-size:9px;font-weight:700;color:var(--text3);text-transform:uppercase;letter-spacing:.5px;margin-bottom:3px}
.q-score-num{font-family:'Outfit',sans-serif;font-size:38px;font-weight:800;color:var(--text);line-height:1}
.q-score-sub{font-size:10px;color:var(--text2);margin-top:3px}
.q-progress-card{background:var(--surface);border:1px solid var(--border);border-radius:var(--r-lg);padding:12px}
.q-prog-label{font-size:9px;font-weight:700;color:var(--text3);text-transform:uppercase;letter-spacing:.5px;margin-bottom:6px}
.q-prog-bar-wrap{background:var(--border);border-radius:99px;height:5px;overflow:hidden;margin-bottom:5px}
.q-prog-bar-fill{height:100%;border-radius:99px;transition:width .5s ease}
.q-prog-frac{font-family:'Outfit',sans-serif;font-size:12px;font-weight:700;color:var(--text)}
.q-tip-card{background:var(--accent-light);border:1px solid var(--accent-light2);border-radius:var(--r-lg);padding:10px 12px}
.q-tip-lbl{font-size:9px;font-weight:700;color:var(--accent);text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px}
.q-tip-text{font-size:11px;color:var(--accent2);line-height:1.55}

/* ══ RESULT ══ */
.result-wrap{max-width:480px;margin:0 auto;padding:12px 0;text-align:center}
.result-card{background:var(--surface);border:1px solid var(--border);border-radius:var(--r-xl);padding:32px 28px;box-shadow:var(--shadow-lg)}
.result-icon{font-size:48px;margin-bottom:10px;animation:popIn .4s cubic-bezier(.34,1.4,.64,1) both}
@keyframes popIn{from{opacity:0;transform:scale(.5)}to{opacity:1;transform:scale(1)}}
.result-title{font-family:'Outfit',sans-serif;font-size:18px;font-weight:800;color:var(--text);margin-bottom:5px}
.result-stars{font-size:20px;letter-spacing:3px;margin-bottom:5px}
.result-pct{font-family:'Outfit',sans-serif;font-size:60px;font-weight:800;color:var(--accent);line-height:1;margin:8px 0 5px}
.result-det{font-size:12px;color:var(--text2);margin-bottom:18px}
.result-btns{display:flex;flex-direction:column;gap:8px}
.final-card{background:linear-gradient(135deg,var(--accent-light),var(--accent-light2));border:1px solid var(--accent-light2);border-radius:var(--r-xl);padding:32px 28px;text-align:center}
@keyframes confFall{0%{transform:translateY(-20px) rotate(0);opacity:1}100%{transform:translateY(280px) rotate(720deg);opacity:0}}
.conf{position:fixed;top:0;pointer-events:none;animation:confFall 2.2s ease forwards;z-index:9999}

/* ══ RESPONSIVE ══ */
@media(max-width:860px){
    .quiz-wrap{grid-template-columns:1fr}
    .quiz-sidebar{display:none}
}
@media(max-width:700px){
    .level-grid{grid-template-columns:repeat(3,1fr)}
    .main-content{padding:10px !important}
}
@media(max-width:460px){
    .level-grid{grid-template-columns:1fr 1fr}
    .opt-text{font-size:12px}
    /* On mobile: let opts scroll freely */
    .opt-list{max-height:none;overflow-y:visible}
    /* Make whole quiz screen scrollable on mobile */
    #sc-qz{overflow-y:auto}
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div id="sc-lv" class="screen active">
    <div class="kuis-hero">
        <div class="kuis-hero-pill">🏆 Kuis Interaktif</div>
        <h2>Uji Kemampuanmu!</h2>
        <p>Pilih level tantangan sesuai kemampuanmu — dari mudah hingga ahli.</p>
    </div>

    <div style="font-family:'Outfit',sans-serif;font-size:14px;font-weight:700;color:var(--text);margin-bottom:10px;display:flex;align-items:center;gap:7px">
        <span style="display:inline-block;width:3px;height:14px;background:var(--accent);border-radius:99px"></span>
        Pilih Level Tantangan
    </div>

    <div class="level-grid">
        <?php
        $lvlData = [
            [1, '⭐',          'Mudah',     '5 soal', '#DBEAFE', '#1A4F8B'],
            [2, '⭐⭐',        'Sedang',    '6 soal', '#EBF5FB', '#2471A3'],
            [3, '⭐⭐⭐',      'Menantang', '7 soal', '#FEF9E7', '#D68910'],
            [4, '⭐⭐⭐⭐',    'Sulit',     '6 soal', '#FDEDEA', '#B03A2E'],
            [5, '⭐⭐⭐⭐⭐',  'Ahli',      '6 soal', '#F4ECF7', '#7D3C98'],
        ];
        ?>
        <?php $__currentLoopData = $lvlData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$n, $st, $lb, $cnt, $bg, $col]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="level-card fu d<?php echo e($n); ?>" onclick="startLevel(<?php echo e($n); ?>, '<?php echo e($col); ?>')" style="border-top:3px solid <?php echo e($col); ?>">
            <div class="level-num" style="color:<?php echo e($col); ?>"><?php echo e($n); ?></div>
            <div class="level-stars"><?php echo e($st); ?></div>
            <div class="level-name"><?php echo e($lb); ?></div>
            <div class="level-cnt"><?php echo e($cnt); ?></div>
            <button class="level-go" style="background:<?php echo e($col); ?>">
                Mulai <i class="fas fa-arrow-right" style="font-size:10px"></i>
            </button>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<div id="sc-qz" class="screen">
<div class="quiz-page">
    <div class="quiz-topbar" id="quiz-topbar" style="background:linear-gradient(135deg,#7D3C98,#9B59B6)">
        <button class="quiz-topbar-back" onclick="backToLevels()">
            <i class="fas fa-arrow-left" style="font-size:10px"></i> Keluar
        </button>
        <div style="flex:1">
            <div class="quiz-topbar-title" id="lv-name"></div>
            <div class="quiz-prog-wrap">
                <div class="quiz-prog-fill" id="q-pg" style="width:20%"></div>
            </div>
        </div>
        <div style="color:rgba(255,255,255,.75);font-size:11px;font-weight:600" id="q-cnt">Soal 1 dari 5</div>
        <div class="quiz-topbar-score">
            <div class="quiz-topbar-score-lbl">Skor</div>
            <div class="quiz-topbar-score-num" id="score">0</div>
        </div>
    </div>

    <div class="quiz-wrap">
        <div>
            <div class="q-card">
                <div class="q-gif" id="gif-box">
                    <div class="q-gif-ph">🎬</div>
                    <div style="font-size:12px;font-weight:600;color:var(--text3)">Video Isyarat SIBI</div>
                </div>
                <div class="q-text" id="q-txt"></div>
                <div class="opt-list" id="q-opts"></div>
            </div>
            <div id="q-fb" style="display:none;margin-top:8px"></div>
        </div>

        <div class="quiz-sidebar">
            <div class="q-score-card">
                <div class="q-score-lbl">Skor Kamu</div>
                <div class="q-score-num" id="score2">0</div>
                <div class="q-score-sub" id="score-lvl-lbl"></div>
            </div>
            <div class="q-progress-card">
                <div class="q-prog-label">Progress Soal</div>
                <div class="q-prog-bar-wrap">
                    <div class="q-prog-bar-fill" id="q-prog2" style="width:20%;background:var(--accent)"></div>
                </div>
                <div class="q-prog-frac" id="q-cnt2">1 / 5</div>
            </div>
            <div class="q-tip-card">
                <div class="q-tip-lbl">💡 Tips</div>
                <div class="q-tip-text">Perhatikan gerakan tangan secara seksama. Setiap isyarat memiliki gerakan unik yang membedakannya dari isyarat lain.</div>
            </div>
        </div>
    </div>
</div>
</div>


<div id="sc-res" class="screen">
    <div class="result-wrap">
        <div class="result-card">
            <div class="result-icon">🎊</div>
            <div class="result-title" id="res-ttl">Level Selesai!</div>
            <div class="result-stars" id="res-stars"></div>
            <div class="result-pct" id="res-pct">80%</div>
            <div class="result-det" id="res-det"></div>
            <div class="result-btns">
                <button id="btn-nxt" onclick="nextLevel()"
                    class="btn btn-green" style="justify-content:center;padding:11px;font-size:13px">
                    <span id="btn-nxt-txt"></span>
                </button>
                <button onclick="backToLevels()" class="btn" style="justify-content:center;padding:11px">
                    ← Pilih Level Lain
                </button>
            </div>
        </div>
    </div>
</div>


<div id="sc-fin" class="screen">
    <div class="result-wrap">
        <div class="final-card">
            <div style="font-size:48px;margin-bottom:10px">🏅</div>
            <div style="font-family:'Outfit',sans-serif;font-size:20px;font-weight:800;color:var(--accent);margin-bottom:5px">Semua Level Selesai!</div>
            <div style="font-size:12px;color:var(--accent2);margin-bottom:12px">Luar biasa, kamu hebat sekali! 💪</div>
            <div style="font-family:'Outfit',sans-serif;font-size:60px;font-weight:800;color:var(--accent);line-height:1;margin:8px 0 5px" id="fin-pct">90%</div>
            <div style="font-size:12px;color:var(--accent2);margin-bottom:20px" id="fin-det"></div>
            <div style="display:flex;gap:10px;justify-content:center;flex-wrap:wrap">
                <button onclick="restartAll()" class="btn btn-green" style="padding:10px 20px">🔄 Main Lagi</button>
                <a href="<?php echo e(route('home')); ?>" class="btn" style="padding:10px 20px">🏠 Beranda</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
const CSRF = document.querySelector('meta[name=csrf-token]').content;
let lv=1, qs=[], qi=0, sc=0, ans=false, tB=0, tS=0, lvColor='#1A4F8B';

function show(id) {
    document.querySelectorAll('.screen').forEach(s => s.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    window.scrollTo(0,0);
}

const lvLabels = {
    1:'⭐ Level 1 — Mudah',2:'⭐⭐ Level 2 — Sedang',
    3:'⭐⭐⭐ Level 3 — Menantang',4:'⭐⭐⭐⭐ Level 4 — Sulit',
    5:'⭐⭐⭐⭐⭐ Level 5 — Ahli'
};

async function startLevel(level, color) {
    lv=level; qi=0; sc=0; ans=false; lvColor=color||'#1A4F8B';
    document.getElementById('lv-name').textContent      = lvLabels[level];
    document.getElementById('score-lvl-lbl').textContent= lvLabels[level];
    document.getElementById('quiz-topbar').style.background=`linear-gradient(135deg,${lvColor},${lvColor}cc)`;
    try { const r=await fetch(`/kuis/soal/${level}`); qs=await r.json(); }
    catch { qs=demoQs(); }
    show('sc-qz'); renderQ();
}

function renderQ() {
    if (qi>=qs.length) { lvResult(); return; }
    const q=qs[qi]; ans=false;
    const frac=`${qi+1} / ${qs.length}`;
    const pct=((qi+1)/qs.length*100).toFixed(0)+'%';
    document.getElementById('q-cnt').textContent=`Soal ${qi+1} dari ${qs.length}`;
    document.getElementById('q-cnt2').textContent=frac;
    document.getElementById('q-pg').style.width=pct;
    document.getElementById('q-prog2').style.width=pct;
    document.getElementById('score').textContent=sc;
    document.getElementById('score2').textContent=sc;
    document.getElementById('q-txt').textContent=q.pertanyaan;
    document.getElementById('q-fb').style.display='none';

    const gif=document.getElementById('gif-box');
    gif.innerHTML=q.gif_soal
        ? `<img src="${q.gif_soal}" style="max-height:130px;max-width:100%;border-radius:var(--r);object-fit:contain" onerror="this.style.display='none'">`
        : `<div class="q-gif-ph">🎬</div><div style="font-size:12px;font-weight:600;color:var(--text3)">Video Isyarat SIBI</div>`;

    const opts=document.getElementById('q-opts');
    opts.innerHTML='';
    // Support A,B,C,D options
    [['a',q.pilihan_a],['b',q.pilihan_b],['c',q.pilihan_c],['d',q.pilihan_d]].forEach(([id,txt])=>{
        if(!txt) return;
        const b=document.createElement('button');
        b.className='opt-btn';
        b.innerHTML=`<span class="opt-lbl">${id.toUpperCase()}</span><span class="opt-text">${txt}</span><span class="opt-ico"></span>`;
        b.onclick=()=>doAnswer(id,q.jawaban_benar);
        opts.appendChild(b);
    });
    // Scroll opt-list back to top on new question
    opts.scrollTop=0;
}

function doAnswer(chosen,correct) {
    if(ans) return; ans=true;
    const ok=chosen===correct;
    if(ok) sc++;
    document.querySelectorAll('.opt-btn').forEach(b=>{
        b.disabled=true;
        const id=b.querySelector('.opt-lbl').textContent.trim().toLowerCase();
        const ico=b.querySelector('.opt-ico');
        if(id===correct){b.classList.add('correct');ico.textContent='✓';}
        else if(id===chosen&&!ok){b.classList.add('wrong');ico.textContent='✗';}
    });
    const fb=document.getElementById('q-fb');
    fb.style.display='flex';
    fb.className='feedback-box '+(ok?'correct':'wrong');
    if(ok){
        fb.innerHTML=`<span style="font-size:20px">🎉</span><div><div style="font-weight:700;color:var(--accent);font-size:13px">Benar! Hebat!</div><div style="font-size:11px;color:var(--accent2)">Pertahankan terus!</div></div>`;
        confetti();
    } else {
        const corTxt=qs[qi]['pilihan_'+correct];
        fb.innerHTML=`<span style="font-size:20px">😢</span><div><div style="font-weight:700;color:var(--red);font-size:13px">Salah!</div><div style="font-size:11px;color:var(--text2)">Jawaban benar: <strong>${correct.toUpperCase()}. ${corTxt}</strong></div></div>`;
    }
    setTimeout(()=>{qi++;renderQ();},2000);
}

function lvResult() {
    tB+=sc; tS+=qs.length;
    const pct=Math.round(sc/qs.length*100);
    document.getElementById('res-ttl').textContent=`Level ${lv} Selesai!`;
    document.getElementById('res-pct').textContent=pct+'%';
    document.getElementById('res-stars').textContent=[1,2,3,4,5].map(i=>pct>=i*20?'⭐':'☆').join('');
    document.getElementById('res-det').textContent=`${sc} benar dari ${qs.length} soal`;
    const nb=document.getElementById('btn-nxt');
    const nt=document.getElementById('btn-nxt-txt');
    if(lv<5){nt.textContent=`Lanjut Level ${lv+1} →`;nb.style.display='';}
    else{nb.style.display='none';setTimeout(showFinal,400);return;}
    fetch('/kuis/simpan',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':CSRF},body:JSON.stringify({level:lv,benar:sc,total_soal:qs.length})}).catch(()=>{});
    show('sc-res'); confetti(); confetti();
}

function showFinal() {
    const pct=Math.round(tB/tS*100);
    document.getElementById('fin-pct').textContent=pct+'%';
    document.getElementById('fin-det').textContent=`${tB} benar dari ${tS} soal`;
    show('sc-fin');
    for(let i=0;i<4;i++) setTimeout(confetti,i*250);
}

function nextLevel(){startLevel(lv+1,lvColor);}
function backToLevels(){tB=0;tS=0;show('sc-lv');}
function restartAll(){tB=0;tS=0;show('sc-lv');}

function confetti(){
    const e=['🎉','⭐','✨','🌟','🏆','🎊','💚','🔥','🎈'];
    for(let i=0;i<14;i++){
        const el=document.createElement('div');
        el.className='conf';el.textContent=e[Math.floor(Math.random()*e.length)];
        el.style.left=(Math.random()*100)+'vw';
        el.style.animationDelay=(Math.random()*.8)+'s';
        el.style.fontSize=(16+Math.random()*14)+'px';
        document.body.appendChild(el);setTimeout(()=>el.remove(),2800);
    }
}

function demoQs(){return[
    {pertanyaan:'Tunjukkan angka 1!',gif_soal:'',pilihan_a:'1',pilihan_b:'2',pilihan_c:'3',pilihan_d:'4',jawaban_benar:'a'},
    {pertanyaan:'Siapa ini?',gif_soal:'',pilihan_a:'Ibu',pilihan_b:'Ayah',pilihan_c:'Kakak',pilihan_d:'Adik',jawaban_benar:'b'},
    {pertanyaan:'Nama benda ini?',gif_soal:'',pilihan_a:'Buku',pilihan_b:'Pensil',pilihan_c:'Pulpen',pilihan_d:'Penghapus',jawaban_benar:'b'},
    {pertanyaan:'Angka berapa?',gif_soal:'',pilihan_a:'5',pilihan_b:'4',pilihan_c:'6',pilihan_d:'7',jawaban_benar:'a'},
    {pertanyaan:'Isyarat ini artinya?',gif_soal:'',pilihan_a:'Selamat',pilihan_b:'Pagi',pilihan_c:'Malam',pilihan_d:'Siang',jawaban_benar:'a'},
];}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.siswa', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\final\resources\views/frontend/kuis.blade.php ENDPATH**/ ?>