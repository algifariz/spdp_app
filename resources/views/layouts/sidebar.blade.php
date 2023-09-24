<!-- Sidebar Toggle -->
<div
    class="sticky inset-x-0 top-0 z-20 px-4 bg-white border-y sm:px-6 md:px-8 lg:hidden dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center py-4">
        <!-- Navigation Toggle -->
        <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar"
            aria-controls="application-sidebar" aria-label="Toggle navigation">
            <span class="sr-only">Toggle Navigation</span>
            <svg class="w-5 h-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <!-- End Navigation Toggle -->
    </div>
</div>
<!-- End Sidebar Toggle -->

<!-- Sidebar -->
<div id="application-sidebar"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 left-0 bottom-0 z-[60] w-64 bg-white border-r border-gray-200 pt-7 pb-10 overflow-y-auto scrollbar-y lg:block lg:translate-x-0 lg:right-auto lg:bottom-0 dark:scrollbar-y dark:bg-gray-800 dark:border-gray-700">
    <div class="px-6">
        <a class="flex-none text-xl font-semibold dark:text-white" href="{{ route('dashboard') }}"
            aria-label="Brand">SPDP</a>
    </div>

    <nav class="flex flex-col flex-wrap w-full p-6 hs-accordion-group" data-hs-accordion-always-open>
        <ul class="space-y-1.5">
            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 {{ request()->is('dashboard') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300' }}"
                    href="{{ route('dashboard') }}">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-home">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Dashboard
                </a>
            </li>

            @if (Auth::user()->hasRole('admin'))
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 {{ request()->is('dashboard/scan') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300' }}"
                        href="{{ route('admin.scan.index') }}">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scan-line">
                            <path d="M3 7V5a2 2 0 0 1 2-2h2" />
                            <path d="M17 3h2a2 2 0 0 1 2 2v2" />
                            <path d="M21 17v2a2 2 0 0 1-2 2h-2" />
                            <path d="M7 21H5a2 2 0 0 1-2-2v-2" />
                            <line x1="7" x2="17" y1="12" y2="12" />
                        </svg>
                        Scan QR Code
                    </a>
                </li>
                <li class="hs-accordion {{ request()->is('dashboard/guru') || request()->is('dashboard/guru/*') || request()->is('dashboard/jabatan') || request()->is('dashboard/jabatan/*') || request()->is('dashboard/tunjangan') || request()->is('dashboard/tunjangan/*') || request()->is('dashboard/jam-mengajar') || request()->is('dashboard/jam-mengajar/*') ? 'active' : '' }}"
                    id="master-data-accordion">
                    <a class="hs-accordion-toggle flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white"
                        href="javascript:;">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-database">
                            <ellipse cx="12" cy="5" rx="9" ry="3" />
                            <path d="M3 5V19A9 3 0 0 0 21 19V5" />
                            <path d="M3 12A9 3 0 0 0 21 12" />
                        </svg>
                        Master Data

                        <svg class="hidden w-3 h-3 ml-auto text-gray-600 hs-accordion-active:block group-hover:text-gray-500 dark:text-gray-400"
                            width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 11L8.16086 5.31305C8.35239 5.13625 8.64761 5.13625 8.83914 5.31305L15 11"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                        </svg>

                        <svg class="block w-3 h-3 ml-auto text-gray-600 hs-accordion-active:hidden group-hover:text-gray-500 dark:text-gray-400"
                            width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                        </svg>
                    </a>

                    <div id="master-data-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 {{ request()->is('dashboard/guru') || request()->is('dashboard/guru/*') || request()->is('dashboard/jabatan') || request()->is('dashboard/jabatan/*') || request()->is('dashboard/tunjangan') || request()->is('dashboard/tunjangan/*') || request()->is('dashboard/jam-mengajar') || request()->is('dashboard/jam-mengajar/*') ? 'block' : 'hidden' }}">
                        <ul class="pt-2 pl-2">
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md {{ request()->is('dashboard/guru') || request()->is('dashboard/guru/*') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300' }}"
                                    href="{{ route('admin.guru.index') }}">
                                    Data Guru
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md {{ request()->is('dashboard/jabatan') || request()->is('dashboard/jabatan/*') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300' }}"
                                    href="{{ route('admin.jabatan.index') }}">
                                    Data Jabatan
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md {{ request()->is('dashboard/tunjangan') || request()->is('dashboard/tunjangan/*') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300' }}"
                                    href="{{ route('admin.tunjangan.index') }}">
                                    Data Tunjangan
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md {{ request()->is('dashboard/jam-mengajar') || request()->is('dashboard/jam-mengajar/*') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300' }}"
                                    href="{{ route('admin.jam-mengajar.index') }}">
                                    Data Jam Mengajar
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 {{ request()->is('dashboard/presensi') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300' }}"
                        href="{{ route('presensi.index') }}">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text">
                            <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="16" x2="8" y1="13" y2="13" />
                            <line x1="16" x2="8" y1="17" y2="17" />
                            <line x1="10" x2="8" y1="9" y2="9" />
                        </svg>
                        Laporan Presensi
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasRole('guru'))
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 {{ request()->is('dashboard/generated-qr') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300' }}"
                        href="{{ route('guru.generated-qr.index') }}">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-qr-code">
                            <rect width="5" height="5" x="3" y="3" rx="1" />
                            <rect width="5" height="5" x="16" y="3" rx="1" />
                            <rect width="5" height="5" x="3" y="16" rx="1" />
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
                        Generate QR Code
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 {{ request()->is('dashboard/presensi') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300' }}"
                        href="{{ route('presensi.index') }}">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scroll-text">
                            <path d="M8 21h12a2 2 0 0 0 2-2v-2H10v2a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v3h4" />
                            <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                            <path d="M15 8h-5" />
                            <path d="M15 12h-5" />
                        </svg>
                        Catatan Presensi
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 {{ request()->is('dashboard/profile') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300' }}"
                        href="{{ route('guru.profile.index') }}">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-cog">
                            <circle cx="18" cy="15" r="3" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                            <path d="m21.7 16.4-.9-.3" />
                            <path d="m15.2 13.9-.9-.3" />
                            <path d="m16.6 18.7.3-.9" />
                            <path d="m19.1 12.2.3-.9" />
                            <path d="m19.6 18.7-.4-1" />
                            <path d="m16.8 12.3-.4-1" />
                            <path d="m14.3 16.6 1-.4" />
                            <path d="m20.7 13.8 1-.4" />
                        </svg>
                        Profile
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>
<!-- End Sidebar -->
