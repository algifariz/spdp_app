<x-app-layout title="Profile">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                Kelola Profile
            </h1>
        </header>

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
                        Anda tidak dapat mengubah email dan NUPTK, silahkan hubungi admin untuk mengubah data tersebut.
                    </div>
                </div>
            </div>
        </div>

        {{-- Session success --}}
        @if (session()->has('success'))
            <div id="dismiss-alert"
                class="p-4 transition duration-300 border border-teal-200 rounded-md hs-removing:translate-x-5 hs-removing:opacity-0 bg-teal-50"
                role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-4 w-4 text-teal-400 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <div class="text-sm font-medium text-teal-800">
                            {{ session()->get('success') }}
                        </div>
                    </div>
                    <div class="pl-3 ml-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button"
                                class="inline-flex bg-teal-50 rounded-md p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600"
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

        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400">
            <form action="{{ route('guru.profile.update', Auth::user()->id) }}" class="flex flex-col gap-4"
                method="POST">
                @csrf
                @method('PUT')

                <div class="grid gap-2 form-group sm:grid-cols-12">
                    <div class="sm:col-span-3">
                        <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Nama Lengkap
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input id="name" type="text"
                            class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pr-11 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                            placeholder="John Doe" name="name" value="{{ old('name', Auth::user()->name) }}" required
                            autofocus>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="grid gap-2 form-group sm:grid-cols-12">
                    <div class="sm:col-span-3">
                        <label for="email" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Email
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input type="email" name="email"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                            placeholder="Email Guru" value="{{ Auth::user()->email }}" disabled readonly>
                    </div>
                </div>

                <div class="grid gap-2 form-group sm:grid-cols-12">
                    <div class="sm:col-span-3">
                        <label for="password" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Password
                            <span class="ml-1 text-xs text-gray-400">
                                (optional)
                            </span>
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <div class="space-y-2">
                            <input id="current_password" name="current_password" type="password"
                                class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pr-11 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Enter current password">
                            @error('current_password')
                                <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                                    {{ $message }}
                                </p>
                            @enderror
                            <input type="password" name="password" id="password"
                                class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pr-11 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Enter new password">
                            @error('password')
                                <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                                    {{ $message }}
                                </p>
                            @enderror
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pr-11 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Enter new password confirmation">
                            @error('password_confirmation')
                                <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="grid gap-2 form-group sm:grid-cols-12">
                    <div class="sm:col-span-3">
                        <label for="nuptk" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            NUPTK
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input type="nuptk" name="nuptk"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pointer-events-none opacity-70 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                            placeholder="Email Guru" value="{{ Auth::user()->nuptk }}" disabled readonly>
                    </div>
                </div>

                <div class="grid gap-2 form-group sm:grid-cols-12">
                    <div class="sm:col-span-3">
                        <label for="tempat_lahir"
                            class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Tempat Lahir
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input id="tempat_lahir" type="text"
                            class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pr-11 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                            placeholder="John Doe" name="tempat_lahir"
                            value="{{ old('tempat_lahir', Auth::user()->tempat_lahir) }}" required autofocus>
                        @error('tempat_lahir')
                            <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="grid gap-2 form-group sm:grid-cols-12">
                    <div class="sm:col-span-3">
                        <label for="tanggal_lahir"
                            class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Tanggal Lahir
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input type="date" name="tanggal_lahir"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                            value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}" required>
                        @error('tanggal_lahir')
                            <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="grid gap-2 form-group sm:grid-cols-12">
                    <div class="sm:col-span-3">
                        <label for="jenis_kelamin"
                            class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Jenis Kelamin
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <select name="jenis_kelamin"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pr-9 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="L"
                                {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="P"
                                {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="grid gap-2 form-group sm:grid-cols-12">
                    <div class="sm:col-span-3">
                        <label for="agama" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Agama
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <select name="agama"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md pr-9 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <option selected>Pilih Agama</option>
                            <option value="Islam"
                                {{ old('agama', Auth::user()->agama) == 'Islam' ? 'selected' : '' }}>
                                Islam</option>
                            <option value="Kristen"
                                {{ old('agama', Auth::user()->agama) == 'Kristen' ? 'selected' : '' }}>
                                Kristen</option>
                            <option value="Katolik"
                                {{ old('agama', Auth::user()->agama) == 'Katolik' ? 'selected' : '' }}>
                                Katolik</option>
                            <option value="Hindu"
                                {{ old('agama', Auth::user()->agama) == 'Hindu' ? 'selected' : '' }}>
                                Hindu</option>
                            <option value="Buddha"
                                {{ old('agama', Auth::user()->agama) == 'Buddha' ? 'selected' : '' }}>
                                Buddha</option>
                            <option value="Konghucu"
                                {{ old('agama', Auth::user()->agama) == 'Konghucu' ? 'selected' : '' }}>
                                Konghucu</option>
                        </select>
                        @error('agama')
                            <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="grid gap-2 form-group sm:grid-cols-12">
                    <div class="sm:col-span-3">
                        <label for="alamat" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Alamat
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <textarea name="alamat"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                            rows="3" placeholder="Alamat" required>{{ old('alamat', Auth::user()->alamat) }}</textarea>
                        @error('alamat')
                            <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="grid gap-2 form-group sm:grid-cols-12">
                    <div class="sm:col-span-3">
                        <label for="no_hp" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Nomor HP
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input type="text" name="no_hp"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                            placeholder="No. HP" value="{{ old('no_hp', Auth::user()->no_hp) }}" required>
                        @error('no_hp')
                            <p class="mt-2 text-sm text-red-600" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
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
