<div class="container mx-auto pt-[3rem]">
    <div class="flex justify-center px-6 my-12 ">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <!-- Col -->
            <div class="w-full h-auto bg-gray-100 hidden lg:block lg:w-1/2 bg-cover "
                style="background-image: url('/images/landing/forgot-password.png')"></div>
            <!-- Col -->
            <div class="w-full lg:w-1/2 bg-gray-100 p-5">
                <div class="px-8 mb-4 text-center">
                    <h3 class="pt-4 mb-2 text-2xl font-montserrat font-semibold text-gray-800">Lupa Kata Sandi ?</h3>
                    <p class="mb-4 text-sm text-gray-800 font-poppins">
                        Kami mengerti, kadang-kadang hal-hal seperti ini terjadi. Cukup masukkan alamat email Anda di
                        bawah ini, dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda!
                    </p>
                </div>
                @if ($emailSentMessage)
                    <div class="rounded-md bg-green-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                            <div class="ml-3">
                                <p class="text-sm leading-5 font-medium text-green-800">
                                    {{ $emailSentMessage }}
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <form wire:submit="sendResetPasswordLink" class="px-8 pt-6 pb-8 mb-4 bg-gray-100 ">
                        <div class="mb-4 font-poppins">
                            <label class="block mb-2 text-sm font-bold text-gray-800" for="email">
                                Alamat Email
                            </label>
                            <input wire:model="email" value="{{ old('email') }}"
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-800 border  shadow appearance-none focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                                id="email" type="email" placeholder="contoh: budi@gmail.com" required />
                            @error('email')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-gray-100 bg-red-600  hover:bg-red-700 focus:outline-none focus:shadow-outline"
                                type="submit">
                                Atur Ulang Kata Sandi
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                        <div class="text-center">
                            <a wire:navigate
                                class="inline-block text-sm text-blue-800 align-baseline hover:text-blue-800 font-poppins"
                                href="/register">
                                Buat akun baru!
                            </a>
                        </div>
                        <div class="text-center">
                            <p class="inline-block text-sm align-baseline font-poppins">
                                Sudah punya akun?
                            </p>
                            <a wire:navigate
                                class="inline-block text-sm text-blue-800 align-baseline hover:text-blue-900 hover:font-medium font-poppins"
                                href="/login">
                                Masuk!
                            </a>
                        </div>
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>
