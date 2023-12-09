<div>



    <!-- header section (hero-img and text)
        SET THE HEIGHT FOR THE HEADER HERE
    -->
    <header class="shadow-xl max-h-screen relative hero-bg pt-[10rem]" style="height: 50rem;">

        <!-- hero image -- put img in separate container if you want to use filters
             - you might be able to prevent the filter from changing children via grayscale-0
             - should probably just use img tag with object-cover (instead of div)
        <div class="hero-bg absolute top-0 left-0 w-full h-full grayscale"></div>
        -->

        <!-- TODO: try putting other header-related content here-->
        <div class="bg-zinc-800/50 border w-4/5 max-w-7xl h-[30rem] mx-auto flex gap-4 items-stretch" style="">
            <div class="bg-zinc-800/50">a</div>
            <div class="bg-zinc-800/50">b</div>
        </div>
    </header>

    <!-- call-to-action bar (countdown, link to voting info section, volunteer link, etc)-->
    <div
        class="w-4/5 max-w-7xl h-16 mx-auto flex items-stretch gap-2
            -my-16
            bg-pink-400/50
        ">
        <div class="bg-zinc-300/40 rounded">00:00:00
        </div>
        <div class="bg-zinc-300/40 rounded">b
        </div>

    </div>

    <!-- !================================================================================! -->



    <!-- //section: news -->
    {{-- <section id="news" class="relative pt-24 pb-24 lg:pt-24 lg:pb-28 px-6 sm:px-8 ">
        <div class="relative max-w-7xl mx-auto">
            <!-- section header -->
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">News</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Brief description of the section. Odio nisi, lectus dis nulla. Ultrices maecenas
                    vitae rutrum dolor ultricies donec risus sodales. Tempus quis et.
                </p>
            </div>

            <!-- start: section-content -->
            <div class="mt-12 mx-auto grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 lg:max-w-none">

                <!-- start: card -->
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-zinc-400 border-opacity-50">
                    <!-- img wrapper: full width, 12rem height -->
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1523218577037-34090e084d72?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" alt="">
                    </div>

                    <!-- text section -->
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600 hidden">
                                <a wire:navigate href="#" class="hover:underline"> Article </a>
                            </p>
                            <a wire:navigate href="#" class="block">
                                <p class="text-xl font-semibold text-gray-900">Helping Ohio's farmers</p>
                                <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum
                                    eos quis dolorum.</p>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- end: card -->

                <!-- start: card -->
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-zinc-400 border-opacity-50">
                    <!-- img wrapper: full width, 12rem height -->
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1523218577037-34090e084d72?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" alt="">
                    </div>

                    <!-- text section -->
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600 hidden">
                                <a wire:navigate href="#" class="hover:underline"> Article </a>
                            </p>
                            <a wire:navigate href="#" class="block">
                                <p class="text-xl font-semibold text-gray-900">Helping Ohio's farmers</p>
                                <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum
                                    eos quis dolorum.</p>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- end: card -->

                <!-- start: card -->
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-zinc-400 border-opacity-50">
                    <!-- img wrapper: full width, 12rem height -->
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1523218577037-34090e084d72?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" alt="">
                    </div>

                    <!-- text section -->
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600 hidden">
                                <a wire:navigate href="#" class="hover:underline"> Article </a>
                            </p>
                            <a wire:navigate href="#" class="block">
                                <p class="text-xl font-semibold text-gray-900">Helping Ohio's farmers</p>
                                <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum
                                    eos quis dolorum.</p>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- end: card -->

                <!-- start: card -->
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-zinc-400 border-opacity-50">
                    <!-- img wrapper: full width, 12rem height -->
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1523218577037-34090e084d72?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" alt="">
                    </div>

                    <!-- text section -->
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600 hidden">
                                <a wire:navigate href="#" class="hover:underline"> Article </a>
                            </p>
                            <a wire:navigate href="#" class="block">
                                <p class="text-xl font-semibold text-gray-900">Helping Ohio's farmers</p>
                                <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum
                                    eos quis dolorum.</p>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- end: card -->

            </div>
            <!-- end: section-content -->

        </div>
    </section> --}}

    <!-- !section: platform -->
    <section id="platform" class="bg-gray-100 relative pt-24 pb-24 lg:pt-24 lg:pb-28 px-6 sm:px-8">
        <div class="relative max-w-7xl mx-auto">
            <!-- section header -->
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">ALUR PENDAFTARAN</h2>
            </div>

            <!-- section content -->
            {{-- <div class="mt-12">
                <!-- ideals -->
                <h4 class="text-zinc-500 border-b border-zinc-500 mt-12 mb-2">
                    core ideals
                </h4>
                <div id="platform-ideals" x-data="{ tab: 'transparency' }">
                    <nav class="flex flex-col md:gap-4 md:flex-row">
                        <!--
                        <button type="button" class="
                            text-white bg-blue-800 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2
                            dark:bg-blue-600 dark:hover:bg-blue-800 dark:focus:ring-blue-800
                            focus:ring-4 focus:outline-none focus:ring-blue-300">Transparency</button>
                        <button class="flex-grow">Cooperation</button>
                        <button class="flex-grow">Equality</button>
                        -->
                        <!-- set the class names, or set single class name (i.e. active-tab) and use @apply -->
                        <a wire:navigate href="#" class="flex-grow px-5 py-3 my-2 rounded bg-[#3f51b5] text-white"
                            :class="{'bg-[#232f72]': tab === 'transparency'}"
                            @click.prevent="tab = 'transparency'">Transparency</a>

                        <a wire:navigate href="#" class="flex-grow px-5 py-3 my-2 rounded bg-[#3f51b5] text-white"
                            :class="{'bg-[#232f72]': tab === 'cooperation'}"
                            @click.prevent="tab = 'cooperation'">Cooperation</a>

                        <a wire:navigate href="#" class="flex-grow px-5 py-3 my-2 rounded bg-[#3f51b5] text-white"
                            :class="{'bg-[#232f72]': tab === 'equality'}"
                            @click.prevent="tab = 'equality'">Equality</a>
                    </nav>
                    <div x-show="tab === 'transparency'"
                        class="mt-2 px-5 py-3 rounded border border-zinc-500 text-zinc-600">
                        people are done w/ corrupt government and crooked politicians. We need to regain some of that trust
                    </div>
                    <div x-show="tab === 'cooperation'"
                        class="mt-2 px-5 py-3 rounded border border-zinc-500 text-zinc-600">
                        although im running against Sara, I intend to promote bipartisanship to sponsor and pass
                        common sense legislation. The political rift in the US that accelerated when trump was
                        elected needs to be bridged
                    </div>
                    <div x-show="tab === 'equality'"
                        class="mt-2 px-5 py-3 rounded border border-zinc-500 text-zinc-600">
                        I need my campaign to fully embrace equality - among our staff, among voters, and within our
                        messaging. We need to voice support for all communities, especially those that have been
                        historically left behind or neglected.
                    </div>
                </div>


                <!-- policies -->
                <h4 class="text-zinc-500 border-b border-zinc-500 mt-12 mb-4">
                    policies
                </h4>

                <!--

                <div class="mt-12 mx-auto grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 lg:max-w-none">

                -->
                <div id="platform-policies" class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:max-w-none">

                    <!-- card: climate change -->
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-zinc-400 border-opacity-50 relative bg-white">
                        <a wire:navigate href="#" class="block">
                            <!-- img wrapper: full width, 12rem height -->
                            <div class="flex-shrink-0 flex h-48 relative bg-zinc-900 justify-center items-center">
                                <!-- https://unsplash.com/photos/C8flDkJgneU -->
                                <img class="h-48 w-full object-cover absolute opacity-50"
                                    src="https://images.unsplash.com/photo-1602895931602-8e8decf5d193?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1578&q=80" alt="">
                                <div class="bg-zinc-900/70 text-white px-5 py-3 z-10 rounded text-xl">Climate Change</div>
                            </div>

                            <!-- text section -->
                            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <p class="text-base text-gray-500">It's no secret that climate change is real,
                                        our planet is becoming warmer - and human activity has only worsened the state
                                        of our planet. Until this problem has been solved, it will be my
                                        <span class="font-bold">Number One Issue.</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- card: healthcare -->
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-zinc-400 border-opacity-50 relative bg-white">
                        <a wire:navigate href="#" class="block">
                            <!-- img wrapper: full width, 12rem height -->
                            <div class="flex-shrink-0 flex h-48 relative bg-zinc-900 justify-center items-center">
                                <!-- https://unsplash.com/photos/csWk3OCV7Mc -->
                                <img class="h-48 w-full object-cover absolute opacity-50"
                                    src="https://images.unsplash.com/photo-1612277795009-f95f2e8c4a02?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" alt="">
                                <div class="bg-zinc-900/70 text-white px-5 py-3 z-10 rounded text-xl">Healthcare</div>
                            </div>

                            <!-- text section -->
                            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <p class="text-base text-gray-500">
                                        As a basic right, every Ohioan ought to have access to affordable healthcare.
                                        There should be no question of whether or not a 911 call would be too expensive
                                        or if one should pass up an essential surgery to save funds. We support a glide
                                        path towards a single payer system.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- card: economy -->
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-zinc-400 border-opacity-50 relative bg-white">
                        <a wire:navigate href="#" class="block">
                            <!-- img wrapper: full width, 12rem height -->
                            <div class="flex-shrink-0 flex h-48 relative bg-zinc-900 justify-center items-center">
                                <!-- https://unsplash.com/photos/XrIfY_4cK1w -->
                                <img class="h-48 w-full object-cover absolute opacity-50"
                                    src="https://images.unsplash.com/photo-1618044733300-9472054094ee?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1471&q=80" alt="">
                                <div class="bg-zinc-900/70 text-white px-5 py-3 z-10 rounded text-xl">Economy</div>
                            </div>

                            <!-- text section -->
                            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <p class="text-base text-gray-500">
                                        Currently, Ohio is <span class="font-bold">one of only six states</span>
                                        with a <span class="font-bold text-[#c3142d]">zero percent Corporate Income Tax</span>.
                                        We need to support small businesses and local economies - and make corporations pay
                                        their <span class="font-bold">fair share</span>. Together, we can bolster Ohio's economy
                                        by creating good-paying jobs and lowering taxes for the working class.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- card: education -->
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-zinc-400 border-opacity-50 relative bg-white">
                        <a wire:navigate href="#" class="block">
                            <!-- img wrapper: full width, 12rem height -->
                            <div class="flex-shrink-0 flex h-48 relative bg-zinc-900 justify-center items-center">
                                <!-- https://unsplash.com/photos/2JIvboGLeho -->
                                <img class="h-48 w-full object-cover absolute opacity-50"
                                    src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <div class="bg-zinc-900/70 text-white px-5 py-3 z-10 rounded text-xl">Education</div>
                            </div>

                            <!-- text section -->
                            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <p class="text-base text-gray-500">
                                        As a current student at Miami University, I have been through public and private
                                        education over the past few years. As a result, I am familiar with our school system
                                        and many of its current problems. If we are going to improve the quality of our
                                        education system, we need someone who is able to advocate on behalf of the students.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- card: workers' rights -->
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-zinc-400 border-opacity-50 relative bg-white">
                        <a wire:navigate href="#" class="block">
                            <!-- img wrapper: full width, 12rem height -->
                            <div class="flex-shrink-0 flex h-48 relative bg-zinc-900 justify-center items-center">
                                <!-- https://unsplash.com/photos/VDpYOvZm2Ok -->
                                <img class="h-48 w-full object-cover absolute opacity-50"
                                    src="https://images.unsplash.com/photo-1594581835488-0b95b8b0bacd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <div class="bg-zinc-900/70 text-white px-5 py-3 z-10 rounded text-xl">Workers' Rights</div>
                            </div>

                            <!-- text section -->
                            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <p class="text-base text-gray-500">
                                        The Working Class has been the life force of Ohio for years. Farmers, factory workers,
                                        and other working class citizens are essential to the success of Ohio's economy. They
                                        truly allow our state to function.<br>
                                        <br>
                                        <span class="font-bold text-lg">It's about time we treat them as such.</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>
            </div> --}}

            <div class="mt-12">

                <div class="container">
                    <div class="flex flex-col grid-cols-12 text-gray-600 md:grid">

                        <div class="flex md:contents">
                            <div class="relative col-start-2 col-end-4 mr-10 md:mx-auto">
                                <div class="flex items-end justify-center w-6 h-full">
                                    <div class="w-1 pointer-events-none h-1/2 bg-neutral-300"></div>
                                </div>
                                <div class="absolute w-6 h-6 -mt-3 text-center bg-blue-600 rounded-full shadow top-1/2">
                                    <i class="text-white fa-solid fa-1 fa-xs"></i>
                                </div>
                            </div>
                            <div
                                class="w-full col-start-4 col-end-12 p-4 my-4 mr-auto bg-white border-2 border-blue-600 border-solid shadow-md rounded-xl">
                                <h3 class="mb-1 text-lg font-semibold">Pertama</h3>
                                <p class="w-full leading-tight text-justify">
                                    Daftarkan akun Anda untuk memulai proses pendaftaran
                                </p>
                            </div>
                        </div>

                        <div class="flex md:contents">
                            <div class="relative col-start-2 col-end-4 mr-10 md:mx-auto">
                                <div class="flex items-center justify-center w-6 h-full">
                                    <div class="w-1 h-full pointer-events-none bg-neutral-300"></div>
                                </div>
                                <div class="absolute w-6 h-6 -mt-3 text-center bg-blue-600 rounded-full shadow top-1/2">
                                    <i class="text-white fa-solid fa-2 fa-xs"></i>
                                </div>
                            </div>
                            <div
                                class="w-full col-start-4 col-end-12 p-4 my-4 mr-auto bg-white border-2 border-blue-600 border-solid shadow-md rounded-xl">
                                <h3 class="mb-1 text-lg font-semibold">Kedua</h3>
                                <p class="leading-tight text-justify">
                                    Masuk ke akun yang telah berhasil didaftarkan sebelumnya
                                </p>
                            </div>
                        </div>

                        <div class="flex md:contents">
                            <div class="relative col-start-2 col-end-4 mr-10 md:mx-auto">
                                <div class="flex items-center justify-center w-6 h-full">
                                    <div class="w-1 h-full pointer-events-none bg-neutral-300"></div>
                                </div>
                                <div class="absolute w-6 h-6 -mt-3 text-center bg-blue-600 rounded-full shadow top-1/2">
                                    <i class="text-white fa-solid fa-3 fa-xs"></i>
                                </div>
                            </div>
                            <div
                                class="w-full col-start-4 col-end-12 p-4 my-4 mr-auto bg-white border-2 border-blue-600 border-solid shadow-md rounded-xl">
                                <h3 class="mb-1 text-lg font-semibold">Ketiga</h3>
                                <p class="leading-tight text-justify">
                                    Pilih posisi lamaran yang sesuai dengan minat dan kualifikasi Anda.
                                </p>
                            </div>
                        </div>

                        <div class="flex md:contents">
                            <div class="relative col-start-2 col-end-4 mr-10 md:mx-auto">
                                <div class="flex items-center justify-center w-6 h-full">
                                    <div class="w-1 h-full pointer-events-none bg-neutral-300"></div>
                                </div>
                                <div
                                    class="absolute w-6 h-6 -mt-3 text-center bg-blue-600 rounded-full shadow top-1/2">
                                    <i class="text-white fa-solid fa-4 fa-xs"></i>
                                </div>
                            </div>
                            <div
                                class="w-full col-start-4 col-end-12 p-4 my-4 mr-auto bg-white border-2 border-blue-600 border-solid shadow-md rounded-xl">
                                <h3 class="mb-1 text-lg font-semibold">Keempat</h3>
                                <p class="leading-tight text-justify">
                                    Lengkapi informasi pribadi dan riwayat kerja Anda untuk melengkapi proses
                                    pendaftaran.
                                </p>
                            </div>
                        </div>

                        <div class="flex md:contents">
                            <div class="relative col-start-2 col-end-4 mr-10 md:mx-auto">
                                <div class="flex items-start justify-center w-6 h-1/2">
                                    <div class="w-1 h-full pointer-events-none bg-neutral-300"></div>
                                </div>
                                <div
                                    class="absolute w-6 h-6 -mt-3 text-center bg-blue-600 rounded-full shadow top-1/2">
                                    <i class="text-white fa-solid fa-5 fa-xs"></i>
                                </div>
                            </div>
                            <div
                                class="w-full col-start-4 col-end-12 p-4 my-4 mr-auto bg-white border-2 border-blue-600 border-solid shadow-md rounded-xl">
                                <h3 class="mb-1 text-lg font-semibold">Kelima</h3>
                                <p class="leading-tight text-justify">
                                    Kirimkan CV Anda agar dapat dipertimbangkan oleh tim perekrutan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{-- Company Entity --}}
