<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class GuruController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = Role::where('name', 'guru')->first()->users()->with('jabatan', 'tunjangan')->paginate(10);

    return view('dashboard.admin.guru.index', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
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
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $delete = $user->delete();

    if ($delete) {
      return redirect()->route('admin.guru.index')->with('success', 'Data Guru berhasil dihapus');
    } else {
      return redirect()->route('admin.guru.index')->with('error', 'Data Guru gagal dihapus');
    }
  }
}
