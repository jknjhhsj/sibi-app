<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\KontenSibi;
use App\Models\ModulProgress;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ModulController extends Controller {
    private array $modulConfig = [
        'angka'    => ['title'=>'Modul Angka',   'emoji'=>'🔢','c1'=>'#0D2B6E','c2'=>'#1A4F8B','tag'=>'21 Kartu'],
        'keluarga' => ['title'=>'Keluarga',      'emoji'=>'🫂','c1'=>'#1B4332','c2'=>'#2D6A4F','tag'=>'11 Kartu'],
        'benda'    => ['title'=>'Benda Sehari-hari','emoji'=>'📚','c1'=>'#3B1F6B','c2'=>'#6D3FC0','tag'=>'15 Kartu'],
        'sapaan'   => ['title'=>'Kata Sapaan',   'emoji'=>'👋','c1'=>'#0D2651','c2'=>'#2563B0','tag'=>'10 Kartu'],
    ];

    public function show(string $kategori) {
        if (!array_key_exists($kategori, $this->modulConfig)) abort(404);
        $konten = KontenSibi::where('kategori', $kategori)->orderBy('urutan')->get();
        $config = $this->modulConfig[$kategori];
        if (Auth::check()) {
            $user = Auth::user();
            ModulProgress::updateOrCreate(
                ['user_id'=>$user->id, 'kategori'=>$kategori],
                ['total_kartu'=>$konten->count(), 'kartu_dilihat'=>$konten->count()]
            );
            ActivityLog::create(['user_id'=>$user->id,'tipe'=>'modul','deskripsi'=>'Membuka modul '.$config['title']]);
        }
        return view('frontend.modul', compact('konten','config','kategori'));
    }
}
