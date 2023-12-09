<div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Ganti Password</h2>
                </li>
                
                <li>
                    <div class="flex items-center w-full">
                        <div>
                            <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M12 6.43994V9.76994" stroke="#292D32" stroke-width="0.9120000000000001"
                                        stroke-miterlimit="10" stroke-linecap="round"></path>
                                    <path
                                        d="M12.02 2C8.34002 2 5.36002 4.98 5.36002 8.66V10.76C5.36002 11.44 5.08002 12.46 4.73002 13.04L3.46002 15.16C2.68002 16.47 3.22002 17.93 4.66002 18.41C9.44002 20 14.61 20 19.39 18.41C20.74 17.96 21.32 16.38 20.59 15.16L19.32 13.04C18.97 12.46 18.69 11.43 18.69 10.76V8.66C18.68 5 15.68 2 12.02 2Z"
                                        stroke="#292D32" stroke-width="0.9120000000000001" stroke-miterlimit="10"
                                        stroke-linecap="round"></path>
                                    <path
                                        d="M15.33 18.8201C15.33 20.6501 13.83 22.1501 12 22.1501C11.09 22.1501 10.25 21.7701 9.65004 21.1701C9.05004 20.5701 8.67004 19.7301 8.67004 18.8201"
                                        stroke="#292D32" stroke-width="0.9120000000000001" stroke-miterlimit="10"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="flex items-center px-3 py-1 shadow-sm rounded-2xl bg-gray-50">
                            <div class="flex flex-col h-full mr-2">
                                <h6 class="text-sm font-semibold">
                                    {{ Auth::guard('hrd')->user()->full_name ?? '' }}</h6>
                                <span class="text-xs">HRD</span>
                            </div>
                            @if (Auth::guard('hrd')->user()->photo != "images/hrd/profile/default.jpg" ?? '')
                                <img class="rounded-full" src="{{ asset('storage/' . Auth::guard('hrd')->user()->photo) }}"
                                    width="35px" srcset="">
                            @else
                                <img class="rounded-full" src="/images/hrd/profile/default.jpg" width="35px"
                                    srcset="">
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
            
        </nav>
    </header>
    @if (session()->has('success'))
        <p id="alert" class="px-6 py-4 rounded-lg text-success-700 bg-success-200">{{ session('success') }}</p>
        <script>
            // Menghilangkan alert setelah 3 detik
            setTimeout(function() {
                var alert = document.getElementById('alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif
    @if (session()->has('error'))
        <p id="alert" class="px-6 py-4 rounded-lg text-danger-700 bg-danger-200">{{ session('error') }}</p>
        <script>
            // Menghilangkan alert setelah 3 detik
            setTimeout(function() {
                var alert = document.getElementById('alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif
    <div class="flex items-center justify-center w-full">
        <div class="w-11/12 p-8 bg-white rounded-lg shadow-md md:w-3/4">
            <a wire:navigate href="/hrd/profile" class="flex items-center mb-2 w-min">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 52 52"
                    enable-background="new 0 0 52 52" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0 L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29 h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z">
                        </path>
                    </g>
                </svg>
                <p class="ml-2 font-medium hover:underline">Kembali</p>
            </a>
            <form wire:submit='update'>
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="current_password">
                        Kata Sandi Sekarang</label>
                    <input wire:model='current_password'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('current_password') is-invalid @enderror"
                        type="password" id="current_password" placeholder="Kata sandi Sekarang">
                    @error('current_password')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                        Kata Sandi Baru</label>
                    <input wire:model='password'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror"
                        type="password" id="password" name="password" placeholder="Kata Sandi Baru">
                    @error('password')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="password_confirmation">
                        Konfirmasi Kata Sandi Baru</label>
                    <input wire:model='password_confirmation'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password_confirmation') is-invalid @enderror"
                        type="password" id="password_confirmation"
                        placeholder="Konfirmasi Kata Sandi Baru">
                    @error('password_confirmation')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-center w-full gap-2 font-medium">
                    <button type="submit"
                        class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-200">
                        Reset
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                        Ganti Kata Sandi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
