<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Helyszin;

function egyediIPcimgeneralas(&$hasznaltIPcim){
    $IPTipus = ['172', '192', '127', '168'];
    $randomIPIndex = array_rand($IPTipus);
    $randomIPA = $IPTipus[$randomIPIndex];
    $randomIP1 = random_int(2, 254);
    $randomIP2 = random_int(2, 254);
    $IPcim = "$randomIPA.$randomIP1.0.$randomIP2";

    if ($hasznaltIPcim === null) {
        $hasznaltIPcim = [];
    }

    if (in_array($IPcim, $hasznaltIPcim)) {
        return egyediIPcimgeneralas($hasznaltIPcim);
    }

    $hasznaltIPcim[] = $IPcim;

    return $IPcim;
}

class HelyszinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    
    public function run(): void
    {
        $teremTipus = ['Férfi mosdó', 'Női mosdó', 'Tanári', 'Tesi tanári', 'Tanterem', 'Szertár', 'Könyvtár', 'Labor', 'Műhely', 'Egyéb helyiség'];
        for ($i = 0; $i < 4; $i++){
        $randomteremIndex = array_rand($teremTipus);
        $randomTerem = $teremTipus[$randomteremIndex];
        $hasznaltIPcim = [];
        $egyediIPcim = egyediIPcimgeneralas($hasznaltIPcim);     
            Helyszin::create([
                "terem_szint" => random_int(0,4),
                "terem_szam" => random_int(001,350),
                "terem_descript" => $randomTerem,
                "eszköz_ip" => $egyediIPcim
            ]);
        }

        /*-terem_szint
          -terem_szam
          -terem_descript
          -eszköz_ip*/
    }
}
