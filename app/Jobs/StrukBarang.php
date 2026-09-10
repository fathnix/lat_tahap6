<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class StrukBarang implements ShouldQueue
{
    use Queueable;
    protected $dataTitipan;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(3);

        // 2. Logika membuat file teks (struk)
        $namaFile = 'struk_' . $this->dataTitipan['id'] . '.txt';
        $isiStruk = "=== BUKTI PENITIPAN MASJID ===\n";
        $isiStruk .= "ID Titipan: " . $this->dataTitipan['id'] . "\n";
        $isiStruk .= "Barang: " . $this->dataTitipan['nama_barang'] . "\n";
        $isiStruk .= "Pemilik: " . $this->dataTitipan['nama_pemilik'] . "\n";
        $isiStruk .= "Terima kasih!";

        // Simpan file ke folder storage/app/
        // Storage::put($namaFile, $isiStruk);
    }
}
