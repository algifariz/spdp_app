<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
  use HasFactory;

  protected $table = 'jabatan';

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'nominal'
  ];

  public function user()
  {
    return $this->hasOne(User::class);
  }
}
