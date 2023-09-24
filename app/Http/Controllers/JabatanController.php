<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = Jabatan::paginate(10);
    foreach ($data as $item) {
      $item->nominal = 'Rp ' . number_format($item->nominal, 0, ',', '.');
    }

    return view('dashboard.admin.jabatan.index', compact('data'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Jabatan $jabatan)
  {
    return view('dashboard.admin.jabatan.edit', compact('jabatan'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Jabatan $jabatan)
  {
    $request->validate([
      'nominal' => 'required|numeric',
    ]);

    $save = $jabatan->update([
      'nominal' => $request->nominal,
    ]);

    if ($save) {
      return redirect()->route('admin.jabatan.index')->with('success', 'Data Jabatan berhasil diperbarui');
    } else {
      return redirect()->route('admin.jabatan.index')->with('error', 'Data Jabatan gagal diperbarui');
    }
  }
}
