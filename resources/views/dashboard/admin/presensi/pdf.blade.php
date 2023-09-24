<!DOCTYPE html>
<html>

<head>
    <title>Laporan Presensi | Sistem Presensi dan Penggajian Guru Honorer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>Dibuat pada {{ $date }} pukul {{ $hour }}</p>

    <table class="table table-bordered">
        <tr>
            <th>NUPTK</th>
            <th>Nama Guru</th>
            <th>Total Jam Mengajar</th>
            <th>Total Presensi</th>
        </tr>
        @foreach ($guru as $item)
            <tr>
                <td>
                    {{ $item->nuptk }}
                </td>
                <td>
                    {{ $item->name }}
                </td>
                @php
                    $total_jam_mengajar = [];
                    foreach ($jamMengajar as $key => $value) {
                        if ($value->nuptk == $item->nuptk) {
                            $total_jam_mengajar[$value->nuptk] = $value->total_jam_mengajar;
                        }
                    }
                @endphp
                <td>
                    {{ $total_jam_mengajar[$item->nuptk] ?? 0 }} Jam
                </td>
                @php
                    $total_presensi = [];
                    foreach ($jamMengajar as $key => $value) {
                        if ($value->nuptk == $item->nuptk) {
                            $total_presensi[$value->nuptk] = $value->total_hari_mengajar;
                        }
                    }
                @endphp
                <td>
                    {{ $presensi[$item->nuptk] ?? 0 }} /
                    {{ $total_presensi[$item->nuptk] ?? 0 }}
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
