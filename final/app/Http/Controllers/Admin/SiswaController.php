<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{User, HasilKuisSibi, ModulProgress, ActivityLog, KontenSibi};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller {
    public function index() {
        $siswa = User::where('role','siswa')
            ->withSum('hasilKuis as total_skor','skor')
            ->withCount('hasilKuis as total_kuis')
            ->latest()->paginate(15);

        // Stat kosakata per kategori
        $kosakata = [
            'angka'    => KontenSibi::where('kategori','angka')->count(),
            'keluarga' => KontenSibi::where('kategori','keluarga')->count(),
            'benda'    => KontenSibi::where('kategori','benda')->count(),
            'sapaan'   => KontenSibi::where('kategori','sapaan')->count(),
        ];
        $totalKosakata = array_sum($kosakata);

        // Distribusi kelas
        $kelasDist = User::where('role','siswa')
            ->select('kelas', DB::raw('count(*) as jml'))
            ->groupBy('kelas')
            ->orderBy('kelas')
            ->get();

        return view('admin.siswa.index', compact('siswa','kosakata','totalKosakata','kelasDist'));
    }

    public function show(User $user) {
        if ($user->role === 'admin') abort(403);

        $hasilKuis     = HasilKuisSibi::where('user_id',$user->id)->orderBy('level')->get();
        $modulProgress = ModulProgress::where('user_id',$user->id)->get()->keyBy('kategori');
        $activityLogs  = ActivityLog::where('user_id',$user->id)->latest()->take(20)->get();
        $totalSkor     = $hasilKuis->sum('skor');
        $levelTercapai = $hasilKuis->max('level') ?? 0;

        $bulanLabels = [];
        $skorBulanan = [];
        $kuisBulanan = [];
        $aktivitasBulanan = [];

        for ($i = 11; $i >= 0; $i--) {
            $tgl = now()->subMonths($i);
            $bulanLabels[] = $tgl->translatedFormat('M Y');
            $skorBulanan[] = (int) HasilKuisSibi::where('user_id', $user->id)
                ->whereYear('created_at', $tgl->year)
                ->whereMonth('created_at', $tgl->month)
                ->avg('skor') ?? 0;
            $kuisBulanan[] = HasilKuisSibi::where('user_id', $user->id)
                ->whereYear('created_at', $tgl->year)
                ->whereMonth('created_at', $tgl->month)
                ->count();
            $aktivitasBulanan[] = ActivityLog::where('user_id', $user->id)
                ->whereYear('created_at', $tgl->year)
                ->whereMonth('created_at', $tgl->month)
                ->count();
        }

        $kategoriProgress = [];
        foreach (['angka','keluarga','benda','sapaan'] as $kat) {
            $mp = $modulProgress->get($kat);
            $kategoriProgress[$kat] = [
                'seen'  => $mp?->kartu_dilihat ?? 0,
                'total' => $mp?->total_kartu ?? 0,
                'pct'   => ($mp && $mp->total_kartu > 0) ? round($mp->kartu_dilihat / $mp->total_kartu * 100) : 0,
            ];
        }

        return view('admin.siswa.show', compact(
            'user','hasilKuis','modulProgress','activityLogs',
            'totalSkor','levelTercapai',
            'bulanLabels','skorBulanan','kuisBulanan','aktivitasBulanan',
            'kategoriProgress'
        ));
    }

    public function destroy(User $user) {
        if ($user->role === 'admin') abort(403);
        $user->delete();
        return back()->with('success','Siswa berhasil dihapus!');
    }

    public function toggleStatus(User $user) {
        $user->status = $user->status === 'aktif' ? 'nonaktif' : 'aktif';
        $user->save();
        return back()->with('success','Status siswa diperbarui!');
    }
}
