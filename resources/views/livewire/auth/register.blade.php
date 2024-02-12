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
                        <input wire:model='username' value="{{ old('username') }}"
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
                        <input wire:model='email' value="{{ old('email') }}"
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-800 border  shadow appearance-none focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
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
                            <input wire:model='password' value="{{ old('password') }}"
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
                            <input wire:model='passwordConfirmation' value="{{ old('passwordConfirmation') }}"
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
