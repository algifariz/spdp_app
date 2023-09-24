<x-app-layout title="Presensi">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                Catatan Presensi
            </h1>
        </header>

        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400 gap-4">
            <form action="{{ route('presensi.index') }}" method="GET" class="flex gap-2">
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
                                            Tanggal Presensi
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Jam Masuk
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                            Jam Keluar
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @if ($presensi->isEmpty())
                                        <tr>
                                            <td colspan="5">
                                                <div class="flex items-center justify-center">
                                                    <p class="py-8 text-gray-400">Tidak ada data.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    @foreach ($presensi as $item)
                                        <tr>
                                            <td
                                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $item->nuptk }}
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $item->user->name }}
                                            </td>
                                            @php
                                                $date = \Carbon\Carbon::parse($item->date)
                                                    ->locale('id')
                                                    ->isoFormat('dddd, D MMMM Y');
                                            @endphp
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $date }}
                                            </td>
                                            @php
                                                $time_in = \Carbon\Carbon::parse($item->time_in)
                                                    ->locale('id')
                                                    ->isoFormat('HH.mm [WIB]');
                                            @endphp
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $time_in }}
                                            </td>
                                            @php
                                                $time_out = \Carbon\Carbon::parse($item->time_out)
                                                    ->locale('id')
                                                    ->isoFormat('HH.mm [WIB]');
                                            @endphp
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $item->time_out ? $time_out : 'Belum absen pulang' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @if (isset($presensi) && count($presensi) > 0)
                {{ $presensi->links() }}
            @endif
        </div>
    </div>
</x-app-layout>
