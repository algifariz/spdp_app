<?php

namespace App\Http\Controllers;

use App\Models\GeneratedQR;
use App\Models\JamMengajar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GeneratedQRController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $user = User::where('id', auth()->user()->id)->first();
    $isDefaultPassword = password_verify('password', $user->password);
    $jamMengajar = JamMengajar::where('nuptk', $user->nuptk)->first();

    if ($isDefaultPassword) {
      return redirect()->route('dashboard');
    }

    if (!$jamMengajar) {
      return redirect()->route('dashboard');
    }

    $data = GeneratedQR::where('nuptk', auth()->user()->nuptk)->with('user')->orderBy('created_at', 'desc')->paginate(10);

    return view('dashboard.guru.generated-qr.index', compact('data'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store()
  {
    $jamMengajar = JamMengajar::where('nuptk', auth()->user()->nuptk)->first();
    $today = Carbon::now()->locale('id')->dayName;

    if (!$jamMengajar) {
      return redirect()->route('dashboard');
    }

    if (!in_array(strtolower($today), json_decode($jamMengajar->days))) {
      return redirect()->back()->with('error', 'Hari ini bukan hari mengajar Anda');
    }

    $generatedQR = GeneratedQR::where('nuptk', auth()->user()->nuptk)->whereDate('created_at', Carbon::now()->locale('id'))->first();

    if ($generatedQR) {
      return redirect()->back()->with('error', 'QR Code sudah dibuat hari ini, silahkan gunakan QR Code yang sudah dibuat');
    }

    $generatedQR = GeneratedQR::create([
      'nuptk' => auth()->user()->nuptk,
      'hash' => Crypt::encryptString(auth()->user()->nuptk . '-' . Carbon::now()->locale('id')->addHours(7)->format('dmY')),
      'expiry' => Carbon::now()->locale('id')->addDay()->startOfDay(),
    ]);

    if ($generatedQR) {
      return redirect()->back()->with('success', 'QR Code berhasil dibuat');
    } else {
      return redirect()->back()->with('error', 'QR Code gagal dibuat');
    }
  }
}
