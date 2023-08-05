<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DownloadCuaca extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:cuaca';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ini merupakan perintah untuk mendownload data cuaca';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $list = [
            'aceh', 'babel', 'bali', 'banten', 'bengkulu', 'gorontalo', 'jakarta', 'jambi', 'jawabarat',
            'jawatengah', 'jawatimur', 'jogyakarta', 'kalbar', 'kalsel', 'kalteng', 'kaltim', 'kaluta',
            'kepriau', 'lampung', 'maluku', 'malut', 'ntb', 'ntt', 'papua', 'papuabarat', 'riau', 'sulbar',
            'sulsel', 'sulteng', 'sultenggara', 'sulut', 'sumbar', 'sumsel', 'sumut'
        ];

        // untuk melakukan truncate data atau menghapus seluruh data cuaca terlebih dahulu
        DB::table('cuaca')->truncate();

        foreach ($list as $l) {
            // untuk mendownload data cuaca dalam bentuk csv berdasarkan provinsi
            Storage::put('public/cuaca/' . $l . '.csv', file_get_contents('https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/CSV/kecamatanforecast-' . $l . '.csv'));

            // Untuk mengimport data cuaca csv ke database
            DB::unprepared('LOAD DATA LOCAL INFILE "' . storage_path('app/public/cuaca/' . $l . '.csv') . '" INTO TABLE cuaca fields terminated by ";"');
        }

        return 0;
    }
}