{{-- @section('title', 'Create a new account')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Create a new account
        </h2>

        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
            Or
            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                sign in to your account
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="register">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 leading-5">
                        Name
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="name" id="name" type="text" required autofocus class="appearance-none block w-full px-3 py-2 border  rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" type="email" required class="appearance-none block w-full px-3 py-2 border  rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
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
                        <input wire:model.lazy="password" id="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 leading-5">
                        Confirm Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 appearance-none rounded-md focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Register
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div> --}}


{{-- <div class="flex items-center min-h-screen p-4 lg:justify-center py-20">
    <div
        class="flex flex-col overflow-hidden bg-white rounded-md shadow-lg max md:flex-row md:flex-1 lg:max-w-screen-md">
        <div
            class="p-4 py-6 text-white bg-blue-600 md:w-80 md:flex-shrink-0 md:flex md:flex-col md:items-center md:justify-evenly">
            <div class="my-3 text-4xl font-bold tracking-wider text-center">
                <a href="#">Lorem</a>
            </div>
            <p class="mt-6 font-normal text-center text-gray-300 md:mt-0">
                Mulai perjalanan karier Anda bersama kami. Silakan daftarkan diri Anda untuk mengakses berbagai
                peluang menarik yang sesuai dengan minat dan kualifikasi Anda.
            </p>
            <p class="flex flex-col items-center justify-center mt-10 text-center">
                <span>Sudah punya akun?</span>
                <a href="/login" class="underline">Masuk</a>
            </p>
            <p class="mt-6 text-sm text-center text-gray-300">
                Read our <a href="#" class="underline">terms</a> and <a href="#"
                    class="underline">conditions</a>
            </p>
        </div>
        <div class="p-5 bg-white md:flex-1">
            <h3 class="mt-4 text-2xl font-semibold text-gray-800">Daftar</h3>
            <form wire:submit='register' class="flex flex-col space-y-5">
                @csrf
                <div class="flex flex-col space-y-1">
                    <label for="username" class="text-sm font-semibold text-gray-600">Nama Pengguna</label>
                    <input wire:model='username' type="username" id="username"  placeholder="Masukkan nama pengguna"
                        class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200 @error('username') is-invalid @enderror"
                        value="{{ old('username') }}" required />
                    @error('username')
                        <p class="text-sm text-red-500">{{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="email" class="text-sm font-semibold text-gray-600">Alamat Email</label>
                    <input wire:model='email' type="email" id="email"  placeholder="Masukkan alamat email"
                        class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200 @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required />
                    @error('email')
                        <p class="text-sm text-red-500">{{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col space-y-1">
                    <div class="flex items-center justify-between">
                        <label for="password" class="text-sm font-semibold text-gray-600">Kata Sandi</label>

                    </div>
                    <input wire:model='password' type="password" id="password" placeholder="Masukkan kata sandi"
                        class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200 @error('password') is-invalid @enderror"
                        required />
                    @error('password')
                        <p class="text-sm text-red-500">{{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <div class="flex items-center justify-between">
                        <label for="password_confirmation" class="text-sm font-semibold text-gray-600">Konfirmasi
                            Kata Sandi</label>
                    </div>
                    <input wire:model='passwordConfirmation' type="password" id="password_confirmation"
                        placeholder="Masukkan konfirmasi kata sandi"
                        class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200" />
                </div>
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 text-lg font-semibold text-white transition-colors duration-300 bg-blue-600 rounded-md shadow hover:bg-blue-800 focus:outline-none focus:ring-blue-200 focus:ring-4">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<div class="container mx-auto pt-[3rem]">
    <div class="flex justify-center px-6 my-12">
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <div class="w-full h-auto  hidden lg:block lg:w-5/12 bg-cover "
                style="background-image: url('/images/landing/register.png')"></div>
            <div class="w-full lg:w-7/12 bg-gray-100 p-5  ">
                <h3 class="pt-4 text-2xl text-gray-800 text-center font-montserrat font-semibold">Buat Akun!</h3>
                <form wire:submit='register' class="px-8 pt-6 pb-8 mb-4 font-poppins">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-800" for="username">
                            Nama Pengguna
                        </label>
                        <input wire:model='username'
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-800 border  shadow appearance-none focus:outline-none focus:shadow-outline @error('username') border-red-500 @enderror"
                            id="username" type="text" placeholder="contoh: johndoe" required />
                        @error('username')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-800" for="email">
                            Alamat Email
                        </label>
                        <input wire:model='email'
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-800 border  shadow appearance-none focus:outline-none focus:shadow-outline @error('username') border-red-500 @enderror"
                            id="email" type="email" placeholder="contoh: johndoe@gmail.com" required />
                        @error('email')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4 md:mr-2 md:mb-0">
                            <label class="block mb-2 text-sm font-bold text-gray-800" for="password">
                                Kata Sandi
                            </label>
                            <input wire:model='password'
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-800 border  shadow appearance-none focus:outline-none focus:shadow-outline @error('username') border-red-500 @enderror"
                                id="password" type="password" placeholder="********" required />
                            @error('password')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-800" for="passwordConfirmation">
                                Konfirmasi Kata Sandi
                            </label>
                            <input wire:model='passwordConfirmation'
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-800 border  shadow appearance-none focus:outline-none focus:shadow-outline @error('username') border-red-500 @enderror"
                                id="passwordConfirmation" type="password" placeholder="********" required />
                            @error('passwordConfirmation')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6 text-center">
                        <button
                            class="w-full px-4 py-2 font-bold text-white bg-blue-800 hover:bg-blue-900 focus:outline-none focus:shadow-outline"
                            type="submit">
                            Buat Akun
                        </button>
                    </div>
                    <hr class="mb-6 border-t" />
                    <div class="text-center">
                        <a wire:navigate
                            class="inline-block text-sm text-blue-800 align-baseline hover:text-blue-900 hover:font-medium"
                            href="password/reset">
                            Lupa Password?
                        </a>
                    </div>
                    <div class="text-center">
                        <p class="inline-block text-sm align-baseline ">
                            Sudah punya akun?
                        </p>
                        <a wire:navigate
                            class="inline-block text-sm text-blue-800 align-baseline hover:text-blue-900 hover:font-medium"
                            href="/login">
                            Masuk!
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
