<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::call(function(){
    $jumlah = DB::table('products')->whereDate('created_at', today())->count();

    Log::info("Hari ini ada {$jumlah} barang yang di titipkan! ");
})->dailyAt('23:00');