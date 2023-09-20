<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Tunjangan;
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
    $data = (object) [
      'jabatan' => Jabatan::all(),
      'tunjangan' => Tunjangan::all(),
    ];

    return view('dashboard.admin.guru.create', compact('data'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string',
      'email' => 'required|email|unique:users,email',
      'nuptk' => 'required|string|unique:users,nuptk',
      'tempat_lahir' => 'required|string',
      'tanggal_lahir' => 'required|date',
      'jenis_kelamin' => 'required|in:L,P',
      'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
      'alamat' => 'required|string',
      'no_hp' => 'required|string',
      'jabatan_id' => 'required|exists:jabatan,id',
      'tunjangan_id' => 'required|exists:tunjangan,id',
    ]);

    $save = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'nuptk' => $request->nuptk,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'jenis_kelamin' => $request->jenis_kelamin,
      'agama' => $request->agama,
      'alamat' => $request->alamat,
      'no_hp' => $request->no_hp,
      'jabatan_id' => $request->jabatan_id,
      'tunjangan_id' => $request->tunjangan_id,
      'password' => bcrypt('password'),
    ]);

    if ($save) {
      $save->assignRole('guru');

      return redirect()->route('admin.guru.index')->with('success', 'Data Guru berhasil ditambahkan');
    } else {
      return redirect()->route('admin.guru.index')->with('error', 'Data Guru gagal ditambahkan');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return view('dashboard.admin.guru.show', [
      'guru' => $user,
    ]);
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
