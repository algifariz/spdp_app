<x-app-layout title="Edit Guru">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                Edit Data Guru
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
            <form action="{{ route('admin.guru.update', $data->guru->id) }}" class="flex flex-col gap-4" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Nama Guru</label>
                    <input type="text" name="name"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Nama Guru" value="{{ old('name', $data->guru->name) }}" required autofocus>
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
                        placeholder="Email Guru" value="{{ old('email', $data->guru->email) }}" required>
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
                        placeholder="NUPTK Guru" value="{{ old('nuptk', $data->guru->nuptk) }}" required>
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
                        placeholder="Tempat Lahir" value="{{ old('tempat_lahir', $data->guru->tempat_lahir) }}">
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
                        value="{{ old('tanggal_lahir', $data->guru->tanggal_lahir) }}" required>
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
                        <option value="L"
                            {{ old('jenis_kelamin', $data->guru->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                            Laki-laki</option>
                        <option value="P"
                            {{ old('jenis_kelamin', $data->guru->jenis_kelamin) == 'P' ? 'selected' : '' }}>
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
                        <option value="Islam" {{ old('agama', $data->guru->agama) == 'Islam' ? 'selected' : '' }}>
                            Islam</option>
                        <option value="Kristen" {{ old('agama', $data->guru->agama) == 'Kristen' ? 'selected' : '' }}>
                            Kristen</option>
                        <option value="Katolik" {{ old('agama', $data->guru->agama) == 'Katolik' ? 'selected' : '' }}>
                            Katolik</option>
                        <option value="Hindu" {{ old('agama', $data->guru->agama) == 'Hindu' ? 'selected' : '' }}>
                            Hindu</option>
                        <option value="Buddha" {{ old('agama', $data->guru->agama) == 'Buddha' ? 'selected' : '' }}>
                            Buddha</option>
                        <option value="Konghucu"
                            {{ old('agama', $data->guru->agama) == 'Konghucu' ? 'selected' : '' }}>
                            Konghucu</option>
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
                        rows="3" placeholder="Alamat" required>{{ old('alamat', $data->guru->alamat) }}</textarea>
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
                        placeholder="No. HP" value="{{ old('no_hp', $data->guru->no_hp) }}" required>
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
                                {{ old('jabatan_id', $data->guru->jabatan_id) == $item->id ? 'selected' : '' }}>
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
                                {{ old('tunjangan_id', $data->guru->tunjangan_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
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
                        Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
