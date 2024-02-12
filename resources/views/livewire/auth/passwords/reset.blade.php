<div class="container mx-auto pt-[3rem]">
    <div class="flex justify-center px-6 my-12">
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <div class="w-full h-auto  hidden lg:block lg:w-5/12 bg-cover "
                style="background-image: url('/images/landing/reset-password.png')"></div>
            <div class="w-full lg:w-7/12 bg-gray-100 p-5  ">
                <h3 class="pt-4 text-2xl text-center font-montserrat font-semibold">Atur Ulang Kata Sandi</h3>
                <form wire:submit="resetPassword" class="px-8 pt-6 pb-8 mb-4 font-poppins">
                    <input wire:model="token" type="hidden">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-800" for="email">
                            Alamat Email
                        </label>
                        <input wire:model='email' value="{{ old('email') }}"
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-800 border  shadow appearance-none focus:outline-none focus:shadow-outline @error('username') border-red-500 @enderror"
                            id="email" type="email" placeholder="contoh: budi@gmail.com" required />
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
                            Atur Ulang Kata Sandi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
