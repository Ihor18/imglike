<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test';


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
        $langs = App\Models\Localization::get();
        $data = [
            ['origin', 'en', 'ru'],
        ];
        foreach ($langs as $lang){
            $data[] = [$lang->origin,$lang->en,$lang->ru];
        }
        $filename = 'localization.csv';
        $f = fopen($filename, 'w');
        if ($f === false) {
            die('Error opening the file ' . $filename);
        }
        foreach ($data as $row) {
            fprintf($f, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($f, $row);
        }
        fclose($f);
    }
}
