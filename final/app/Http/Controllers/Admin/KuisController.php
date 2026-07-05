<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SoalKuis;
use Illuminate\Http\Request;

class KuisController extends Controller
{
    public function index(Request $request)
    {
        $soal = SoalKuis::query()
            ->when($request->kategori, fn($q, $k) => $q->where('kategori', $k))
            ->orderBy('level')->orderBy('kategori')->orderBy('id')
            ->paginate(20);

        return view('admin.kuis.index', compact('soal'));
    }

    public function create()
    {
        $soal = null;
        return view('admin.kuis.create', compact('soal'));
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
        return view('admin.kuis.edit', compact('soal'));
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
}
