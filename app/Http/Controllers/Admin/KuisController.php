<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SoalKuis;
use App\Models\KontenSibi;
use Illuminate\Http\Request;

class KuisController extends Controller
{
    public function index(Request $request)
    {
        $soal = SoalKuis::query()
            ->when($request->kategori, fn($q, $k) => $q->where('kategori', $k))
            ->when($request->tingkat === 'mudah', fn($q) => $q->where('level', '<=', 2))
            ->when($request->tingkat === 'susah', fn($q) => $q->where('level', '>=', 3))
            ->orderBy('level')->orderBy('kategori')->orderBy('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.kuis.index', compact('soal'));
    }

    public function create()
    {
        $soal = null;
        $kontenPerKategori = $this->kontenPerKategori();
        return view('admin.kuis.create', compact('soal', 'kontenPerKategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori'      => 'required|in:angka,keluarga,benda,sapaan',
            'level'         => 'required|integer|min:1|max:5',
            'gif_soal'      => 'nullable|string|max:255',
            'pertanyaan'    => 'required|string|max:500',
            'pilihan_a'     => 'required|string|max:200',
            'pilihan_b'     => 'required|string|max:200',
            'pilihan_c'     => 'nullable|string|max:200',
            'pilihan_d'     => 'nullable|string|max:200',
            'jawaban_benar' => 'required|in:a,b,c,d',
        ]);

        SoalKuis::create($data);

        return redirect()->route('admin.kuis.index')
            ->with('success', 'Soal kuis berhasil ditambahkan!');
    }

    public function edit(SoalKuis $kui)
    {
        $soal = $kui;
        $kontenPerKategori = $this->kontenPerKategori();
        return view('admin.kuis.edit', compact('soal', 'kontenPerKategori'));
    }

    public function update(Request $request, SoalKuis $kui)
    {
        $data = $request->validate([
            'kategori'      => 'required|in:angka,keluarga,benda,sapaan',
            'level'         => 'required|integer|min:1|max:5',
            'gif_soal'      => 'nullable|string|max:255',
            'pertanyaan'    => 'required|string|max:500',
            'pilihan_a'     => 'required|string|max:200',
            'pilihan_b'     => 'required|string|max:200',
            'pilihan_c'     => 'nullable|string|max:200',
            'pilihan_d'     => 'nullable|string|max:200',
            'jawaban_benar' => 'required|in:a,b,c,d',
        ]);

        $kui->update($data);

        return redirect()->route('admin.kuis.index')
            ->with('success', 'Soal kuis berhasil diperbarui!');
    }

    public function destroy(SoalKuis $kui)
    {
        $kui->delete();
        return redirect()->route('admin.kuis.index')
            ->with('success', 'Soal kuis berhasil dihapus!');
    }

    /**
     * Ambil semua konten/modul yang sudah diupload, dikelompokkan per kategori,
     * untuk dipakai sebagai pilihan dropdown "GIF Soal" di form kuis
     * (supaya admin tidak perlu ketik path manual lagi).
     */
    private function kontenPerKategori(): array
    {
        return KontenSibi::orderBy('urutan')
            ->get(['kategori', 'judul', 'teks_sibi', 'gif_url'])
            ->groupBy('kategori')
            ->map(function ($items) {
                return $items->map(fn($i) => [
                    'judul'    => $i->judul,
                    'teks'     => $i->teks_sibi,
                    'gif_url'  => $i->gif_url,
                ])->values();
            })->toArray();
    }
}