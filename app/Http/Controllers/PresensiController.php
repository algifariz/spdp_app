<?php

namespace App\Http\Controllers;

use App\Models\JamMengajar;
use App\Models\Presensi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PresensiController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    /**
     * TODO: Show all presensi data
     * 1. Get all guru data from database
     * 2. Get month and year now for default filter
     * 3. Get total hari mengajar dari JamMengajar->days from each nuptk guru
     * 4. Count total presensi data for each guru in this month and year
     * 5. Return view with data
     */

    // 1. Get all guru data from database exclude hasRole admin and have jamMengajar
    $guru = Role::where('name', 'guru')->first()->users()->paginate(10);

    // 2. Get month and year now for default filter using Carbon, example september is 09 and year is 2023
    $month = Carbon::now()->month;
    $year = Carbon::now()->year;

    // 3. Get total hari mengajar dari JamMengajar->days from each nuptk guru
    $jamMengajar = JamMengajar::all()->map(function ($item) {
      return (object) [
        'nuptk' => $item->nuptk,
        'total_hari_mengajar' => count(json_decode($item->days)) * 4,
      ];
    });

    // 4. Count total presensi data for each guru that time_out not null in this month and year from column 'date' the value is '2023-09-23' and group by 'nuptk' column and map the value to count
    $presensi = Presensi::whereMonth('date', $month)->whereYear('date', $year)->whereNotNull('time_out')->get()->groupBy('nuptk')
      ->map(function ($item) {
        return $item->count();
      });

    // 5. Return view with data
    return view('dashboard.admin.presensi.index', compact('guru', 'month', 'year', 'jamMengajar', 'presensi'));
  }
}
