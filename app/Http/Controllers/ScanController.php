<?php

namespace App\Http\Controllers;

use App\Models\GeneratedQR;
use App\Models\JamMengajar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ScanController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('dashboard.admin.scan.index');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // return response()->json([
    //   'status' => 200,
    //   'message' => 'Berhasil melakukan validasi',
    //   'data' => $request->all(),
    // ]);

    // - decode the request->hash
    // - Cek guru ada di table guru
    // - Cek guru memiliki jam mengajar
    // - Cek guru ada jam mengajar di hari ini
    // - Cek qr code masih berlaku atau engga
    // - Cek checkin atau checkout
    // - Jika checkout harus lebih dari jam 15.00

    $hash = $request->qr_code;

    $hash = Crypt::decryptString($hash);
    $nuptk = explode('-', $hash)[0];

    // check if nuptk exists in table guru
    $guru = User::where('nuptk', $nuptk)->first();

    if (!$guru) {
      return response()->json([
        'status' => 404,
        'message' => 'Guru tidak ditemukan',
      ]);
    }

    // Then check if nuptk have jam mengajar
    $jamMengajar = JamMengajar::where('nuptk', $nuptk)->first();

    if (!$jamMengajar) {
      return response()->json([
        'status' => 404,
        'message' => 'Guru tidak memiliki jam mengajar',
      ]);
    }

    // Then check if nuptk have jam mengajar today in indonesia locale using Carbon
    $today = Carbon::now()->locale('id')->dayName;

    if (!in_array(strtolower($today), json_decode($jamMengajar->days))) {
      return response()->json([
        'status' => 404,
        'message' => 'Hari ini bukan hari mengajar Anda',
      ]);
    }

    // Then check if qr code still valid
    $generatedQR = GeneratedQR::where('nuptk', $nuptk)->whereDate('created_at', Carbon::now()->locale('id'))->first();

    if (!$generatedQR) {
      return response()->json([
        'status' => 404,
        'message' => 'QR Code tidak ditemukan',
      ]);
    }

    if (Carbon::now()->locale('id')->greaterThan($generatedQR->expiry)) {
      return response()->json([
        'status' => 404,
        'message' => 'QR Code sudah tidak berlaku',
      ]);
    }

    return response()->json([
      'status' => 200,
      'message' => 'Berhasil melakukan validasi',
      'data' => (object) [
        'guru' => $guru,
        'jam_mengajar' => $jamMengajar,
        'today' => $today,
        'generated_qr' => $generatedQR,
      ],
    ]);
  }
}
