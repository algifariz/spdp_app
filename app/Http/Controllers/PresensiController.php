<?php

namespace App\Http\Controllers;

use App\Models\JamMengajar;
use App\Models\Presensi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class PresensiController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $user = User::all();
    $allJamMengajar = JamMengajar::all();
    $availableGuruDoesntHaveJamMengajar = $user->filter(function ($item) use ($allJamMengajar) {
      return !$allJamMengajar->pluck('nuptk')->contains($item->nuptk) && !$item->hasRole('admin');
    });

    if ($availableGuruDoesntHaveJamMengajar->count() > 0) {
      return redirect()->route('dashboard')->with('error', 'Tidak dapat mengakses halaman presensi karena ada guru yang belum memiliki jam mengajar');
    }

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
    $month = $request->month ?? Carbon::now()->month;
    $year = $request->year ?? Carbon::now()->year;
    // 2.1 Get all available month and year from presensi data then make it array and don't duplicate the value
    $availableMonth = Presensi::selectRaw('MONTH(date) as month')->distinct()->get()->map->month->toArray();
    $availableYear = Presensi::selectRaw('YEAR(date) as year')->distinct()->get()->map->year->toArray();

    // 3. Get total hari mengajar dari JamMengajar->days from each nuptk guru
    $jamMengajar = JamMengajar::all()->map(function ($item) {
      return (object) [
        'nuptk' => $item->nuptk,
        'total_jam_mengajar' => $item->hour,
        'total_hari_mengajar' => count(json_decode($item->days)) * 4,
      ];
    });

    // 4. Count total presensi data for each guru that time_out not null in this month and year from column 'date' the value is '2023-09-23' and group by 'nuptk' column and map the value to count
    $presensi = Presensi::whereMonth('date', $month)->whereYear('date', $year)->whereNotNull('time_out')->get()->groupBy('nuptk')
      ->map(function ($item) {
        return $item->count();
      });

    // 5. Return view with data
    return view('dashboard.admin.presensi.index', compact('guru', 'month', 'year', 'availableMonth', 'availableYear', 'jamMengajar', 'presensi'));
  }

  public function generatePDF(Request $request)
  {
    $guru = Role::where('name', 'guru')->first()->users()->get();
    $month = $request->month ?? Carbon::now()->month;
    $year = $request->year ?? Carbon::now()->year;
    $jamMengajar = JamMengajar::all()->map(function ($item) {
      return (object) [
        'nuptk' => $item->nuptk,
        'total_jam_mengajar' => $item->hour,
        'total_hari_mengajar' => count(json_decode($item->days)) * 4,
      ];
    });
    $presensi = Presensi::whereMonth('date', $month)->whereYear('date', $year)->whereNotNull('time_out')->get()->groupBy('nuptk')
      ->map(function ($item) {
        return $item->count();
      });
    $title = 'Laporan Presensi Guru';
    $date = Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y');
    $hour = Carbon::now()->addHours(7)->isoFormat('HH:mm [WIB]');
    $pdf = PDF::loadview('dashboard.admin.presensi.pdf', compact('guru', 'month', 'year', 'jamMengajar', 'presensi', 'title', 'date', 'hour'));

    return $pdf->download('laporan-presensi-guru-' . Str::random(16) . '.pdf');
  }
}
