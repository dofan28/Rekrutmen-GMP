{{-- <div>
    <header>
        <nav class="w-full pt-14 lg:py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Buat Data Akun HRD</h2>
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
                                        stroke="#292D32" stroke-width="0.9120000000000001" stroke-miterlimit="10">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="flex items-center px-3 py-1 shadow-sm rounded-2xl bg-gray-50">
                            <div class="flex flex-col h-full mr-2">
                                <h6 class="text-sm font-semibold">
                                    {{  Auth::user()->username }}</h6>
                                <span class="text-xs">Admin</span>
                            </div>
                            @if (Auth::user()->applicantdata->photo ?? '')
                                <img class="rounded-full"
                                    src="{{ asset('storage/' .  Auth::user()->applicantdata->photo) }}"
                                    width="35px" srcset="">
                            @else
                                <img class="rounded-full" src="/storage/images/applicant/default.jpg" width="35px"
                                    srcset="">
                            @endif
                        </div>
                    </div>
                </li>
            </ul>

        </nav>
    </header>
    <div class="w-11/12 p-6 mx-auto mt-10 text-gray-600 bg-white rounded-md shadow-md lg:w-3/4">
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
        <form wire:submit='save' enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="username" class="block font-medium text-gray-600">Nama Panggilan</label>
                <input wire:model='username' type="text" id="username" class="@error('username') is-invalid @enderror  border border-gray-300 rounded-md p-2 w-full" required>
                @error('username')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="full_name" class="block font-medium text-gray-600">Nama Lengkap</label>
                <input wire:model='full_name' type="text" id="full_name" class="@error('fullname') is-invalid @enderror  border border-gray-300 rounded-md p-2 w-full" required>
                @error('fullname')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="hrd_position" class="block font-medium text-gray-600">Posisi</label>
                <select wire:model='hrd_position' id="hrd_position"
                    class="w-full p-2 border border-gray-300 rounded-md @error('hrd_position') is-invalid @enderror"
                    required>
                    <option value="">Pilih Posisi</option>
                    <option value="Staff Recruitment">Staff Recruitment</option>
                    <option value="Staff Payroll">Staff Payroll</option>
                    <option value="Benefits Specialist">Benefits Specialist</option>
                    <option value="Staff Pelatihan dan Pengembangan Karyawan">Staff Pelatihan dan Pengembangan Karyawan
                    </option>
                    <option value="Staff Business Partner">Staff Business Partner</option>
                    <option value="Staff Industrial Relational Manager">Staff Industrial Relational Manager</option>
                    <option value="Staff HRD Manager">Staff HRD Manager</option>
                    <option value="Chief HR Officer">Chief HR Officer</option>
                    <option value="lainnya">Lainnya</option>
                </select>
                <input type="text" id="hrd_position_text" name="hrd_position" style="display: none;"
                    class="w-full p-2 border border-gray-300 rounded-md mt-2 @error('hrd_position') is-invalid @enderror"
                    placeholder="Masukkan posisi baru">
                @error('hrd_position')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="photo" class="block font-medium text-gray-600">Unggah Foto Profil</label>
                <input wire:model='photo' class="@error('photo') is-invalid @enderror  w-full p-2 border border-gray-300 rounded-md"
                    type="file" name="photo" id="photo" accept="image/*">
                @error('photo')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block font-medium text-gray-600">Alamat Email</label>
                <input wire:model='email' type="email" id="email" name="email"
                    class="@error('email') is-invalid @enderror   w-full p-2 border border-gray-300 rounded-md" required>
                @error('email')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for = "password" class="block font-medium text-gray-600 ">Kata Sandi</label>
                <input wire:model='password' type="password" id="password" name="password"
                    class="@error('password') is-invalid @enderror  w-full p-2 border border-gray-300 rounded-md" required>
                @error('password')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for = "password_confirmation" class="block font-medium text-gray-600 ">Konfirmasi Kata Sandi</label>
                <input wire:model='password_confirmation' type="password" id="password_confirmation" name="password_confirmation"
                    class="@error('password_confirmation') is-invalid @enderror  w-full p-2 border border-gray-300 rounded-md" required>
                @error('password')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit"
                    class="px-4 py-2 text-white bg-blue-500 rounded-md hover-bg-blue-600 focus:outline-none focus-bg-blue-600">Buat</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hrdPositionSelect = document.getElementById('hrd_position');
            const hrdPositionText = document.getElementById('hrd_position_text');

            hrdPositionSelect.addEventListener('change', function() {
                if (hrdPositionSelect.value === 'lainnya') {
                    hrdPositionText.style.display = 'block';
                    hrdPositionText.setAttribute('name', 'hrd_position_text');
                } else {
                    hrdPositionText.style.display = 'none';
                    hrdPositionText.removeAttribute('name');
                }
            });

            // Memastikan nilai inputan Lainnya muncul sebagai nilai default
            hrdPositionText.addEventListener('input', function() {
                hrdPositionSelect.value = 'lainnya';
            });
        });
    </script>
    </div>
