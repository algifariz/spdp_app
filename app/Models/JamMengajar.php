<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamMengajar extends Model
{
  use HasFactory;

  protected $table = 'jam_mengajar';

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'nuptk',
    'hour',
    'days',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'nuptk', 'nuptk');
  }
}
