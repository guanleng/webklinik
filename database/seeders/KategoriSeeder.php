<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Schema::disableForeignKeyConstraints();
        \App\Models\Kategori::truncate();
        \App\Models\Kategori::insert([
            ["nama_kategori" => "Anak"],
            ["nama_kategori" => "Ibu Hamil"],
            ["nama_kategori" => "Lansia"],
        ]);
        \Schema::enableForeignKeyConstraints();
    }
}
