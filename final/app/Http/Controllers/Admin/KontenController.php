<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontenSibi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KontenController extends Controller
{
    public function index()
    {
        $konten = KontenSibi::when(request('kategori'), fn($q, $k) => $q->where('kategori', $k))
                            ->orderBy('kategori')->orderBy('urutan')->paginate(20);
        return view('admin.konten.index', compact('konten'));
    }

    public function create()
    {
        return view('admin.konten.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori'     => 'required|in:angka,keluarga,benda,sapaan',
            'judul'        => 'required|string|max:100',
            'teks_sibi'    => 'required|string|max:100',
            'teks_belinyu' => 'nullable|string|max:100',
            'media_file'   => 'nullable|file|mimes:gif,mp4,webm,mov|max:20480',
            'urutan'       => 'nullable|integer|min:0',
        ]);

        $gif_url = null;

        if ($request->hasFile('media_file')) {
            $file     = $request->file('media_file');
            $kategori = $request->input('kategori');
            $ext      = strtolower($file->getClientOriginalExtension());
            $filename = \Str::slug($request->input('judul')) . '-' . time() . '.' . $ext;
            $file->move(public_path("assets/gifs/{$kategori}"), $filename);
            $gif_url = "assets/gifs/{$kategori}/{$filename}";
        }

        KontenSibi::create([
            'kategori'     => $request->kategori,
            'judul'        => $request->judul,
            'teks_sibi'    => $request->teks_sibi,
            'teks_belinyu' => $request->teks_belinyu,
            'gif_url'      => $gif_url,
            'urutan'       => $request->urutan ?? 0,
        ]);

        return redirect()->route('admin.konten.index')
                         ->with('success', 'Konten berhasil ditambahkan!');
    }

    public function edit(KontenSibi $konten)
    {
        return view('admin.konten.edit', compact('konten'));
    }

    public function update(Request $request, KontenSibi $konten)
    {
        $request->validate([
            'kategori'     => 'required|in:angka,keluarga,benda,sapaan',
            'judul'        => 'required|string|max:100',
            'teks_sibi'    => 'required|string|max:100',
            'teks_belinyu' => 'nullable|string|max:100',
            'media_file'   => 'nullable|file|mimes:gif,mp4,webm,mov|max:20480',
            'urutan'       => 'nullable|integer|min:0',
        ]);

        $gif_url = $konten->gif_url; // tetap pakai yang lama kalau tidak upload baru

        if ($request->hasFile('media_file')) {
            // hapus file lama kalau ada
            if ($konten->gif_url && file_exists(public_path($konten->gif_url))) {
                @unlink(public_path($konten->gif_url));
            }
            $file     = $request->file('media_file');
            $kategori = $request->input('kategori');
            $ext      = strtolower($file->getClientOriginalExtension());
            $filename = \Str::slug($request->input('judul')) . '-' . time() . '.' . $ext;
            $file->move(public_path("assets/gifs/{$kategori}"), $filename);
            $gif_url  = "assets/gifs/{$kategori}/{$filename}";
        }

        $konten->update([
            'kategori'     => $request->kategori,
            'judul'        => $request->judul,
            'teks_sibi'    => $request->teks_sibi,
            'teks_belinyu' => $request->teks_belinyu,
            'gif_url'      => $gif_url,
            'urutan'       => $request->urutan ?? 0,
        ]);

        return redirect()->route('admin.konten.index')
                         ->with('success', 'Konten berhasil diperbarui!');
    }

    public function destroy(KontenSibi $konten)
    {
        // hapus file media juga kalau ada
        if ($konten->gif_url && file_exists(public_path($konten->gif_url))) {
            @unlink(public_path($konten->gif_url));
        }
        $konten->delete();
        return redirect()->route('admin.konten.index')
                         ->with('success', 'Konten berhasil dihapus!');
    }
}
