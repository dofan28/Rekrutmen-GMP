{{--
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="authenticate">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model.lazy="remember" id="remember" type="checkbox"
                            class="form-checkbox w-4 h-4 text-indigo-600 transition duration-150 ease-in-out" />
                        <label for="remember" class="block ml-2 text-sm text-gray-900 leading-5">
                            Remember
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Sign in
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div> --}}


<div>
    <div class="flex items-center min-h-screen p-4  lg:justify-center">
        <div
            class="flex flex-col overflow-hidden bg-white rounded-md shadow-lg max md:flex-row md:flex-1 lg:max-w-screen-md">
            <div
                class="p-4 py-6 text-white bg-blue-800 md:w-80 md:flex-shrink-0 md:flex md:flex-col md:items-center md:justify-evenly">
                <div class="my-3 text-4xl font-bold tracking-wider text-center">
                    <a wire:navigate href="#">Lorem</a>
                </div>
                <p class="mt-6 font-normal text-center text-gray-300 md:mt-0">
                    Selamat datang kembali! Silakan masuk ke akun Anda untuk melanjutkan perjalanan pencarian karier
                    Anda..
                </p>
                <p class="flex flex-col items-center justify-center mt-10 text-center">
                    <span>Belum punya akun?</span>
                    <a wire:navigate href="/register" class="underline">Daftar Sekarang</a>
                </p>
                <p class="mt-6 text-sm text-center text-gray-300">
                    Read our <a wire:navigate href="#" class="underline">terms</a> and <a wire:navigate
                        href="#" class="underline">conditions</a>
                </p>
            </div>
            <div class="p-5 bg-white md:flex-1">


                <h3 class="mb-4 text-2xl font-semibold text-gray-800">Masuk</h3>
                @if (session()->has('loginError'))
                    <div class="hidden w-full items-center rounded-lg bg-danger-100 px-3 py-2 text-sm text-danger-700 data-[te-alert-show]:inline-flex font-semibold"
                        role="alert" data-te-alert-init data-te-alert-show>
                        <span class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        {{ session('loginError') }}
                        <button type="button"
                            class="box-content p-1 ml-auto border-none rounded-none opacity-50 text-warning-900 hover:text-warning-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-alert-dismiss aria-label="Close">
                            <span
                                class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="mb-3 hidden w-full items-center rounded-lg bg-success-100 px-3 py-2 text-sm text-success-700 data-[te-alert-show]:inline-flex font-semibold"
                        role="alert" data-te-alert-init data-te-alert-show>
                        <span class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        {{ session('success') }}
                        <button type="button"
                            class="box-content p-1 ml-auto border-none rounded-none opacity-50 text-warning-900 hover:text-warning-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-alert-dismiss aria-label="Close">
                            <span
                                class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                    </div>
                @endif

                <form wire:submit="authenticate" class="flex flex-col space-y-5">
                    <div class="flex flex-col space-y-1">
                        <label for="email" class="text-sm font-semibold text-gray-600">Alamat Email</label>
                        <input wire:model='email' name="email" type="email" id="email"
                            placeholder="Alamat Email"
                            class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200 @error('email') is-invalid @enderror" />
                        @error('email')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-1">
                        <div class="flex items-center justify-between">
                            <label for="password" class="text-sm font-semibold text-gray-600">Kata Sandi</label>
                            <a wire:navigate href="password/reset"
                                class="text-sm text-blue-900 hover:underline focus:text-blue-600">Lupa
                                kata sandi?</a>
                        </div>
                        <input wire:model='password' type="password" name="password" id="password" placeholder="Kata Sandi"
                            class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200 @error('password') is-invalid @enderror" />
                        @error('password')
                            <p class="text-sm text-red-500">{{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex items-center space-x-2">
                        <input wire:model="remember" type="checkbox" id="remember"
                            class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200" />
                        <label for="remember" class="text-sm font-semibold text-gray-600">Ingat saya</label>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full px-4 py-2 text-lg font-semibold text-white transition-colors duration-300 bg-blue-800 rounded-md shadow hover:bg-blue-900 focus:outline-none focus:ring-blue-200 focus:ring-4">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
