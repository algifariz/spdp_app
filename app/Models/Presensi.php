<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
  use HasFactory;

  protected $table = 'presensi';

  protected $fillable = [
    'nuptk',
    'date',
    'time_in',
    'time_out',
  ];

  protected $casts = [
    'date' => 'date',
    'time_in' => 'datetime:H:i:s',
    'time_out' => 'datetime:H:i:s',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'nuptk', 'nuptk');
  }
}
