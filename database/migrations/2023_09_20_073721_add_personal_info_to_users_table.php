<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('users', function (Blueprint $table) {
      $table->string('nuptk')
        ->nullable()
        ->unique()
        ->comment('NUPTK');
      $table->string('tempat_lahir')
        ->nullable()
        ->comment('Tempat lahir');
      $table->date('tanggal_lahir')
        ->nullable()
        ->comment('Tanggal lahir');
      $table->enum('jenis_kelamin', ['L', 'P'])
        ->nullable()
        ->comment('Jenis kelamin');
      $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'])
        ->nullable()
        ->comment('Agama');
      $table->text('alamat')
        ->nullable()
        ->comment('Alamat');
      $table->string('no_hp')
        ->nullable()
        ->comment('No. HP');
      $table->foreignId('jabatan_id')
        ->nullable()
        ->comment('Jabatan');
      $table->foreignId('tunjangan_id')
        ->nullable()
        ->comment('Tunjangan');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn([
        'nuptk',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'no_hp',
        'jabatan_id',
        'tunjangan_id',
      ]);
    });
  }
};
