<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $admin = \App\Models\User::create([
      'name' => 'Admin',
      'email' => 'admin@gmail.com',
      'password' => bcrypt('password'),
    ]);
    $admin->assignRole('admin');

    $guru = \App\Models\User::create([
      'name' => 'Guru',
      'email' => 'guru@gmail.com',
      'password' => bcrypt('password'),
      'nuptk' => 'bNiQEpn487XL',
      'tempat_lahir' => 'Sukabumi',
      'tanggal_lahir' => '2000-08-30',
      'jenis_kelamin' => 'L',
      'agama' => 'Islam',
      'alamat' => 'Jl. Raya Sukabumi',
      'no_hp' => '081234567890',
      'jabatan_id' => 1,
      'tunjangan_id' => 1,
    ]);
    $guru->assignRole('guru');
  }
}