</div> --}}

<div class="w-full">
    <div class="text-start">
        <h2 class="text-3xl font-bold tracking-wide text-gray-800">Buat Akun HRD</h2>
    </div>
    <div class="w-full px-4 mt-4 overflow-auto border border-blue-200 bg-gray-50">
        <a wire:navigate href="/admin/hrds" class="flex items-center gap-1 mt-4"><svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 -960 960 960" class="w-5 h-5">
                <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
            </svg>
            <span class="text-sm font-poppins">Kembali</span>
        </a>
        <div class="px-8 py-7">
            <form wire:submit='save'>
                <div class="mb-2">
                    <label for="username" class="block mb-1 font-semibold text-gray-800 font-poppins">Nama Panggilan
                    </label>
                    <input wire:model='username' type="text" id="username" name="username"
                        placeholder="contoh: johndoe"
                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('username') border-red-500 @enderror"
                         required>
                    @error('username')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="full_name" class="block mb-1 font-semibold text-gray-800 font-poppins">Nama Lengkap
                    </label>
                    <input wire:model='full_name' type="text" id="full_name" name="full_name"
                        placeholder="contoh: John Doe"
                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('full_name') border-red-500 @enderror"
                         required>
                    @error('full_name')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="email" class="block mb-1 font-semibold text-gray-800 font-poppins">Email
                    </label>
                    <input wire:model='email' type="email" id="email" name="email"
                        placeholder="contoh: johndoe@gmail.com"
                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('email') border-red-500 @enderror"
                         required>
                    @error('email')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password" class="block mb-1 font-semibold text-gray-800 font-poppins">Kata Sandi
                    </label>
                    <input wire:model='password' type="password" id="password" name="password"
                        placeholder="********"
                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('password') border-red-500 @enderror"
                         required>
                    @error('password')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="passwordConfirmation" class="block mb-1 font-semibold text-gray-800 font-poppins">Konfirmasi Kata Sandi
                    </label>
                    <input wire:model='passwordConfirmation' type="password" id="passwordConfirmation" name="passwordConfirmation"
                        placeholder="********"
                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('passwordConfirmation') border-red-500 @enderror"
                         required>
                    @error('passwordConfirmation')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="hrd_position" class="block mb-1 font-semibold text-gray-800 font-poppins">Posisi HRD
                    </label>
                    <select wire:model='hrd_position' name="hrd_position" id="hrd_position"
                        class="w-full appearance-none text-gray-800 py-2 px-3 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins border-gray-800 @error('hrd_position') border-red-500 @enderror" required>
                        <option value="">Pilih Posisi</option>
                        <option value="Staff Recruitment">Staff Recruitment</option>
                        <option value="Staff Payroll">Staff Payroll</option>
                        <option value="Benefits Specialist">Benefits Specialist</option>
                        <option value="Staff Pelatihan dan Pengembangan Karyawan">Staff Pelatihan dan Pengembangan
                            Karyawan
                        </option>
                        <option value="Staff Business Partner">Staff Business Partner</option>
                        <option value="Staff Industrial Relational Manager">Staff Industrial Relational Manager</option>
                        <option value="Staff HRD Manager">Staff HRD Manager</option>
                        <option value="Chief HR Officer">Chief HR Officer</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                    @error('hrd_position')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="photo"
                        class="flex justify-between text-base font-semibold text-gray-800 font-poppins">Unggah Foto
                        <span class="text-xs font-light">(Opsional)</span>
                    </label>
                    @if ($photo)
                        <div class="w-32 mb-2 overflow-hidden rounded h-w-32">
                            <img src="{{ $photo->temporaryUrl() }}" alt="photo" class="object-cover w-full h-full" />
                        </div>
                    @endif
                    <div wire:loading wire:target='photo'>
                        <span class="text-blue-600">Mengunggah ...</span>
                    </div>
                    <label class="block">
                        <input wire:model='photo' type="file" accept="photo/*" id="photo"
                            class="block w-full text-gray-800 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-800 border font-poppins  border-gray-800 @error('photo') border-red-500 @enderror
                              file:me-4 file:py-2 file:px-3
                               file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-800 file:text-white
                              hover:file:bg-blue-900
                              file:disabled:opacity-50 file:disabled:pointer-events-none
                            ">
                    </label>
                    @error('photo')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-center my-6">
                    <button type="submit"
                        class="px-4 py-2 font-semibold text-gray-100 bg-blue-800 hover:bg-blue-900 font-montserrat">BUAT AKUN HRD</button>
                </div>
            </form>
        </div>
    </div>
</div>
