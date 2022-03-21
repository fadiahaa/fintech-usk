<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Role;
use App\Models\Saldo;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(["name" => "Administrator"]);
        $bank = Role::create(["name" => "Bank"]);
        $canteen = Role::create(["name" => "Canteen"]);
        $student = Role::create(["name" => "Student"]);

        User::create([
            "name" => "Fadiah",
            "email" => "fadiah@gmail.com",
            "password" => Hash::make("fadiah"),
            "role_id" => $admin->id
        ]);

        User::create([
            "name" => "Ira",
            "email" => "ira@gmail.com",
            "password" => Hash::make("ira"),
            "role_id" => $bank->id
        ]);

        User::create([
            "name" => "Nursyda",
            "email" => "nusryfa@gmail.com",
            "password" => Hash::make("nursyfa"),
            "role_id" => $canteen->id
        ]);

        $septy = User::create([
            "name" => "Septy",
            "email" => "septy@gmail.com",
            "password" => Hash::make("septy"),
            "role_id" => $student->id
        ]);

        $nasgor = Barang::create([
            "name" => "Nasi Goreng",
            "price" => 7000,
            "stock" => 10,
            "desc" => "Nasi goreng + telur"
        ]);

        $basreng = Barang::create([
            "name" => "Basreng",
            "price" => 2000,
            "stock" => 15,
            "desc" => "Bakso goreng"
        ]);

        $burger = Barang::create([
            "name" => "Burger",
            "price" => 6000,
            "stock" => 13,
            "desc" => "Roti + daging + sayur"
        ]);

        $oasis = Barang::create([
            "name" => "Oasis",
            "price" => 2000,
            "stock" => 10,
            "desc" => "Air mineral"
        ]);

        $pucuk = Barang::create([
            "name" => "Teh Pucuk",
            "price" => 3500,
            "stock" => 10,
            "desc" => "Minuman teh"
        ]);

        Saldo::create([
            "user_id" => $septy->id,
            "saldo" => 30000
        ]);

        //Isi Saldo
        Transaksi::create([
            "user_id" => $septy->id,
            "barang_id" => null,
            "jumlah" => 50000,
            "invoice_id" => "SAL_001",
            "type" => 1,
            "status" => 3
        ]);

        //Belanja
        // Transaksi::create([
        //     "user_id" => $wahyu->id,
        //     "barang_id" => $burger->id,
        //     "jumlah" => 2,
        //     "invoice_id" => "INV_001",
        //     "type" => 2,
        //     "status" => 1
        // ]);

        // Transaksi::create([
        //     "user_id" => $wahyu->id,
        //     "barang_id" => $oasis->id,
        //     "jumlah" => 2,
        //     "invoice_id" => "INV_001",
        //     "type" => 2,
        //     "status" => 1
        // ]);
    }
}
