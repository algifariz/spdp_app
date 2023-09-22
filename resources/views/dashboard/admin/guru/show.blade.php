<x-app-layout title="Detail Guru">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                Detail Data Guru
            </h1>
        </header>

        <a href="{{ route('admin.guru.index') }}"
            class="inline-flex items-center justify-center gap-2 px-4 py-3 text-sm font-semibold text-white transition-all bg-red-500 border border-transparent rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 w-fit">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-chevron-left">
                <path d="m15 18-6-6 6-6" />
            </svg>
            Kembali
        </a>

        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400">
            <div class="flex flex-col gap-4">
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Nama Guru</label>
                    <input type="text" name="name"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Nama Guru" value="{{ $guru->name }}" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Email Guru</label>
                    <input type="email" name="email"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Email Guru" value="{{ $guru->email }}" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">NUPTK</label>
                    <input type="text" name="nuptk"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="NUPTK Guru" value="{{ $guru->nuptk }}" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Tempat Lahir" value="{{ $guru->tempat_lahir }}" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tanggal_lahir"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        value="{{ $guru->tanggal_lahir }}" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Jenis
                        Kelamin</label>
                    <input type="text" name="jenis_kelamin"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        value="{{ $guru->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Agama</label>
                    <input type="text" name="agama"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        value="{{ $guru->agama }}" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Alamat</label>
                    <textarea name="alamat"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none resize-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Alamat" disabled readonly>{{ $guru->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">No. HP</label>
                    <input type="text" name="no_hp"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="No. HP" value="{{ $guru->no_hp }}" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Jabatan</label>
                    <input type="text" name="jabatan"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Jabatan" value="{{ $guru->jabatan->name }}" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Tunjangan</label>
                    <input type="text" name="tunjangan"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Tunjangan" value="{{ $guru->tunjangan->name }}" disabled readonly>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
