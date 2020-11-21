<?php
use App\Pakar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PakarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pakar::create([
            "nama"  => "Owen Wattimena",
            "username" => "pakar",
            "password" => Hash::make("1234567890")
        ]);
    }
}