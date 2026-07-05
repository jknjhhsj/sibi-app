<?php

namespace Database\Seeders;

use App\Models\KontenSibi;
use App\Models\SoalKuis;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin ──────────────────────────────────────────────
        $this->call([AdminSeeder::class]);

        // ── Konten Angka 0–20 ──────────────────────────────────
        $this->command->info('🔢 Seeding data angka...');
        $angka = [
            ['0','NOL','Kosong'],              ['1','SATU','Satu'],
            ['2','DUA','Dua'],                 ['3','TIGA','Tige'],
            ['4','EMPAT','Empat'],             ['5','LIMA','Lime'],
            ['6','ENAM','Enam'],               ['7','TUJUH','Tujuh'],
            ['8','DELAPAN','Delapan'],         ['9','SEMBILAN','Sembilan'],
            ['10','SEPULUH','Sepuluh'],        ['11','SEBELAS','Sebelas'],
            ['12','DUA BELAS','Dua Belas'],    ['13','TIGA BELAS','Tige Belas'],
            ['14','EMPAT BELAS','Empat Belas'],['15','LIMA BELAS','Lime Belas'],
            ['16','ENAM BELAS','Enam Belas'],  ['17','TUJUH BELAS','Tujuh Belas'],
            ['18','DELAPAN BELAS','Delapan Belas'],
            ['19','SEMBILAN BELAS','Sembilan Belas'],
            ['20','DUA PULUH','Dua Puluh'],
        ];
        foreach ($angka as $i => $a) {
            KontenSibi::firstOrCreate(
                ['kategori' => 'angka', 'judul' => $a[0]],
                ['teks_sibi' => $a[1], 'teks_belinyu' => $a[2],
                 'gif_url' => '/assets/gifs/angka/angka-'.$i.'.gif', 'urutan' => $i]
            );
        }

        // ── Konten Keluarga ────────────────────────────────────
        $this->command->info('👨‍👩‍👧‍👦 Seeding data keluarga...');
        $keluarga = [
            ['Ayah','AYAH','Bapak','ayah'],
            ['Ibu','IBU','Mak','ibu'],
            ['Kakak Laki-laki','KAKAK LAKI-LAKI','Kakak Laki','kakak-laki'],
            ['Kakak Perempuan','KAKAK PEREMPUAN','Kakak Betine','kakak-perempuan'],
            ['Adik Laki-laki','ADIK LAKI-LAKI','Adik Laki','adik-laki'],
            ['Adik Perempuan','ADIK PEREMPUAN','Adik Betine','adik-perempuan'],
            ['Kakek','KAKEK','Akek','kakek'],
            ['Nenek','NENEK','Inek','nenek'],
            ['Paman','PAMAN','Pak Ude','paman'],
            ['Bibi','BIBI','Mak Ude','bibi'],
        ];
        foreach ($keluarga as $i => $k) {
            KontenSibi::firstOrCreate(
                ['kategori' => 'keluarga', 'judul' => $k[0]],
                ['teks_sibi' => $k[1], 'teks_belinyu' => $k[2],
                 'gif_url' => '/assets/gifs/keluarga/'.$k[3].'.gif', 'urutan' => $i]
            );
        }

        // ── Konten Benda Sekolah ───────────────────────────────
        $this->command->info('📚 Seeding data benda sekolah...');
        $benda = [
            ['Pensil','PENSIL','Pensil','pensil'],
            ['Pulpen','PULPEN','Pulpen','pulpen'],
            ['Buku','BUKU','Buku','buku'],
            ['Penghapus','PENGHAPUS','Penghapus','penghapus'],
            ['Penggaris','PENGGARIS','Mistar','penggaris'],
            ['Tas','TAS','Tas','tas'],
            ['Meja','MEJA','Meje','meja'],
            ['Kursi','KURSI','Kursi','kursi'],
            ['Papan Tulis','PAPAN TULIS','Papan Tulis','papan-tulis'],
            ['Spidol','SPIDOL','Spidol','spidol'],
            ['Krayon','KRAYON','Krayon','krayon'],
            ['Gunting','GUNTING','Gunting','gunting'],
            ['Lem','LEM','Lem','lem'],
            ['Tempat Pensil','TEMPAT PENSIL','Tempat Pensil','tempat-pensil'],
            ['Kertas','KERTAS','Kertas','kertas'],
        ];
        foreach ($benda as $i => $b) {
            KontenSibi::firstOrCreate(
                ['kategori' => 'benda', 'judul' => $b[0]],
                ['teks_sibi' => $b[1], 'teks_belinyu' => $b[2],
                 'gif_url' => '/assets/gifs/benda/'.$b[3].'.gif', 'urutan' => $i]
            );
        }

        // ── Konten Sapaan ──────────────────────────────────────
        $this->command->info('👋 Seeding data sapaan...');
        $sapaan = [
            ['Selamat Pagi','SELAMAT PAGI','Selamat Pagi','pagi'],
            ['Selamat Siang','SELAMAT SIANG','Selamat Siang','siang'],
            ['Selamat Sore','SELAMAT SORE','Selamat Sore','sore'],
            ['Selamat Malam','SELAMAT MALAM','Selamat Malam','malam'],
            ['Halo','HALO','Halo','halo'],
            ['Terima Kasih','TERIMA KASIH','Makasih','terima-kasih'],
            ['Maaf','MAAF','Maaf','maaf'],
            ['Permisi','PERMISI','Permisi','permisi'],
            ['Sampai Jumpa','SAMPAI JUMPA','Sampai Ketemu','sampai-jumpa'],
            ['Apa Kabar','APA KABAR','Kemane Kabar','apa-kabar'],
        ];
        foreach ($sapaan as $i => $s) {
            KontenSibi::firstOrCreate(
                ['kategori' => 'sapaan', 'judul' => $s[0]],
                ['teks_sibi' => $s[1], 'teks_belinyu' => $s[2],
                 'gif_url' => '/assets/gifs/sapaan/'.$s[3].'.gif', 'urutan' => $i]
            );
        }

        // ── Soal Kuis Level 1–5 ────────────────────────────────
        $this->command->info('🏆 Seeding data soal kuis...');
        $soals = [
            // Level 1 — Mudah (5 soal)
            [1,'angka','/assets/gifs/kuis/q1.gif','Tunjukkan angka 1 dalam SIBI!','1','2','3','a'],
            [1,'keluarga','/assets/gifs/kuis/q2.gif','Siapa ini?','Ibu','Ayah','Kakak','b'],
            [1,'benda','/assets/gifs/kuis/q3.gif','Apa nama benda ini?','Buku','Pensil','Pulpen','b'],
            [1,'sapaan','/assets/gifs/kuis/q4.gif','Kata sapaan apa ini?','Selamat Siang','Selamat Pagi','Selamat Malam','b'],
            [1,'angka','/assets/gifs/kuis/q5.gif','Angka berapa ini?','5','4','6','a'],
            // Level 2 — Sedang (6 soal)
            [2,'angka','/assets/gifs/kuis/q6.gif','Tunjukkan angka 10!','9','10','11','b'],
            [2,'keluarga','/assets/gifs/kuis/q7.gif','Siapa anggota keluarga ini?','Nenek','Kakek','Paman','a'],
            [2,'benda','/assets/gifs/kuis/q8.gif','Apa ini?','Meja','Kursi','Papan Tulis','c'],
            [2,'sapaan','/assets/gifs/kuis/q9.gif','Sapaan apa ini?','Maaf','Terima Kasih','Permisi','b'],
            [2,'angka','/assets/gifs/kuis/q10.gif','Berapa hasil 7 + 3?','9','10','11','b'],
            [2,'benda','/assets/gifs/kuis/q11.gif','Alat tulis apa ini?','Spidol','Krayon','Pensil','a'],
            // Level 3 — Menantang (7 soal)
            [3,'angka','/assets/gifs/kuis/q12.gif','Angka berapa ini?','15','16','17','b'],
            [3,'keluarga','/assets/gifs/kuis/q13.gif','Siapa ini?','Adik Perempuan','Kakak Perempuan','Bibi','c'],
            [3,'benda','/assets/gifs/kuis/q14.gif','Apa nama benda ini?','Gunting','Lem','Penghapus','a'],
            [3,'sapaan','/assets/gifs/kuis/q15.gif','Ucapan apa ini?','Sampai Jumpa','Apa Kabar','Halo','b'],
            [3,'angka','/assets/gifs/kuis/q16.gif','Berapa 5 × 4?','20','18','24','a'],
            [3,'benda','/assets/gifs/kuis/q17.gif','Apa ini?','Tempat Pensil','Tas','Penggaris','c'],
            [3,'keluarga','/assets/gifs/kuis/q18.gif','Siapa ini?','Paman','Kakek','Ayah','b'],
            // Level 4 — Sulit (6 soal)
            [4,'angka','/assets/gifs/kuis/q19.gif','Angka berapa ini?','18','19','20','c'],
            [4,'sapaan','/assets/gifs/kuis/q20.gif','Sapaan apa ini?','Apa Kabar','Selamat Sore','Permisi','b'],
            [4,'keluarga','/assets/gifs/kuis/q21.gif','Siapa ini?','Adik Laki-laki','Kakak Laki-laki','Paman','a'],
            [4,'benda','/assets/gifs/kuis/q22.gif','Benda apa ini?','Kertas','Buku','Spidol','c'],
            [4,'angka','/assets/gifs/kuis/q23.gif','Berapa 12 + 8?','18','20','22','b'],
            [4,'sapaan','/assets/gifs/kuis/q24.gif','Ucapan apa ini?','Halo','Maaf','Sampai Jumpa','c'],
            // Level 5 — Ahli (6 soal)
            [5,'angka','/assets/gifs/kuis/q25.gif','Berapa 20 − 7?','11','13','15','b'],
            [5,'keluarga','/assets/gifs/kuis/q26.gif','Siapa ini?','Nenek','Bibi','Ibu','a'],
            [5,'benda','/assets/gifs/kuis/q27.gif','Alat ini digunakan untuk?','Krayon','Lem','Gunting','c'],
            [5,'sapaan','/assets/gifs/kuis/q28.gif','Kalimat sapaan apa ini?','Selamat Pagi','Apa Kabar','Terima Kasih','b'],
            [5,'angka','/assets/gifs/kuis/q29.gif','Berapa 6 × 3?','16','18','21','b'],
            [5,'keluarga','/assets/gifs/kuis/q30.gif','Siapa ini?','Kakak Perempuan','Adik Perempuan','Nenek','a'],
        ];
        foreach ($soals as $s) {
            SoalKuis::firstOrCreate(
                ['level' => $s[0], 'pertanyaan' => $s[3]],
                ['kategori' => $s[1], 'gif_soal' => $s[2],
                 'pilihan_a' => $s[4], 'pilihan_b' => $s[5],
                 'pilihan_c' => $s[6], 'jawaban_benar' => $s[7]]
            );
        }

        $this->command->info('');
        $this->command->info('✅ Semua data berhasil di-seed!');
        $this->command->info('   21 angka | 10 keluarga | 15 benda | 10 sapaan | 30 soal kuis');
    }
}
