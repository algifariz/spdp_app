<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('dashboard.guru.profile.index');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
    $validationRules = [
      'name' => 'required|string|max:255',
      'tempat_lahir' => 'required|string|max:255',
      'tanggal_lahir' => 'required|date',
      'jenis_kelamin' => 'required|in:L,P',
      'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
      'alamat' => 'required|string',
      'no_hp' => 'required|string',
    ];

    $passwordRules = [
      'current_password' => 'required|string|min:8',
      'password' => 'required|string|min:8|confirmed',
    ];

    if ($request->filled('current_password') || $request->filled('password')) {
      $validationRules = array_merge($validationRules, $passwordRules);

      if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->with('error', 'Password saat ini tidak sesuai');
      }

      $user->password = Hash::make($request->password);
    }

    $request->validate($validationRules);

    $update = $user->update([
      'name' => $request->name,
      'password' => $user->password,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'jenis_kelamin' => $request->jenis_kelamin,
      'agama' => $request->agama,
      'alamat' => $request->alamat,
      'no_hp' => $request->no_hp,
    ]);

    if ($update) {
      return redirect()->back()->with('success', 'Berhasil mengubah data');
    } else {
      return redirect()->back()->with('error', 'Gagal mengubah data');
    }
  }
}
