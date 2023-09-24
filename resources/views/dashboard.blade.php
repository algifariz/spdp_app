<x-app-layout title="Dashboard">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Dashboard</h1>
        </header>

        @if (isset($data->availableGuruDoesntHaveJamMengajar))
            @if ($data->availableGuruDoesntHaveJamMengajar)
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
                                Masih terdapat {{ $data->availableGuruDoesntHaveJamMengajar }} guru yang belum memiliki
                                jam
                                mengajar, silahkan tambahkan jam mengajar <a
                                    href="{{ route('admin.jam-mengajar.index') }}" class="text-yellow-700 underline">di
                                    sini</a>.
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        @if (isset($data->is_default_password))
            @if ($data->is_default_password)
                <div class="p-4 border border-yellow-200 rounded-md bg-yellow-50" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-4 w-4 text-yellow-400 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-semibold text-yellow-800">
                                Pemberitahuan
                            </h3>
                            <div class="mt-1 text-sm text-yellow-700">
                                Password anda masih default, silahkan ganti password anda <a
                                    href="{{ route('guru.profile.index') }}" class="text-yellow-700 underline">di
                                    sini</a>.
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        @if (isset($data->is_have_jam_mengajar))
            @if (!$data->is_have_jam_mengajar)
                <div class="p-4 border border-yellow-200 rounded-md bg-yellow-50" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-4 w-4 text-yellow-400 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-semibold text-yellow-800">
                                Pemberitahuan
                            </h3>
                            <div class="mt-1 text-sm text-yellow-700">
                                Anda belum memiliki jam mengajar, silahkan hubungi admin untuk menambahkan jam mengajar
                                anda.
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        {{-- Session error --}}
        @if (session()->has('error'))
            <div id="dismiss-alert"
                class="p-4 transition duration-300 border border-red-200 rounded-md hs-removing:translate-x-5 hs-removing:opacity-0 bg-red-50"
                role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-4 w-4 text-red-400 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <div class="text-sm font-medium text-red-800">
                            {{ session()->get('error') }}
                        </div>
                    </div>
                    <div class="pl-3 ml-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button"
                                class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600"
                                data-hs-remove-element="#dismiss-alert">
                                <span class="sr-only">Dismiss</span>
                                <svg class="w-3 h-3" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path
                                        d="M0.92524 0.687069C1.126 0.486219 1.39823 0.373377 1.68209 0.373377C1.96597 0.373377 2.2382 0.486219 2.43894 0.687069L8.10514 6.35813L13.7714 0.687069C13.8701 0.584748 13.9882 0.503105 14.1188 0.446962C14.2494 0.39082 14.3899 0.361248 14.5321 0.360026C14.6742 0.358783 14.8151 0.38589 14.9468 0.439762C15.0782 0.493633 15.1977 0.573197 15.2983 0.673783C15.3987 0.774389 15.4784 0.894026 15.5321 1.02568C15.5859 1.15736 15.6131 1.29845 15.6118 1.44071C15.6105 1.58297 15.5809 1.72357 15.5248 1.85428C15.4688 1.98499 15.3872 2.10324 15.2851 2.20206L9.61883 7.87312L15.2851 13.5441C15.4801 13.7462 15.588 14.0168 15.5854 14.2977C15.5831 14.5787 15.4705 14.8474 15.272 15.046C15.0735 15.2449 14.805 15.3574 14.5244 15.3599C14.2437 15.3623 13.9733 15.2543 13.7714 15.0591L8.10514 9.38812L2.43894 15.0591C2.23704 15.2543 1.96663 15.3623 1.68594 15.3599C1.40526 15.3574 1.13677 15.2449 0.938279 15.046C0.739807 14.8474 0.627232 14.5787 0.624791 14.2977C0.62235 14.0168 0.730236 13.7462 0.92524 13.5441L6.59144 7.87312L0.92524 2.20206C0.724562 2.00115 0.611816 1.72867 0.611816 1.44457C0.611816 1.16047 0.724562 0.887983 0.92524 0.687069Z"
                                        fill="currentColor" />
                                </svg>
                            </button>
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
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-square-stack">
                                    <path d="M4 10c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2" />
                                    <path d="M10 16c-1.1 0-2-.9-2-2v-4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2" />
                                    <rect width="8" height="8" x="14" y="14"
                                        rx="2" />
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
                                    <rect width="20" height="12" x="2" y="6"
                                        rx="2" />
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
