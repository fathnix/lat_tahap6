<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Throwable;

class StrukBarang implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $productData;

    /**
     * Menerima array data product dari ProductService
     */
    public function __construct(array $productData)
    {
        $this->productData = $productData;
    }

    /**
     * Eksekusi job untuk membuat file txt
     */
    public function handle(): void
    {
        // 1. Ambil data dari property array yang dikirim
        $id = $this->productData['id'];
        $nama = $this->productData['name'];
        $jumlah = $this->productData['jumlah'];
        $kategoriId = $this->productData['categori_id'];
        
        $namaFile = 'struk_produk_' . $id . '.txt';
        
        // 2. Format isi file struk
        $isiStruk  = "=== BUKTI PENAMBAHAN PRODUK ===\n";
        $isiStruk .= "ID Produk   : " . $id . "\n";
        $isiStruk .= "Nama Produk : " . $nama . "\n";
        $isiStruk .= "Jumlah      : " . $jumlah . "\n";
        $isiStruk .= "ID Kategori : " . $kategoriId . "\n";
        $isiStruk .= "Waktu       : " . now()->format('Y-m-d H:i:s') . "\n";
        $isiStruk .= "===============================\n";
        $isiStruk .= "Data berhasil disimpan di sistem.";

        // 3. Simpan file ke folder storage/app/public/
        Storage::disk('public')->put($namaFile, $isiStruk);
    }

    /**
     * (Opsional) Jika Job Gagal, akan masuk ke fungsi ini.
     * Sangat berguna untuk debugging jika queue fail.
     */
    public function failed(Throwable $exception): void
    {
        // Catat error di file storage/logs/laravel.log
        Log::error('Job StrukBarang Gagal untuk Product ID ' . ($this->productData['id'] ?? 'Unknown') . ': ' . $exception->getMessage());
    }
}