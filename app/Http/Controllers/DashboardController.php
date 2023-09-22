<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\JamMengajar;
use App\Models\Tunjangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
  public function index()
  {
    $data = null;

    if (Auth::user()->hasRole('admin')) {
      $user = User::all();
      $jamMengajar = JamMengajar::all();
      $availableGuruDoesntHaveJamMengajar = $user->filter(function ($item) use ($jamMengajar) {
        return !$jamMengajar->pluck('nuptk')->contains($item->nuptk) && !$item->hasRole('admin');
      });

      $data = (object) [
        'metrics_guru' => Role::where('name', 'guru')->first()->users()->count() ?? 0,
        'metrics_jabatan' => Jabatan::count() ?? 0,
        'metrics_tunjangan' => Tunjangan::count() ?? 0,
      ];

      if ($availableGuruDoesntHaveJamMengajar->count() > 0) {
        $data->availableGuruDoesntHaveJamMengajar = $availableGuruDoesntHaveJamMengajar->count();
      }
    } else {
      $user = User::where('id', Auth::user()->id)->first();

      $data = (object) [
        'metrics_qr' => 0,
        'is_default_password' => password_verify('password', $user->password) ? true : false,
      ];
    }

    return view('dashboard', compact('data'));
  }
}
