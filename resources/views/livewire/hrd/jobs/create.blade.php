<div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Publikasi Lowongan</h2>
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
    <div class="w-11/12 p-6 mx-auto mt-10 text-gray-600 bg-white rounded-md shadow-md lg:w-3/4">
        <a wire:navigate href="/hrd/jobs" class="flex items-center mb-4 w-min">
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

        <form wire:submit='create'>
            <div class="mb-4">
                <label for="position" class="block mb-2 font-bold text-gray-700">Posisi</label>
                <input wire:model='position' type="text" id="position" placeholder="Posisi"
                    class="@error('position') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('position')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative mb-4">
                <label for="jobeducation_id" class="block mb-2 font-bold text-gray-700 ">Pendidikan</label>
                <div class="relative">
                    <select wire:model='jobeducation_id'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jobeducation_id') is-invalid @enderror"
                        name="jobeducation_id" id="jobeducation_id">

                        <option value="">Pilih Pendidikan</option>
                        @foreach ($jobeducations as $jobeducation)
                            <option value="{{ $jobeducation->id }}">{{ $jobeducation->name }}</option>
                        @endforeach

                    </select>
                    @error('jobeducation_id')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10.2929 12.7071C10.6834 13.0976 11.3166 13.0976 11.7071 12.7071L16.7071 7.70711C17.0976 7.31658 17.0976 6.68342 16.7071 6.29289C16.3166 5.90237 15.6834 5.90237 15.2929 6.29289L10 11.5858L4.70711 6.29289C4.31658 5.90237 3.68342 5.90237 3.29289 6.29289C2.90237 6.68342 2.90237 7.31658 3.29289 7.70711L8.29289 12.7071C8.68342 13.0976 9.31658 13.0976 9.70711 12.7071C9.89464 12.5196 10 12.2652 10 12C10 11.7348 9.89464 11.4804 9.70711 11.2929L10.2929 12.7071Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="relative mb-4">
                <label for="jobcompany_id" class="block mb-2 font-bold text-gray-700 ">Perusahaan</label>
                <div class="relative">
                    <select wire:model='jobcompany_id'
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jobcompany_id') is-invalid @enderror"
                        name="jobcompany_id" id="jobcompany_id">
                        <option value="">Pilih Perusahaan</option>
                        @foreach ($jobcompanies as $jobcompany)
                            <option value="{{ $jobcompany->id }}">{{ $jobcompany->name }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10.2929 12.7071C10.6834 13.0976 11.3166 13.0976 11.7071 12.7071L16.7071 7.70711C17.0976 7.31658 17.0976 6.68342 16.7071 6.29289C16.3166 5.90237 15.6834 5.90237 15.2929 6.29289L10 11.5858L4.70711 6.29289C4.31658 5.90237 3.68342 5.90237 3.29289 6.29289C2.90237 6.68342 2.90237 7.31658 3.29289 7.70711L8.29289 12.7071C8.68342 13.0976 9.31658 13.0976 9.70711 12.7071C9.89464 12.5196 10 12.2652 10 12C10 11.7348 9.89464 11.4804 9.70711 11.2929L10.2929 12.7071Z" />
                        </svg>
                    </div>
                </div>
                @error('jobcompany_id')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="jobdesk" class="block mb-2 font-bold text-gray-700 ">Jobdesk</label>
                <textarea wire:model='jobdesk' id="jobdesk" placeholder="Jobdesk"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jobdesk') is-invalid @enderror"
                    rows="3"></textarea>
                @error('jobdesk')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="image" class="block mb-2 font-bold text-gray-700 ">Unggah Gambar</label>
                @if ($image)
                    <div class="w-32 mb-2 overflow-hidden rounded h-w-32">
                        <img src="{{ $image->temporaryUrl() }}" alt="image" class="object-cover w-full h-full" />
                    </div>
                @endif
                <div wire:loading wire:target='image'>
                    <span class="text-blue-600">Mengunggah ...</span>
                </div>
                <input wire:model='image'
                    class="@error('image') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="file" id="image" accept="image/*">
                @error('image')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-2 font-bold text-gray-700 ">Deskripsi</label>
                <input wire:model='description' type="hidden" id="description" class="hidden">
                <div wire:ignore>
                    <trix-editor wire:model="description" input="description"></trix-editor>
                </div>
                @error('description')
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <div class="text-center">
                    <button type="submit"
                        class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Publikasi</button>
                </div>
            </div>

        </form>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
</div>
