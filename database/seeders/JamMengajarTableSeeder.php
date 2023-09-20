<?php

namespace Database\Seeders;

use App\Models\JamMengajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JamMengajarTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $data = [
      [
        'nuptk' => 'bNiQEpn487XL',
        'hour' => 12,
        'days' => json_encode(['senin', 'selasa', 'rabu']),
      ]
    ];

    foreach ($data as $key => $value) {
      JamMengajar::create($value);
    }
  }
}
