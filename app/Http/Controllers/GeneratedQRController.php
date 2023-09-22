<?php

namespace App\Http\Controllers;

use App\Models\GeneratedQR;
use App\Models\JamMengajar;
use App\Models\User;
use Illuminate\Http\Request;

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

    $data = (object) [
      'generatedQRs' => GeneratedQR::where('nuptk', auth()->user()->nuptk)->limit(10)->get(),
    ];

    return view('dashboard.guru.generated-qr.index', compact('data'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(GeneratedQR $generatedQR)
  {
    //
  }
}
