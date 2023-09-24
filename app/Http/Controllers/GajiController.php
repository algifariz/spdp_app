<?php

namespace App\Http\Controllers;

use App\Models\JamMengajar;
use App\Models\Presensi;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class GajiController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    /**
     * TODO: Show laporan gaji
     * Get all guru data from database
     * Get month and year now for default filter
     * Get total hari mengajar dari JamMengajar->days from each nuptk guru
     * Count total presensi data for each guru in this month and year
     * Get hari tidak hadir dari total hari mengajar dikurangi total presensi
     * Menentukan denda sesuai dengan id tunjangan
     * Menentukan total denda dari hari tidak hadir dikali denda
     * Menentukan total gaji dari total jam mengajar dikali besar gaji tunjangan dikurangi total denda kemudian ditambah besar gaji jabatan
     * Return view with data
     */

    // Get all guru data from database exclude hasRole admin and have jamMengajar
    $guru = Role::where('name', 'guru')->first()->users()->with('jabatan', 'tunjangan')->paginate(10);

    // Get month and year now for default filter using Carbon, example september is 09 and year is 2023
    $month = $request->month ?? Carbon::now()->month;
    $year = $request->year ?? Carbon::now()->year;
    // Get all available year from presensi data then make it array and don't duplicate the value
    $availableYear = Presensi::selectRaw('YEAR(date) as year')->distinct()->get()->map->year->toArray();

    // Get total hari mengajar dari JamMengajar->days from each nuptk guru
    $total_jam_mengajar = [];
    $total_hari_mengajar = [];
    foreach ($guru as $g) {
      $jamMengajar = JamMengajar::where('nuptk', $g->nuptk)->first();
      $total_jam_mengajar[$g->nuptk] = $jamMengajar ? $jamMengajar->hour : 0;
      $total_hari_mengajar[$g->nuptk] = $jamMengajar ? count(json_decode($jamMengajar->days)) * 4 : 0;
    }

    // Count total presensi data for each guru that time_out not null in this month and year from column 'date' the value is '2023-09-23' and group by 'nuptk' column and map the value to count
    $total_presensi = [];
    foreach ($guru as $g) {
      $totalPresensi = Presensi::whereMonth('date', $month)->whereYear('date', $year)->whereNotNull('time_out')->where('nuptk', $g->nuptk)->get();
      $total_presensi[$g->nuptk] = count($totalPresensi);
    }

    // Get hari tidak hadir dari total hari mengajar dikurangi total presensi
    $hari_tidak_hadir = [];
    foreach ($guru as $g) {
      $hari_tidak_hadir[$g->nuptk] = $total_hari_mengajar[$g->nuptk] - $total_presensi[$g->nuptk];
    }

    // Menentukan denda sesuai dengan id tunjangan
    $denda = [];
    foreach ($guru as $g) {
      $denda[$g->tunjangan_id] = $g->tunjangan_id == 1 ? 50_000 : ($g->tunjangan_id == 2 ? 100_000 : 150_000);
    }

    // Menentukan total denda dari hari tidak hadir dikali denda
    $total_denda = [];
    foreach ($guru as $g) {
      $total_denda[$g->nuptk] = $hari_tidak_hadir[$g->nuptk] * $denda[$g->tunjangan_id];
    }

    // Menentukan total gaji dari total jam mengajar dikali besar gaji tunjangan dikurangi total denda kemudian ditambah besar gaji jabatan
    $total_gaji = [];
    foreach ($guru as $g) {
      $total_gaji[$g->nuptk] = (($total_jam_mengajar[$g->nuptk] * $g->tunjangan->nominal) - $total_denda[$g->nuptk]) == 0 || $total_presensi[$g->nuptk] == 0
        ? 0 : (($total_jam_mengajar[$g->nuptk] * $g->tunjangan->nominal) - $total_denda[$g->nuptk]) + $g->jabatan->nominal;
    }

    return view('dashboard.admin.gaji.index', compact('guru', 'month', 'year', 'availableYear', 'total_jam_mengajar', 'total_hari_mengajar', 'total_presensi', 'hari_tidak_hadir', 'denda', 'total_denda', 'total_gaji'));
  }

  public function generatePDF(Request $request)
  {
    $guru = Role::where('name', 'guru')->first()->users()->with('jabatan', 'tunjangan')->paginate(10);
    $month = $request->month ?? Carbon::now()->month;
    $year = $request->year ?? Carbon::now()->year;
    $total_jam_mengajar = [];
    $total_hari_mengajar = [];
    foreach ($guru as $g) {
      $jamMengajar = JamMengajar::where('nuptk', $g->nuptk)->first();
      $total_jam_mengajar[$g->nuptk] = $jamMengajar ? $jamMengajar->hour : 0;
      $total_hari_mengajar[$g->nuptk] = $jamMengajar ? count(json_decode($jamMengajar->days)) * 4 : 0;
    }
    $total_presensi = [];
    foreach ($guru as $g) {
      $totalPresensi = Presensi::whereMonth('date', $month)->whereYear('date', $year)->whereNotNull('time_out')->where('nuptk', $g->nuptk)->get();
      $total_presensi[$g->nuptk] = count($totalPresensi);
    }
    $hari_tidak_hadir = [];
    foreach ($guru as $g) {
      $hari_tidak_hadir[$g->nuptk] = $total_hari_mengajar[$g->nuptk] - $total_presensi[$g->nuptk];
    }
    $denda = [];
    foreach ($guru as $g) {
      $denda[$g->tunjangan_id] = $g->tunjangan_id == 1 ? 50_000 : ($g->tunjangan_id == 2 ? 100_000 : 150_000);
    }
    $total_denda = [];
    foreach ($guru as $g) {
      $total_denda[$g->nuptk] = $hari_tidak_hadir[$g->nuptk] * $denda[$g->tunjangan_id];
    }
    $total_gaji = [];
    foreach ($guru as $g) {
      $total_gaji[$g->nuptk] = (($total_jam_mengajar[$g->nuptk] * $g->tunjangan->nominal) - $total_denda[$g->nuptk]) == 0 || $total_presensi[$g->nuptk] == 0
        ? 0 : (($total_jam_mengajar[$g->nuptk] * $g->tunjangan->nominal) - $total_denda[$g->nuptk]) + $g->jabatan->nominal;
    }
    $title = 'Laporan Gaji Guru';
    $date = Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y');
    $hour = Carbon::now()->addHours(7)->isoFormat('HH:mm [WIB]');
    $pdf = PDF::loadview('dashboard.admin.gaji.pdf', compact('guru', 'month', 'year', 'total_jam_mengajar', 'total_hari_mengajar', 'total_presensi', 'hari_tidak_hadir', 'denda', 'total_denda', 'total_gaji', 'title', 'date', 'hour'));

    return $pdf->download('laporan-gaji-guru-' . Str::random(16) . '.pdf');
  }
}
