 <!-- homepage-navbar -->
 <div class="
 fixed w-full z-50 flex justify-between items-center px-4 md:pl-12
 sm:bg-white  border-b-1 border-gray-800 border-opacity-40
 transition-all duration-200 font-montserrat
 h-20 /* initial size (changes if scrolled down) */
"
     :class="{ 'h-20 lg:bg-gray-800 lg:bg-opacity-30  md:bg-gray-800 md:bg-opacity-30 ': !scrolledFromTop, 'h-16 lg:bg-white': scrolledFromTop }">

     <!-- header -> logo -->

     <a wire:navigate href="#" id="logo" class="text-gray-50 transform origin-left transition duration-200 "
         :class="{ 'scale-100': !scrolledFromTop, 'scale-90': scrolledFromTop }" style="min-width: 250px; ">

         <div class="flex">
             <img src="/images/landing/logo.png" alt="PT. Graha Mutu Persada" srcset="" class="w-30 h-12 ">
             <div class="py-1">
                 <p class="text-base leading-none font-bold "
                     :class="{ 'lg:text-gray-50 md:text-gray-50 sm:text-red-600': !scrolledFromTop, 'text-red-600': scrolledFromTop }">Rekrutmen</p>
                 <p class="text-lg font-bold "
                     :class="{ 'lg:text-gray-50 md:text-gray-50 sm:text-blue-800': !scrolledFromTop, 'text-blue-800': scrolledFromTop }">PT. GRAHA MUTU
                     PERSADA</p>
                 <hr class="border "
                     :class="{ 'lg:border-white md:border-white sm:border-blue-800': !scrolledFromTop, 'border-blue-800': scrolledFromTop }">

             </div>
         </div>

     </a>

     <!-- header -> nav -->
     <!-- TODO: look into (application ui -> navigation -> "vertical navigation") for styling mobile menu -->
     <nav class="">
         <!-- mobile-only -> menu toggle -->
         <!-- TODO: convert to "menu" text -->
         <button class="md:hidden" @click="navOpen = !navOpen">
             <!-- hamburger icon from heroicons (search for "menu") -->
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 class="h-8 w-8 text-gray-800" :class="{'text-gray-50': !scrolledFromTop }" >
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
             </svg>
         </button>

         <!-- menu -->
         <!-- TODO: might want to make second nav for more control over the mobile
             TODO: ..try going from wide to small browser. u can see the nav transition~

             :class="{ 'scale-100': !scrolledFromTop, 'scale-90': scrolledFromTop }"
     -->
         <ul class="
         fixed left-0 right-0 min-h-screen px-4 pt-8 space-y-4
         text-gray-900 bg-gray-100 bg-opacity-90
         transform transition duration-300 translate-x-full
         md:relative md:flex md:space-x-2 md:min-h-0 md:px-0
         md:py-0 md:space-y-0 md:translate-x-0
         md:bg-opacity-0
     "
             :class="{
                 'translate-x-full': !navOpen,
                 'translate-x-0': navOpen,
                 'text-sm': scrolledFromTop
             }">
             <li class="">
                 <a wire:navigate href="/"
                     class="relative font-medium hover:font-semibold w-fit block after:block after:content-[''] after:absolute after:h-[3px] after:bg-yellow-500 after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-left py-2 mx-2"
                     @click="navOpen = false"
                     :class="{
                         'lg:text-gray-50 md:text-gray-50 hover:font-semibold lg:hover:text-white md:hover:text-white sm:hover:text-black': !
                             scrolledFromTop,
                         ' hover:text-black': scrolledFromTop
                     }">
                     BERANDA
                 </a>
             </li>

             <li class="">
                 <a wire:navigate href="#flow"
                     class="relative font-medium hover:font-semibold   w-fit block after:block after:content-[''] after:absolute after:h-[3px] after:bg-yellow-500 after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-left py-2 mx-2 "
                     @click="navOpen = false"
                     :class="{
                         'lg:text-gray-50 md:text-gray-50 hover:font-semibold lg:hover:text-white md:hover:text-white sm:hover:text-black ': !
                             scrolledFromTop,
                         ' hover:text-black': scrolledFromTop
                     }">
                     PANDUAN
                 </a>

             <li class="">
                 <a wire:navigate href="/jobs"
                     class="relative font-medium hover:font-semibold   w-fit block after:block after:content-[''] after:absolute after:h-[3px] after:bg-yellow-500 after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-left py-2 mx-2 "
                     @click="navOpen = false"
                     :class="{
                         'lg:text-gray-50 md:text-gray-50 hover:font-semibold lg:hover:text-white md:hover:text-white sm:hover:text-black': !
                             scrolledFromTop,
                         ' hover:text-black': scrolledFromTop
                     }">
                     LOWONGAN KERJA
                 </a>

             <li class="">
                @guest
                <a wire:navigate
                    class="group relative inline-flex items-center overflow-hidden bg-blue-800 px-6 py-2 text-gray-50 focus:outline-none active:bg-blue-900"
                    href="/login">
                    <span class="absolute -start-full transition-all group-hover:start-4">
                        <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 -960 960 960">
                        <path
                            d="M480-120v-80h280v-560H480v-80h360v720H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"
                            fill='#f9fafb' />
                    </svg>
                    </span>

                    <span class="font-semibold transition-all group-hover:ms-4">MASUK</span>
                </a>
            @endguest
            @auth
                <a wire:navigate
                    class="group relative inline-flex items-center overflow-hidden bg-blue-800 px-6 py-2 text-gray-50 focus:outline-none active:bg-blue-900"
                    href="/applicant/application">
                    <span class="absolute -start-full transition-all group-hover:start-4">

                        <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill='#f9fafb'>
                            <path
                                d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z" />
                        </svg>
                    </span>

                    <span class="font-semibold transition-all group-hover:ms-4">DASHBOARD</span>
                </a>
            @endauth

             </li>
         </ul>
     </nav>
 </div>