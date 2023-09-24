<x-app-layout title="Edit Tunjangan">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                Edit Data Tunjangan
            </h1>
        </header>

        <a href="{{ route('admin.tunjangan.index') }}"
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
            <form action="{{ route('admin.tunjangan.update', $tunjangan->id) }}" class="flex flex-col gap-4"
                method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Nama
                        Tunjangan</label>
                    <input type="text" name="name"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Nama Tunjangan" value="{{ $tunjangan->name }}" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Nominal Gaji</label>
                    <input type="number" name="nominal"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="100000" value="{{ old('nominal', $tunjangan->nominal) }}" required autofocus>
                    @error('nominal')
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
