<?php

namespace App\Http\Controllers;

use App\Models\JamMengajar;
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
