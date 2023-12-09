<div>
    <header>
        <nav class="w-full py-3">
            <ul class="flex items-center justify-between w-full text-gray-600">
                <li>
                    <h2 class="ml-4 text-2xl font-semibold lg:ml-10 xl:text-3xl">Ubah Lowongan</h2>
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
    <div class="flex justify-center mt-6">
        <div class="block w-11/12 p-8 bg-white rounded-md shadow-md lg:w-3/4">
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
            <form wire:submit='update' enctype="multipart/form-data">

                <div class="mb-4">
                    <label for="position" class="block mb-2 font-bold text-gray-700">Posisi</label>
                    <input wire:model='position' type="text" id="position" name="position"
                        value="{{ $job->position }}"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>
                <div class="relative mb-4">
                    <label for="company" class="block mb-2 font-bold text-gray-700">Perusahaan</label>
                    <div class="relative">
                        <select wire:model='jobcompany_id' name="jobcompany_id" id="company"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                            @foreach ($jobcompanies as $jobcompany)
                                @if ($job->jobcompany_id == $jobcompany->id)
                                    <option value="{{ $jobcompany->id }}" selected>{{ $jobcompany->name }}</option>
                                @else
                                    <option value="{{ $jobcompany->id }}">{{ $jobcompany->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div
                            class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M10.2929 12.7071C10.6834 13.0976 11.3166 13.0976 11.7071 12.7071L16.7071 7.70711C17.0976 7.31658 17.0976 6.68342 16.7071 6.29289C16.3166 5.90237 15.6834 5.90237 15.2929 6.29289L10 11.5858L4.70711 6.29289C4.31658 5.90237 3.68342 5.90237 3.29289 6.29289C2.90237 6.68342 2.90237 7.31658 3.29289 7.70711L8.29289 12.7071C8.68342 13.0976 9.31658 13.0976 9.70711 12.7071C9.89464 12.5196 10 12.2652 10 12C10 11.7348 9.89464 11.4804 9.70711 11.2929L10.2929 12.7071Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="relative mb-4">
                    <label for="education" class="block mb-2 font-bold text-gray-700">Pendidikan</label>
                    <div class="relative">
                        <select wire:model='jobeducation_id' id="education"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                            @foreach ($jobeducations as $jobeducation)
                                @if ($job->jobeducation_id == $jobeducation->id)
                                    <option value="{{ $jobeducation->id }}" selected>{{ $jobeducation->name }}</option>
                                @else
                                    <option value="{{ $jobeducation->id }}">{{ $jobeducation->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div
                            class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M10.2929 12.7071C10.6834 13.0976 11.3166 13.0976 11.7071 12.7071L16.7071 7.70711C17.0976 7.31658 17.0976 6.68342 16.7071 6.29289C16.3166 5.90237 15.6834 5.90237 15.2929 6.29289L10 11.5858L4.70711 6.29289C4.31658 5.90237 3.68342 5.90237 3.29289 6.29289C2.90237 6.68342 2.90237 7.31658 3.29289 7.70711L8.29289 12.7071C8.68342 13.0976 9.31658 13.0976 9.70711 12.7071C9.89464 12.5196 10 12.2652 10 12C10 11.7348 9.89464 11.4804 9.70711 11.2929L10.2929 12.7071Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="jobdesk" class="block mb-2 font-bold text-gray-700">Jobdesk</label>
                    <textarea wire:model='jobdesk' id="jobdesk" rows="3"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">{{ old('jobdesk', $job->jobdesk) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block mb-2 font-bold text-gray-700">Unggah Gambar</label>
                    @if ($job->image ?? '')
                        <div class="w-32 mb-2 overflow-hidden rounded h-w-32">
                            <img src="{{ asset('storage/' . $job->image) }}" alt="image"
                                class="object-cover w-full h-full" />
                        </div>
                    @endif
                    <input wire:model='image' type="file" id="image"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="description" class="block mb-2 font-bold text-gray-700">Deskripsi</label>
                    <input wire:model='description'type="hidden" id="description" value="{!! $job->description !!}"
                        class="@error('description') is-invalid @enderror w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    <div wire:ignore>
                        <trix-editor wire:model="description" input="description"></trix-editor>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="text-center">
                        <button type="submit"
                            class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
</div>