<div class="w-full px-32 pt-20 pb-32 mx-auto">
    <h1 class="mb-6 text-4xl font-semibold text-center text-gray-800 uppercase">
        DAFTAR PERUSAHAAN DALAM <br>ENTITAS KAMI
    </h1>
    <p class="text-center text-gray-600">Berikut daftar perusahaan kami yang saat ini membuka lowongan pekerjaan:</p>
    @if ($jobcompanies->where('deleted_at', null)->isEmpty())
        <div class="h-screen mt-24 text-center text-gray-600">
            <h1 class="mb-2 text-2xl font-semibold lg:text-3xl">Maaf, saat ini di entitas perusahaan kami tidak memiliki
                lowongan pekerjaan yang tersedia.</h1>
            <h3 class="text-lg lg:text-xl">Terima kasih telah berkunjung ke website kami.</h3>
        </div>
    @else
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 pt-14">
            @foreach ($jobcompanies as $jobcompany)
                <div class="p-4 text-center bg-white rounded-md shadow-md">
                    <div class="flex items-center justify-center ">
                        <i class="p-3 text-5xl bg-blue-600 rounded fa-solid fa-building" style="color: #ffffff;"></i>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600">{{ $jobcompany->name }}</p>
                    </div>
                    <a wire:navigate href="/company/{{ $jobcompany->id }}">
                        <button
                            class="w-full px-4 py-2 mt-4 text-gray-600 rounded bg-neutral-100 hover:bg-blue-600 hover:text-white">
                            {{ $jobcompany->job->where('status', 1)->count() }} Lowongan Tersedia</button>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>

    {{-- <section id="example" class=" relative pt-24 pb-24 lg:pt-24 lg:pb-28 px-6 sm:px-8 ">
        <!-- if you want a back panel effect behind everything
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3"></div>
        </div>
        -->
        <div class="relative max-w-7xl mx-auto">
            <!-- section header -->
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">Section Header</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Brief description of the section. Odio nisi, lectus dis nulla. Ultrices maecenas
                    vitae rutrum dolor ultricies donec risus sodales. Tempus quis et.
                </p>
            </div>

            <!-- section content -->
            <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover"
                            src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                            alt="">
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a wire:navigate href="#" class="hover:underline"> Article </a>
                            </p>
                            <a wire:navigate href="#" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">Boost your conversion rate</p>
                                <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum
                                    eos quis dolorum.</p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a wire:navigate href="#">
                                    <span class="sr-only">Roel Aufderehar</span>
                                    <img class="h-10 w-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a wire:navigate href="#" class="hover:underline"> Roel Aufderehar </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-16"> Mar 16, 2020 </time>
                                    <span aria-hidden="true"> &middot; </span>
                                    <span> 6 min read </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover"
                            src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                            alt="">
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a wire:navigate href="#" class="hover:underline"> Video </a>
                            </p>
                            <a wire:navigate href="#" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">How to use search engine optimization to
                                    drive sales</p>
                                <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora
                                    aut inventore optio animi., tempore temporibus quo laudantium.</p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a wire:navigate href="#">
                                    <span class="sr-only">Brenna Goyette</span>
                                    <img class="h-10 w-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a wire:navigate href="#" class="hover:underline"> Brenna Goyette </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-10"> Mar 10, 2020 </time>
                                    <span aria-hidden="true"> &middot; </span>
                                    <span> 4 min read </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover"
                            src="https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                            alt="">
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a wire:navigate href="#" class="hover:underline"> Case Study </a>
                            </p>
                            <a wire:navigate href="#" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">Improve your customer experience</p>
                                <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Sint harum rerum voluptatem quo recusandae magni placeat saepe molestiae, sed
                                    excepturi cumque corporis perferendis hic.</p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a wire:navigate href="#">
                                    <span class="sr-only">Daniela Metz</span>
                                    <img class="h-10 w-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a wire:navigate href="#" class="hover:underline"> Daniela Metz </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-02-12"> Feb 12, 2020 </time>
                                    <span aria-hidden="true"> &middot; </span>
                                    <span> 11 min read </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}











</div>
