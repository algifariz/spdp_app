<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Tunjangan;
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
      $data = (object) [
        'metrics_guru' => Role::where('name', 'guru')->first()->users()->count() ?? 0,
        'metrics_jabatan' => Jabatan::count() ?? 0,
        'metrics_tunjangan' => Tunjangan::count() ?? 0,
      ];
    } else {
      $data = (object) [
        'metrics_qr' => 0,
      ];
    }

    return view('dashboard', compact('data'));
  }
}
