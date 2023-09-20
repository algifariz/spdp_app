<?php

namespace App\Http\Controllers;

use App\Models\JamMengajar;
use App\Models\User;
use Illuminate\Http\Request;

class JamMengajarController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = JamMengajar::with('user')->paginate(10);

    $data->transform(function ($item) {
      $item->hour = $item->hour . ' Jam';
      $item->days = implode(', ', json_decode($item->days));

      return $item;
    });

    return view('dashboard.admin.jam-mengajar.index', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $guru = User::all();
    $jamMengajar = JamMengajar::all();
    $availableGuruDoesntHaveJamMengajar = $guru->filter(function ($item) use ($jamMengajar) {
      return !$jamMengajar->pluck('nuptk')->contains($item->nuptk) && !$item->hasRole('admin');
    });
    $data = (object) [
      'guru' => $availableGuruDoesntHaveJamMengajar,
    ];
    return view('dashboard.admin.jam-mengajar.create', compact('data'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validation = [
      'nuptk' => 'required|exists:users,nuptk',
      'hour' => 'required|numeric',
      'days' => 'required|array',
    ];

    $days = [];
    for ($i = 1; $i <= 5; $i++) {
      if (in_array(
        strtolower($request->input('days-' . $i)),
        ['senin', 'selasa', 'rabu', 'kamis', 'jumat']
      )) {
        array_push($days, strtolower($request->input('days-' . $i)));
      }
    }

    if (count($days) > 0) {
      $validation['days'] = $days;
    }
    $request->validate($validation);

    $save = JamMengajar::create([
      'nuptk' => $request->nuptk,
      'hour' => $request->hour,
      'days' => json_encode($days),
    ]);

    if ($save) {
      return redirect()->route('admin.jam-mengajar.index')->with('success', 'Berhasil menambahkan jam mengajar');
    } else {
      return redirect()->route('admin.jam-mengajar.index')->with('error', 'Gagal menambahkan jam mengajar');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(JamMengajar $jamMengajar)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(JamMengajar $jamMengajar)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, JamMengajar $jamMengajar)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(JamMengajar $jamMengajar)
  {
    //
  }
}
