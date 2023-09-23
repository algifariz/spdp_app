<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedQR extends Model
{
  use HasFactory;

  protected $table = 'generated_qr';

  protected $fillable = [
    'nuptk',
    'hash',
    'expiry',
  ];

  protected $casts = [
    'expiry' => 'datetime',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'nuptk', 'nuptk');
  }
}
