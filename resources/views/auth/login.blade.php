<x-guest-layout title="Login">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-4 text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Silahkan masuk ke akun anda
        </p>
    </div>

    {{-- if error email or password --}}
    @if ($errors->get('email') || $errors->get('password'))
        <div id="dismiss-alert"
            class="p-4 mb-4 transition duration-300 border border-red-200 rounded-md hs-removing:translate-x-5 hs-removing:opacity-0 bg-red-50"
            role="alert">
            <div class="flex">
                <div class="ml-3">
                    <div class="text-sm font-medium text-red-800">
                        <span class="font-bold">Failed,</span> email or password is wrong!
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

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="grid gap-y-4">
            <!-- Email Address -->
            <div>
                <label for="email" class="block mb-2 text-sm dark:text-white">Email address</label>
                <div class="relative">
                    <input type="email" id="email" name="email"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                        required aria-describedby="email-error" value="{{ old('email') }}" required autofocus
                        autocomplete="username" />
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block mb-2 text-sm dark:text-white">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password"
                        class="block w-full px-4 py-3 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                        required aria-describedby="password-error" required autocomplete="current-password">
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <div class="flex">
                    <input id="remember_me" name="remember" type="checkbox"
                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                </div>
                <div class="ml-3">
                    <label for="remember_me" class="text-sm dark:text-white">Remember me</label>
                </div>
            </div>

            <button type="submit"
                class="inline-flex items-center justify-center gap-2 px-4 py-3 text-sm font-semibold text-white transition-all bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                Sign in
            </button>
        </div>
    </form>

    <x-slot name="scripts">
        <script>
            const rememberMe = document.getElementById('remember_me');
            const email = document.getElementById('email');
            const password = document.getElementById('password');

            if (localStorage.checkbox && localStorage.checkbox !== '') {
                rememberMe.setAttribute('checked', 'checked');
                email.value = localStorage.email;
                password.value = atob(localStorage.password)
            } else {
                rememberMe.removeAttribute('checked');
                email.value = '';
                password.value = '';
            }

            rememberMe.addEventListener('click', () => {
                if (rememberMe.checked) {
                    localStorage.setItem('email', email.value);
                    localStorage.setItem('password', btoa(password.value));
                    localStorage.setItem('checkbox', rememberMe.value);
                } else {
                    localStorage.setItem('email', '');
                    localStorage.setItem('password', '');
                    localStorage.setItem('checkbox', '');
                }
            })
        </script>
    </x-slot>
</x-guest-layout>
