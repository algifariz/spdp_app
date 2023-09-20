<?php

namespace App\Http\Controllers;

use App\Models\Tunjangan;
use Illuminate\Http\Request;

class TunjanganController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = Tunjangan::paginate(10);
    foreach ($data as $item) {
      $item->nominal = 'Rp ' . number_format($item->nominal, 0, ',', '.');
    }

    return view('dashboard.admin.tunjangan.index', compact('data'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Tunjangan $tunjangan)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Tunjangan $tunjangan)
  {
    //
  }
}
