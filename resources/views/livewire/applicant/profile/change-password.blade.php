<div>
<header>
    <nav class="w-full py-3">
        <ul class="flex items-center justify-between w-full text-gray-600">
            <li>
                <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Kontak</h2>
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
                                {{ Auth::user()->username }}</h6>
                            <span class="text-xs">Pelamar</span>
                        </div>
                        @if (Auth::user()->applicantdata->photo ?? '')
                            <img class="rounded-full"
                                src="{{ asset('storage/' . Auth::user()->applicantdata->photo) }}"
                                width="35px" srcset="">
                        @endif
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</header>
<div class="flex flex-col items-center justify-center w-full">
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
    <div class="w-11/12 p-8 bg-white rounded-lg shadow-md md:w-3/4">
        <div class="relative grid gap-2 mb-2 lg:flex lg:justify-evenly">
            <a wire:navigate href="/applicant/profile/applicantdata"
            class="x-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Data
            Pelamar</a>
        <a wire:navigate href="/applicant/profile/contact"
            class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Kontak</a>
        <a wire:navigate href="/applicant/profile/educationalbackground"
            class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Riwayat
            Pendidikan</a>
        <a wire:navigate href="/applicant/profile/workexperience"
            class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Pengalaman
            Kerja</a>
        <a wire:navigate href="/applicant/profile/organizationalexperience"
            class="px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Pengalaman
            Organisasi</a>
        <a wire:navigate href="/applicant/profile/change-password"
            class="flex justify-start px-4 py-2 text-xs font-semibold text-black bg-white border-2 border-black rounded-md focus:outline-none ">Ganti
            Password</a>
        </div>
        <hr class="my-4 bg-gray-700">
        <form wire:submit='update'>
            <div class="mb-4">
                <label for="current_password" class="block mb-2 text-sm font-bold text-gray-700">Kata Sandi Sekarang</label>
                <input wire:model='current_password' type="password" id="current_password" name="current_password" placeholder="Kata Sandi Sekarang"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('current_password') is-invalid @enderror">
                @error('current_password')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-bold text-gray-700">Kata Sandi Baru</label>
                <input wire:model='password' type="password" id="password" name="password" placeholder="Kata Sandi Baru"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror">
                @error('password')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block mb-2 text-sm font-bold text-gray-700">Konfirmasi Kata
                    Sandi Baru</label>
                <input wire:model='password_confirmation' type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Kata Sandi Baru"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex w-full justify-evenly ">
                <button type="submit"
                    class="px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-200">
                    Reset
                </button>
                <button type="submit"
                    class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
</div>
