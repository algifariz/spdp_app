<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Presensi | Sistem Presensi dan Penggajian Guru Honorer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>Dibuat pada {{ $date }} pukul {{ $hour }}</p>

    <table class="table">
        <thead>
            <tr>
                <th>
                    NUPTK
                </th>
                <th>
                    Nama Guru
                </th>
                <th>
                    Jabatan
                </th>
                <th>
                    Jenis Tunjangan
                </th>
                <th>
                    Tunjangan Jabatan
                </th>
                <th>
                    Tunjangan Pokok
                </th>
                <th>
                    Total Jam Mengajar
                </th>
                <th>
                    Total Presensi
                </th>
                <th>
                    Total Gaji
                </th>
            </tr>
        </thead>

        <tbody>
            @if ($guru->isEmpty())
                <tr>
                    <td colspan="9">
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="py-8 text-gray-400">Tidak ada data.</p>
                        </div>
                    </td>
                </tr>
            @endif

            @foreach ($guru as $item)
                <tr>
                    <td>
                        {{ $item->nuptk }}
                    </td>
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                        {{ $item->jabatan->name }}
                    </td>
                    <td>
                        {{ $item->tunjangan->name }}
                    </td>
                    <td>
                        Rp {{ number_format($item->jabatan->nominal, 0, ',', '.') }}
                    </td>
                    <td>
                        Rp {{ number_format($item->tunjangan->nominal, 0, ',', '.') }}
                    </td>
                    <td>
                        {{ $total_jam_mengajar[$item->nuptk] }} Jam
                    </td>
                    <td>
                        {{ $total_presensi[$item->nuptk] }} /
                        {{ $total_hari_mengajar[$item->nuptk] }}
                    </td>
                    <td>
                        Rp {{ number_format($total_gaji[$item->nuptk], 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
