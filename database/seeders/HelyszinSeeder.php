<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Helyszin;

class HelyszinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Helyszin::create([
            "terem_szint" => '0',
            "terem_szam" => '002',
            "terem_descript" => 'Férfi Mosdó',
            "eszköz_ip" => '172.16.0.55'
        ]);
        Helyszin::create([
            "terem_szint" => '1',
            "terem_szam" => '123',
            "terem_descript" => 'Női Mosdó',
            "eszköz_ip" => '192.16.0.42'
        ]);
        Helyszin::create([
            "terem_szint" => '2',
            "terem_szam" => '245',
            "terem_descript" => 'Tanári',
            "eszköz_ip" => '192.18.0.45'
        ]);
        Helyszin::create([
            "terem_szint" => '3',
            "terem_szam" => '312',
            "terem_descript" => 'Férfi Mosdó',
            "eszköz_ip" => '172.20.0.78'
        ]);


        /*-terem_szint
          -terem_szam
          -terem_descript
          -eszköz_ip*/
    }
}
