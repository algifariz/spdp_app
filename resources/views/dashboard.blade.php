<x-app-layout title="Dashboard">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Dashboard</h1>
        </header>

        @if (isset($data->availableGuruDoesntHaveJamMengajar))
            <div class="p-4 border border-yellow-200 rounded-md bg-yellow-50" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-4 w-4 text-yellow-400 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-semibold text-yellow-800">
                            Pemberitahuan
                        </h3>
                        <div class="mt-1 text-sm text-yellow-700">
                            Masih terdapat {{ $data->availableGuruDoesntHaveJamMengajar }} guru yang belum memiliki jam
                            mengajar, silahkan tambahkan jam mengajar <a href="{{ route('admin.jam-mengajar.index') }}"
                                class="text-yellow-700 underline">di sini</a>.
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (isset($data->is_default_password))
            <div class="p-4 border border-yellow-200 rounded-md bg-yellow-50" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-4 w-4 text-yellow-400 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-semibold text-yellow-800">
                            Pemberitahuan
                        </h3>
                        <div class="mt-1 text-sm text-yellow-700">
                            Password anda masih default, silahkan ganti password anda <a href="#"
                                class="text-yellow-700 underline">di sini</a>.
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7">
            @if (Auth::user()->hasRole('admin'))
                <div
                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <div class="p-4 md:p-7">
                        <div class="flex items-center gap-4">
                            <div
                                class="flex items-center justify-center w-20 h-20 bg-blue-600 rounded-lg aspect-square text-zinc-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                    Data Guru
                                </h3>
                                <p class="mt-2 text-gray-800 dark:text-gray-400">
                                    {{ $data->metrics_guru }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <div class="p-4 md:p-7">
                        <div class="flex items-center gap-4">
                            <div
                                class="flex items-center justify-center w-20 h-20 rounded-lg bg-amber-600 aspect-square text-zinc-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-stack">
                                    <path d="M4 10c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2" />
                                    <path d="M10 16c-1.1 0-2-.9-2-2v-4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2" />
                                    <rect width="8" height="8" x="14" y="14" rx="2" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                    Jumlah Jabatan
                                </h3>
                                <p class="mt-2 text-gray-800 dark:text-gray-400">
                                    {{ $data->metrics_jabatan }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <div class="p-4 md:p-7">
                        <div class="flex items-center gap-4">
                            <div
                                class="flex items-center justify-center w-20 h-20 rounded-lg bg-emerald-600 aspect-square text-zinc-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-banknote">
                                    <rect width="20" height="12" x="2" y="6" rx="2" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path d="M6 12h.01M18 12h.01" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                    Jumlah Tunjangan
                                </h3>
                                <p class="mt-2 text-gray-800 dark:text-gray-400">
                                    {{ $data->metrics_tunjangan }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div
                    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <div class="p-4 md:p-7">
                        <div class="flex items-center gap-4">
                            <div
                                class="flex items-center justify-center w-20 h-20 bg-blue-600 rounded-lg aspect-square text-zinc-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-qr-code">
                                    <rect width="5" height="5" x="3" y="3"
                                        rx="1" />
                                    <rect width="5" height="5" x="16" y="3"
                                        rx="1" />
                                    <rect width="5" height="5" x="3" y="16"
                                        rx="1" />
                                    <path d="M21 16h-3a2 2 0 0 0-2 2v3" />
                                    <path d="M21 21v.01" />
                                    <path d="M12 7v3a2 2 0 0 1-2 2H7" />
                                    <path d="M3 12h.01" />
                                    <path d="M12 3h.01" />
                                    <path d="M12 16v.01" />
                                    <path d="M16 12h1" />
                                    <path d="M21 12v.01" />
                                    <path d="M12 21v-1" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                    QR Generated
                                </h3>
                                <p class="mt-2 text-gray-800 dark:text-gray-400">
                                    {{ $data->metrics_qr }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                Visi
            </h3>
            <p class="mt-2 text-gray-800 dark:text-gray-400">
                “Berprestasi dilandasi Iman, Taqwa dan Berbudaya Lingkungan serta Berwawasan Global”
            </p>
        </div>

        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                Misi
            </h3>
            <ol class="mt-2 text-gray-800 list-decimal list-inside dark:text-gray-400">
                <li>Mewujudkan peserta didik yang beriman, bertakwa, berbudaya lingkungan dan berwawasan global.</li>
                <li>Mewujudkan peserta didik yang berprestasi dalam bidang akademik, non akademik dan keagamaan.</li>
                <li>Mewujudkan peserta didik yang berakhlak mulia, berbudi pekerti luhur, berjiwa kewirausahaan dan
                    berwawasan lingkungan.</li>
                <li>Mewujudkan peserta didik yang berkepribadian islami, berakhlak mulia, berbudi pekerti luhur, berjiwa
                    kewirausahaan dan berwawasan lingkungan.</li>
                <li>Mewujudkan peserta didik yang berkepribadian islami, berakhlak mulia, berbudi pekerti luhur, berjiwa
                    kewirausahaan dan berwawasan lingkungan.</li>
                <li>Mewujudkan peserta didik yang berkepribadian islami, berakhlak mulia, berbudi pekerti luhur, berjiwa
                    kewirausahaan dan berwawasan lingkungan.</li>
            </ol>
        </div>
    </div>
</x-app-layout>
