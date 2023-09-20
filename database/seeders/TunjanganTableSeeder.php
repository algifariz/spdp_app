<?php

namespace Database\Seeders;

use App\Models\Tunjangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TunjanganTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $tunjangan = [
      [
        'name' => 'TPG PNS',
        'nominal' => 100_000,
      ],
      [
        'name' => 'TPG Infasing',
        'nominal' => 200_000,
      ],
      [
        'name' => 'TPG Non Infasing',
        'nominal' => 300_000,
      ],
    ];

    foreach ($tunjangan as $key => $value) {
      Tunjangan::create($value);
    }
  }
}
