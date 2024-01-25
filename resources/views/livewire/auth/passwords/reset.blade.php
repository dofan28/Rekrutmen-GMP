
{{-- <div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Reset password
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="resetPassword">
                <input wire:model="token" type="hidden">

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" type="email" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
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
                            Reset password
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<div class="container mx-auto pt-[3rem]">
    <div class="flex justify-center px-6 my-12">
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <div class="w-full h-auto  hidden lg:block lg:w-5/12 bg-cover "
                style="background-image: url('/images/landing/reset-password.png')"></div>
            <div class="w-full lg:w-7/12 bg-gray-100 p-5  ">
                <h3 class="pt-4 text-2xl text-center font-montserrat font-semibold">ATUR ULANG KATA SANDI</h3>
                <form wire:submit="resetPassword" class="px-8 pt-6 pb-8 mb-4 font-poppins">
                    <input wire:model="token" type="hidden">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-800" for="email">
                            Alamat Email
                        </label>
                        <input wire:model='email'
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
                            Atur Ulang Kata Sandi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
