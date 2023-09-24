<x-app-layout title="Presensi">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                Kelola Presensi
            </h1>
        </header>

        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400 gap-4">
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
                                            Total Presensi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @if ($guru->isEmpty())
                                        <tr>
                                            <td colspan="3">
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
                                            @php
                                                $total_presensi = [];
                                                foreach ($jamMengajar as $key => $value) {
                                                    if ($value->nuptk == $item->nuptk) {
                                                        $total_presensi[$value->nuptk] = $value->total_hari_mengajar;
                                                    }
                                                }
                                            @endphp
                                            <td
                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                                {{ $presensi[$item->nuptk] ?? 0 }} /
                                                {{ $total_presensi[$item->nuptk] ?? 0 }}
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
