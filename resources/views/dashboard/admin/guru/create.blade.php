<x-app-layout title="Tambah Guru">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                Tambah Data Guru
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
                        Guru yang sudah ditambahkan akan langsung mendapatkan akses ke aplikasi. Anda tidak perlu
                        menentukan password untuk guru, karena akan dibuatkan secara otomatis dengan password default
                        sebagai
                        berikut: <code class="bg-yellow-200 rounded-md px-1.5 py-0.5">password</code>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400">
            <form action="{{ route('admin.guru.store') }}" class="flex flex-col gap-4" method="POST">
                @csrf

                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Nama Guru</label>
                    <input type="text" name="name"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Nama Guru" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Email Guru</label>
                    <input type="email" name="email"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Email Guru" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">NUPTK</label>
                    <input type="text" name="nuptk"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="NUPTK Guru" value="{{ old('nuptk') }}" required>
                    @error('nuptk')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}" required>
                    @error('tempat_lahir')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tanggal_lahir"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Jenis
                        Kelamin</label>
                    <select name="jenis_kelamin"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pr-9 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Agama</label>
                    <select name="agama"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pr-9 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                        <option selected>Pilih Agama</option>
                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                    @error('agama')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Alamat</label>
                    <textarea name="alamat"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        rows="3" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">No. HP</label>
                    <input type="text" name="no_hp"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="No. HP" value="{{ old('no_hp') }}" required>
                    @error('no_hp')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Jabatan</label>
                    <select name="jabatan_id"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pr-9 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                        <option selected>Pilih Jabatan</option>
                        @foreach ($data->jabatan as $item)
                            <option value="{{ $item->id }}"
                                {{ old('jabatan_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('jabatan_id')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Tunjangan</label>
                    <select name="tunjangan_id"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pr-9 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                        <option selected>Pilih Tunjangan</option>
                        @foreach ($data->tunjangan as $item)
                            <option value="{{ $item->id }}"
                                {{ old('tunjangan_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('tunjangan_id')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex justify-end w-full">
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 px-4 py-3 text-sm font-semibold text-white transition-all bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
