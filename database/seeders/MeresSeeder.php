<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meres;

class MeresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meres::create([
            "h_id" => random_int(1,4),
            "ppm" => random_int(100,1000),
            "homerseklet" => random_int(20,30),
            "paratartalom" => random_int(10,100),
            "hibakod" => random_int(0,5),
            "meres_ideje" => date("Y-m-d H:i:s")
        ]);
        Meres::create([
            "h_id" => random_int(1,4),
            "ppm" => random_int(100,1000),
            "homerseklet" => random_int(20,30),
            "paratartalom" => random_int(10,100),
            "hibakod" => random_int(0,5),
            "meres_ideje" => date("Y-m-d H:i:s")
        ]);
        Meres::create([
            "h_id" => random_int(1,4),
            "ppm" => random_int(100,1000),
            "homerseklet" => random_int(20,30),
            "paratartalom" => random_int(10,100),
            "hibakod" => random_int(0,5),
            "meres_ideje" => date("Y-m-d H:i:s")
        ]);
        Meres::create([
            "h_id" => random_int(1,4),
            "ppm" => random_int(100,1000),
            "homerseklet" => random_int(20,30),
            "paratartalom" => random_int(10,100),
            "hibakod" => random_int(0,5),
            "meres_ideje" => date("Y-m-d H:i:s")
        ]);

        /*-h_id
        -ppm
        -homerseklet
        -paratartalom
        -hibakod
        -meres_ideje*/
    }
}
