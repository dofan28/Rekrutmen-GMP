<div class="container mx-auto pt-[3rem]">
    <div class="flex justify-center px-6 my-12">
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <div class="w-full h-auto  bg-gray-100 hidden lg:block lg:w-1/2 bg-cover "
                style="background-image: url('/images/landing/login.png')"></div>
            <div class="w-full lg:w-1/2 bg-gray-100 p-5 ">
                @if (session()->has('error'))
                    <div class="container w-full mx-auto px-4 py-2 leading-normal">
                        <div class="flex justify-between items-center bg-red-200  border-l-4 border-red-600"
                            x-show="showAlert" x-data="{ 'showAlert': true }">
                            <div class="flex items-center pl-4 py-3 w-11/12 bg-red-100">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" height="24"
                                    viewBox="0 -960 960 960" width="24" fill='#dc2626'>
                                    <path
                                        d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                </svg>
                                </div>
                                <p
                                    class="inline-block align-middle ml-2 text-red-600 text-sm font-medium font-poppins">
                                    {{ session('error') }}

                                </p>
                            </div>
                            <button
                                class="px-4 overflow-hidden bg-transparent text-xl font-medium  text-red-600 font-poppins "
                                @click="showAlert = false">x
                            </button>
                        </div>
                    </div>
                @endif
                {{-- @if (session()->has('status'))
                    <div class="container w-full mx-auto">
                        <div class="w-full px-4 py-2 leading-normal ">
                            <div class="px-4 py-3 rounded-b  relative bg-red-100 border-t-2 border-red-600"
                                x-show="showAlert" x-data="{ 'showAlert': true }">
                                <i class="fa-solid fa-rectangle-xmark  mr-4 text-red-600"></i>
                                <span class="inline-block align-middle mr-8 text-red-600 text-sm font-medium ">
                                    {{ session('loginError') }}
                                </span>
                                <button
                                    class="absolute bg-transparent text-2xl  font-medium leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none">
                                    <span class="text-gray-800" @click="showAlert = false">×</span>
                                </button>
                            </div>

                        </div>

                    </div>
                @endif --}}
                <h3 class="pt-4 text-2xl font-semibold text-center text-gray-800 font-montserrat">MASUK</h3>
                <form wire:submit="authenticate" class="px-8 pt-6 pb-8 mb-4 font-poppins">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-800" for="email">
                            Alamat Email
                        </label>
                        <input wire:model='email'
                            class="w-full px-3 py-2 text-sm leading-tight text-gray-800 border shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="email" type="email" placeholder="contoh: budi@gmail.com"
                            value="{{ old('email') }}" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-800" for="password">
                            Kata Sandi
                        </label>
                        <input wire:model='password'
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-800 border  shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="password" type="password" placeholder="********" value="{{ old('password') }}"
                            required />

                    </div>
                    <div class="mb-4">
                        <input wire:model="remember" class="mr-2 leading-tight" type="checkbox" id="checkbox_id" />
                        <label class="text-sm" for="checkbox_id">
                            Ingat saya
                        </label>
                    </div>
                    <div class="mb-6 text-center">
                        <button
                            class="w-full px-4 py-2 font-bold text-white bg-blue-800  hover:bg-blue-900 focus:outline-none focus:shadow-outline"
                            type="submit">
                            Masuk
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
                        <p class="inline-block text-sm align-baseline">
                            Belum punya akun?
                        </p>
                        <a wire:navigate
                            class="inline-block text-sm text-blue-800 align-baseline hover:text-blue-900 hover:font-medium"
                            href="/register">
                            Daftar Sekarang
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
