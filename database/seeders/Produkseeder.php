<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Produkseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Produk')->insert(
    [
        // 'nama_produk' => 'ASUS ROG ZEPHYRUS G14',
        // 'stok' => 10,
        // 'deskripsi' => 'GARANSI RESMI ASUS CENTER',
        // 'harga' => 20570000,

        // 'nama_produk' => 'ASUS X44IKB',
        // 'stok' => 10,
        // 'deskripsi' => 'GARANSI RESMI ASUS CENTER',
        // 'harga' => 100000,

        // 'nama_produk' => 'ASUS ROG STRIX G15',
        // 'stok' => 10,
        // 'deskripsi' => 'GARANSI RESMI ASUS CENTER',
        // 'harga' => 16199000,
    ]);
    }
}