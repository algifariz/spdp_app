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
    ]);
    $guru->assignRole('guru');
  }
}
