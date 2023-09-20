<x-app-layout title="Tambah Jam Mengajar">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                Tambah Data Jam Mengajar
            </h1>
        </header>

        <a href="{{ route('admin.jam-mengajar.index') }}"
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
            <form action="{{ route('admin.jam-mengajar.store') }}" class="flex flex-col gap-4" method="POST">
                @csrf

                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Guru</label>
                    <select name="nuptk"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md shadow-sm pr-11 focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        required>
                        <option value="" selected disabled>Pilih Guru</option>
                        @foreach ($data->guru as $item)
                            <option value="{{ $item->nuptk }}" {{ old('nuptk') == $item->nuptk ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">
                        Total Jam Mengajar
                    </label>
                    <div class="flex rounded-md shadow-sm">
                        <input type="number" name="hour"
                            class="block w-full px-4 py-3 text-sm border-gray-200 shadow-sm pr-11 rounded-l-md focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                            placeholder="12" value="{{ old('hour') }}" required>
                        <span
                            class="inline-flex items-center px-4 text-sm text-gray-500 border border-l-0 border-gray-200 min-w-fit rounded-r-md bg-gray-50 dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400">Jam</span>
                    </div>
                    @error('hour')
                        <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Hari
                        Mengajar</label>
                    @php
                        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
                    @endphp

                    <ul class="flex flex-col">
                        @foreach ($days as $i => $day)
                            <li
                                class="inline-flex items-center px-4 py-3 -mt-px text-sm font-medium text-gray-800 bg-white border gap-x-2 first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                <div class="relative flex items-start w-full">
                                    <div class="flex items-center h-5">
                                        <input id="days-{{ $i + 1 }}" name="days-{{ $i + 1 }}"
                                            type="checkbox"
                                            class="border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                            value="{{ old('days-' . $i + 1, $day) }}"
                                            {{ old('days-' . $i + 1) == $day ? 'checked' : '' }}>
                                    </div>
                                    <label for="days-{{ $i + 1 }}"
                                        class="ml-3.5 block w-full text-sm text-gray-600 dark:text-gray-500">
                                        {{ ucfirst($day) }}
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    @error('days')
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
