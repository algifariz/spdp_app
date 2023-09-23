<?php

namespace App\Http\Controllers;

use App\Models\GeneratedQR;
use App\Models\JamMengajar;
use App\Models\Presensi;
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
    /**
     * 1. Decode the request->hash using Crypt::decryptString
     * 2. Check if nuptk exists in table guru
     * 3. Then check if nuptk have jam mengajar
     * 4. Then check if nuptk have jam mengajar today in indonesia locale using Carbon
     * 5. Then check if qr code still valid
     * 6. Then check in table presensi if user already check in or check out
     * 7. If check out should be greater than 15.00
     * 8. If check in and add to table presensi
     * 9. If check out and update table presensi
     */

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

    // Then check in table presensi if user already check in or check out
    $presensi = Presensi::where('nuptk', $nuptk)->whereDate('created_at', Carbon::now()->locale('id'))->first();

    if (!$presensi) {
      // check checkin not greater than 15.00
      if (Carbon::now()->locale('id')->addHour(7)->greaterThan(Carbon::now()->locale('id')->setHour(15)->setMinute(0)->setSecond(0))) {
        return response()->json([
          'status' => 404,
          'message' => 'Anda terlambat melakukan absensi masuk',
        ]);
      }

      // check in and add to table presensi
      $presensi = Presensi::create([
        'nuptk' => $nuptk,
        'date' => Carbon::now()->locale('id')->format('Y-m-d'),
        'time_in' => Carbon::now()->locale('id')->addHours(7)->format('H:i:s'),
      ]);

      return response()->json([
        'status' => 200,
        'message' => 'Berhasil melakukan absensi masuk',
        'data' => (object) [
          'presensi' => $presensi,
        ],
      ]);
    }

    if ($presensi->time_out) {
      return response()->json([
        'status' => 404,
        'message' => 'Anda sudah melakukan absensi pulang hari ini',
      ]);
    }

    // check out and update table presensi should be greater than 15.00
    if (Carbon::now()->locale('id')->addHour(7)->lessThan(Carbon::now()->locale('id')->setHour(15)->setMinute(0)->setSecond(0))) {
      return response()->json([
        'status' => 404,
        'message' => 'Silahkan melakukan absensi pulang setelah jam 15.00',
      ]);
    }

    $presensi->update([
      'time_out' => Carbon::now()->locale('id')->addHours(7)->format('H:i:s'),
    ]);

    return response()->json([
      'status' => 200,
      'message' => 'Berhasil melakukan validasi',
      'data' => (object) [
        'presensi' => $presensi,
      ],
    ]);
  }
}
