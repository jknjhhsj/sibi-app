@extends('layouts.admin')
@section('title','Soal Kuis')
@section('page-title','Soal Kuis')
@section('page-subtitle','Kelola bank soal kuis SIBI')

@section('content')

{{-- TOOLBAR --}}
<div style="display:flex;flex-wrap:wrap;align-items:center;gap:10px;margin-bottom:20px">
    <div style="display:flex;flex-wrap:wrap;gap:7px">
        @foreach([
            '' =>        ['Semua',    '🗂️'],
            'angka' =>   ['Angka',    '🔢'],
            'keluarga'=> ['Keluarga', '🫂'],
            'benda' =>   ['Benda',    '📚'],
            'sapaan'=>   ['Sapaan',   '👋'],
        ] as $k => [$lbl, $em])
        <a href="{{ route('admin.kuis.index') }}{{ $k ? '?kategori='.$k : '' }}"
           class="{{ request('kategori') === $k ? 'btn btn-green' : 'btn' }}"
           style="font-size:12px;padding:7px 14px;gap:5px">
            {{ $em }} {{ $lbl }}
        </a>
        @endforeach
    </div>
    <a href="{{ route('admin.kuis.create') }}"
       class="btn btn-green" style="margin-left:auto;font-size:13px;padding:9px 18px">
        <i class="fas fa-plus" style="font-size:11px"></i> Tambah Soal
    </a>
</div>

{{-- TABLE CARD --}}
<div class="adm-card">
    <div style="padding:14px 18px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between">
        <div style="display:flex;align-items:center;gap:10px">
            <div style="width:34px;height:34px;background:var(--yellow-light);border-radius:9px;display:flex;align-items:center;justify-content:center">
                <i class="fas fa-trophy" style="color:var(--yellow);font-size:14px"></i>
            </div>
            <div>
                <div style="font-family:'Outfit',sans-serif;font-size:14px;font-weight:700;color:var(--text)">
                    Bank Soal Kuis
                    @if(request('kategori'))
                        — {{ ucfirst(request('kategori')) }}
                    @endif
                </div>
                <div style="font-size:11px;color:var(--text3)">
                    {{ method_exists($soal,'total') ? $soal->total() : $soal->count() }} total soal
                </div>
            </div>
        </div>
    </div>

    <div style="overflow-x:auto">
        <table class="tbl" style="min-width:680px">
            <thead><tr>
                @foreach(['Level','Kategori','Pertanyaan','Pilihan A','Pilihan B','Pilihan C','Jawaban','Aksi'] as $h)
                <th>{{ $h }}</th>
                @endforeach
            </tr></thead>
            <tbody>
            @forelse($soal as $s)
            @php
            $catCfg = [
                'angka'    => ['#E6F4ED', '#1B6B45', '🔢'],
                'keluarga' => ['#EBF5FB', '#2471A3', '🫂'],
                'benda'    => ['#F4ECF7', '#7D3C98', '📚'],
                'sapaan'   => ['#FEF9E7', '#D68910', '👋'],
            ];
            [$cbg, $ccol, $cem] = $catCfg[$s->kategori] ?? ['#F3F4F6', '#6B7280', '❓'];
            @endphp
            <tr>
                <td>
                    <span class="badge" style="background:var(--yellow-light);color:var(--yellow);border:1px solid #FDE68A">
                        Lv.{{ $s->level }}
                    </span>
                </td>
                <td>
                    <span class="badge" style="background:{{ $cbg }};color:{{ $ccol }}">
                        {{ $cem }} {{ ucfirst($s->kategori) }}
                    </span>
                </td>
                <td style="font-weight:600;color:var(--text);max-width:200px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                    {{ $s->pertanyaan }}
                </td>
                <td style="color:var(--text2);font-size:12px;max-width:90px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $s->pilihan_a }}</td>
                <td style="color:var(--text2);font-size:12px;max-width:90px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $s->pilihan_b }}</td>
                <td style="color:var(--text2);font-size:12px;max-width:90px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $s->pilihan_c }}</td>
                <td>
                    <span class="badge" style="background:var(--accent-light);color:var(--accent);border:1px solid var(--accent-light2);font-size:13px;font-weight:800">
                        {{ strtoupper($s->jawaban_benar) }}
                    </span>
                </td>
                <td>
                    <div style="display:flex;align-items:center;gap:8px">
                        <a href="{{ route('admin.kuis.edit', $s) }}" class="btn-s" style="font-size:12px;padding:6px 12px">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.kuis.destroy', $s) }}"
                              onsubmit="return confirm('Hapus soal ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-s" style="font-size:12px;padding:6px 10px;color:var(--red);border-color:rgba(220,38,38,.25);background:var(--red-light)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="padding:60px;text-align:center">
                    <div style="width:60px;height:60px;background:var(--bg);border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;font-size:24px">❓</div>
                    <div style="font-family:'Outfit',sans-serif;font-size:16px;font-weight:700;color:var(--text);margin-bottom:5px">Belum Ada Soal</div>
                    <div style="font-size:13px;color:var(--text3);margin-bottom:16px">Tambahkan soal kuis pertama untuk bank soal ini.</div>
                    <a href="{{ route('admin.kuis.create') }}" class="btn-p" style="font-size:13px">
                        <i class="fas fa-plus"></i> Tambah Soal
                    </a>
                </td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($soal, 'hasPages') && $soal->hasPages())
    <div style="padding:14px 20px;border-top:1px solid var(--border)">
        {{ $soal->links() }}
    </div>
    @endif
</div>

@endsection
