<x-app-layout title="Gaji">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                Laporan Gaji
            </h1>
        </header>

        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400 gap-4">
            <form action="{{ route('admin.gaji.index') }}" method="GET" class="flex gap-2">
                <select
                    class="block px-4 py-3 text-sm border-gray-200 rounded-md w-fit pr-9 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                    name="month">
                    <option selected>Select month</option>
                    @php
                        $list_months = [
                            'Januari' => 1,
                            'Februari' => 2,
                            'Maret' => 3,
                            'April' => 4,
                            'Mei' => 5,
                            'Juni' => 6,
                            'Juli' => 7,
                            'Agustus' => 8,
                            'September' => 9,
                            'Oktober' => 10,
                            'November' => 11,
                            'Desember' => 12,
                        ];
                    @endphp
                    @foreach ($list_months as $monthName => $monthNumber)
                        <option value="{{ $monthNumber }}" {{ $monthNumber == $month ? 'selected' : '' }}>
                            {{ $monthName }}
                        </option>
                    @endforeach
                </select>
                <select
                    class="block px-4 py-3 text-sm border-gray-200 rounded-md w-fit pr-9 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                    name="year">
                    <option selected>Select year</option>
                    @foreach ($availableYear as $ay)
                        <option value="{{ $ay }}" {{ $ay == $year ? 'selected' : '' }}>
                            {{ $ay }}
                        </option>
                    @endforeach
                </select>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 px-4 py-3 text-sm font-medium text-gray-700 align-middle transition-all bg-white border rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                    Filter Data
                </button>
            </form>

            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden border rounded-lg dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            NUPTK
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Nama Guru
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Jabatan
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Jenis Tunjangan
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Tunjangan Jabatan
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Tunjangan Pokok
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Total Jam Mengajar
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Total Presensi
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Total Gaji
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @if ($guru->isEmpty())
                                        <tr>
                                            <td colspan="9">
                                                <div class="flex items-center justify-center">
                                                    <p class="py-8 text-gray-400">Tidak ada data.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    @foreach ($guru as $item)
                                        <tr>
                                            <td
                                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $item->nuptk }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $item->name }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $item->jabatan->name }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $item->tunjangan->name }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                Rp {{ number_format($item->jabatan->nominal, 0, ',', '.') }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                Rp {{ number_format($item->tunjangan->nominal, 0, ',', '.') }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $total_jam_mengajar[$item->nuptk] }} Jam
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $total_presensi[$item->nuptk] }} /
                                                {{ $total_hari_mengajar[$item->nuptk] }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                Rp {{ number_format($total_gaji[$item->nuptk], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @if (isset($guru) && count($guru) > 0)
                {{ $guru->links() }}
            @endif
        </div>
    </div>
</x-app-layout>
