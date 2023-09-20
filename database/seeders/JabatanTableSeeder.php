<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $jabatan = [
      [
        'name' => 'Kepala Madrasah',
        'nominal' => 100_000,
      ],
      [
        'name' => 'Wakil Kepala Madrasah',
        'nominal' => 200_000,
      ],
      [
        'name' => 'Wakil Kepala Bid. Kurikulum',
        'nominal' => 300_000,
      ],
      [
        'name' => 'Wakil Kepala Bid. Kesiswaan',
        'nominal' => 400_000,
      ],
      [
        'name' => 'Wakil Kepala Bid. SarPras',
        'nominal' => 500_000,
      ],
      [
        'name' => 'Wakil Kepala Bid. Humas',
        'nominal' => 600_000,
      ],
      [
        'name' => 'Kepala Perpustakaan',
        'nominal' => 700_000,
      ],
      [
        'name' => 'Kepala Lab Komputer',
        'nominal' => 800_000,
      ],
    ];

    foreach ($jabatan as $key => $value) {
      Jabatan::create($value);
    }
  }
}
