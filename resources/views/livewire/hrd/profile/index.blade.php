{{-- <div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Profile Saya</h2>
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
    <div class="flex flex-col items-center justify-center w-full">
        <div>
            @if (session()->has('success'))
                <p id="alert" class="px-6 py-4 rounded-lg text-success-700 bg-success-200">{{ session('success') }}
                </p>
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
        </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="w-11/12 p-8 bg-white rounded-lg shadow-md md:w-3/4">
            <form wire:submit='update' enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="flex flex-col">
                    @if (Auth::guard('hrd')->user()->photo != 'images/hrd/profile/default.jpg' ?? '')
                        <div class="flex items-center justify-center w-full h-full overflow-hidden rounded">
                            <img src="{{ asset('storage/' . Auth::guard('hrd')->user()->photo) }}" alt="photo"
                                class="object-cover w-48 h-48" />
                        </div>
                    @else
                        <div class="flex items-center justify-center w-full h-full overflow-hidden rounded">
                            <img src="/images/hrd/profile/default.jpg" alt="photo" class="object-cover w-48 h-48" />
                        </div>
                    @endif
                    <div>
                        <label for="photo" class="block mb-2 font-bold text-gray-700">Unggah Foto
                            Profil</label>
                        <input wire:model.defer='photo' type="file" id="photo" accept="image/*"
                            class="w-full px-3 py-2 mb-2 leading-tight text-gray-700 border rounded photo-preview appearance-noneshadow focus:outline focus:outline-1 focus:shadow-outline"
                            placeholder="Pilih foto..." onchange="previewPhoto()">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="full_name">
                        Nama Lengkap
                    </label>
                    <input wire:model.defer='full_name'
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="full_name" type="text" placeholder="Nama Lengap">
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                        Alamat Email</label>
                    <input wire:model.defer='email'
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="email" type="text" placeholder="Alamat Email">
                </div>
                <div class="grid gap-2 font-medium sm:flex sm:justify-center">
                    <a wire:navigate href="/hrd/change-password"
                        class="flex justify-center px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-200">
                        Ubah Password</a>
                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const hrdPositionSelect = document.getElementById('hrd_position');
                const hrdPositionText = document.getElementById('hrd_position_text');

                // Fungsi untuk menampilkan atau menyembunyikan input teks berdasarkan nilai dropdown saat halaman dimuat
                function toggleInputVisibility() {
                    if (hrdPositionSelect.value === 'lainnya') {
                        hrdPositionText.style.display = 'block';
                    } else {
                        hrdPositionText.style.display = 'none';
                    }
                }

                // Memanggil fungsi saat halaman dimuat
                toggleInputVisibility();

                // Event listener untuk memantau perubahan pada dropdown
                hrdPositionSelect.addEventListener('change', function() {
                    toggleInputVisibility();
                });
            });
        </script>
    </div>
</div> --}}

<div>
    <div class="text-start">
        @include('dashboard.partials.profile.title')
    </div>

    <!-- section content -->
    <div class="flex justify-start items-center mt-4 p-8 h-40 w-full overflow-hidden bg-gray-50">
        @include('dashboard.partials.profile.account-info')
    </div>
    <div class="grid grid-cols-12">

        <div
            class="col-span-12 w-full pr-3 py-6 justify-center flex flex-wrap space-x-4 space-y-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start">
            @include('dashboard.partials.profile.navigation')
        </div>

        <div
            class="col-span-12 md:border-solid md:border-l md:border-gray-800 md:border-opacity-25 h-full pb-12 md:col-span-10">
            <div class="py-4 md:pl-4">
                <div class="flex flex-col space-y-4 bg-gray-50 p-4">

                    <div class="mb-3">
                        @if (!auth()->user()->hrddata)
                            <h3 class="text-2xl font-semibold text-gray-800 tracking-wide font-montserrat">Akun
                            </h3>
                        @else
                            <div class="flex w-full justify-between">
                                <h3 class="text-2xl font-semibold text-gray-800 tracking-wide font-montserrat">Akun Saya
                                </h3>
                                <a wire:navigate href="/hrd/profile/myaccount/{{ auth()->user()->hrddata->id }}/edit"
                                    class="bg-blue-800 hover:bg-blue-900 px-2 py-2 text-gray-50 font-poppins text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                        class="inline-block w-4 h-4" fill='#f9fafb'>
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                    </svg>
                                    <span class="inline-block">Ubah Data</span>
                                </a>
                            </div>
                        @endif
                        <hr class="mt-2">
                    </div>
                    <div>
                        <label class="block mb-1 text-gray-800 font-semibold font-poppins tracking-wide">Nama Lengkap</label>
                        <span
                            class="text-gray-800 font-light font-poppins">{{ auth()->user()->hrddata->full_name ?? 'Belum diisi' }}</span>
                    </div>
                    <div>
                        <label class="block mb-1 text-gray-800 font-semibold font-poppins tracking-wide">Posisi</label>
                        <span
                            class="text-gray-800 font-light font-poppins">{{ auth()->user()->hrddata->hrd_position ?? 'Belum diisi' }}</span>
                    </div>
                </div>



            </div>
        </div>


    </div>
</div>
