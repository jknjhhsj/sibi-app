<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HasilKuisSibi;
use App\Models\ActivityLog;
use App\Models\SoalKuis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuisController extends Controller
{
    public function index()
    {
        return view('frontend.kuis');
    }

    public function soal(int $level)
    {
        if ($level < 1 || $level > 5) abort(404);

        $soals = SoalKuis::where('level', $level)->get();

        return response()->json($soals->map(fn($s) => [
            'id'            => $s->id,
            'pertanyaan'    => $s->pertanyaan,
            'gif_soal'      => $s->gif_soal,
            'pilihan_a'     => $s->pilihan_a,
            'pilihan_b'     => $s->pilihan_b,
            'pilihan_c'     => $s->pilihan_c,
            'pilihan_d'     => $s->pilihan_d,
            'jawaban_benar' => $s->jawaban_benar,
        ]));
    }

    public function simpan(Request $request)
    {
        // Support JSON body dari fetch() di blade
        $data = $request->json()->all() ?: $request->all();

        $level     = (int) ($data['level']      ?? 0);
        $benar     = (int) ($data['benar']       ?? 0);
        $totalSoal = (int) ($data['total_soal']  ?? 1);

        if ($level < 1 || $level > 5 || $totalSoal < 1) {
            return response()->json(['error' => 'Data tidak valid.'], 422);
        }

        $skor = (int) round(($benar / $totalSoal) * 100);

        if (Auth::check()) {
            HasilKuisSibi::create([
                'user_id'    => Auth::id(),
                'level'      => $level,
                'skor'       => $skor,
                'benar'      => $benar,
                'total_soal' => $totalSoal,
            ]);
            ActivityLog::create([
                'user_id'    => Auth::id(),
                'tipe'       => 'kuis',
                'deskripsi'  => 'Menyelesaikan Kuis Level '.$level.' dengan skor '.$skor.'%',
            ]);
        }

        return response()->json(['skor' => $skor, 'message' => 'Hasil disimpan!']);
    }
}
