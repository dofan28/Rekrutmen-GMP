<div class="container mx-auto pt-16">
    <div class="flex flex-col items-center">
        <a href="{{ route('home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-52 h-52" viewBox="0 -960 960 960">
                <path
                    d="M638-80 468-250l56-56 114 114 226-226 56 56L638-80ZM480-520l320-200H160l320 200Zm0 80L160-640v400h206l80 80H80v-640h800v254l-80 80v-174L480-440Zm0 0Zm0-80Zm0 80Z"
                    fill="#1e40af" />
            </svg>
        </a>

        <h2 class="text-3xl font-bold font-montserrat text-center text-gray-800 leading-9">
            Verifikasi Alamat Email Anda
        </h2>

        <p class="font-montserrat mt-2 text-center text-gray-800 leading-5 max-w ">
            Atau
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class=" text-blue-800 hover:text-blue-900 focus:outline-none focus:underline transition ease-in-out duration-15 hover:font-medium">
                Keluar
            </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </p>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-2 py-8 sm:px-10">
            @if (session('resent'))
                <div class="flex items-center px-4 py-3 mb-6 text-sm text-gray-800 font-poppins bg-green-500 rounded shadow"
                    role="alert">
                    <svg class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>

                    <p>Tautan verifikasi baru telah dikirimkan ke alamat email Anda.</p>
                </div>
            @endif

            <div class=" text-gray-800 font-poppins">
                <p class="text-justify">Sebelum melanjutkan, silakan periksa email <b class="font-semibold">{{ auth()->user()->email }}</b> yang Anda daftarkan di website
                    ini untuk mendapatkan tautan verifikasi.</p>
                <a href="/"></a>
                <p class="mt-3 text-justify">
                    Jika Anda tidak mendapatkan tautan verifikasi, <a wire:click="resend"
                        class="text-blue-800 hover:text-blue-900 cursor-pointer focus:outline-none focus:underline transition ease-in-out duration-150 hover:font-medium">Klik
                        di sini untuk meminta tautan verifikasi lagi</a>.
                </p>
            </div>
        </div>
    </div>
</div>
