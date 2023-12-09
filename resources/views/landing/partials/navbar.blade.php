 <!-- navbar -->
 <div class="
 fixed w-full z-50 flex justify-between items-center px-4 md:pl-12
 bg-gray-100 bg-opacity-80 border-b-1 border-gray-700 border-opacity-40
 transition-all duration-200
 h-20 /* initial size (changes if scrolled down) */
"
     :class="{ 'h-20': !scrolledFromTop, 'h-16': scrolledFromTop }">

     <!-- header -> logo -->
     <a wire:navigate href="#" id="logo" class="text-white transform origin-left transition duration-200"
         :class="{ 'scale-100': !scrolledFromTop, 'scale-90': scrolledFromTop }" style="min-width: 250px; ">
         <img src="/images/landing/logo-recruitment.png" alt="PT. Graha Mutu Persada" srcset="" class="w-30 h-12 ">
     </a>

     <!-- header -> nav -->
     <!-- TODO: look into (application ui -> navigation -> "vertical navigation") for styling mobile menu -->
     <nav class="">
         <!-- mobile-only -> menu toggle -->
         <!-- TODO: convert to "menu" text -->
         <button class="md:hidden" @click="navOpen = !navOpen">
             <!-- hamburger icon from heroicons (search for "menu") -->
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 class="h-8 w-8 text-white">
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
         text-gray-900 bg-gray-200 bg-opacity-90
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
                     class="block py-2 px-3 bg-gray-100 rounded bg-opacity-0
                     transition-all duration-300
                     hover:text-gray-100 hover:bg-blue-800"
                     @click="navOpen = false">Beranda</a>
             </li>
             <li class="hidden"> <!-- news -->
                 <a wire:navigate href="#news"
                     class="block py-2 px-3 bg-gray-100 rounded bg-opacity-0
                     transition-all duration-300
                     hover:text-gray-100 hover:bg-blue-800"
                     @click="navOpen = false">News</a>
             </li>
             <li class=""> <!-- platform -->
                 <a wire:navigate href="#platform"
                     class="block py-2 px-3 bg-gray-100 rounded bg-opacity-0
                     transition-all duration-300
                     hover:text-gray-100 hover:bg-blue-800"
                     @click="navOpen = false">Platform</a>
             </li>
             <li class=" hidden"> <!-- endorsements -->
                 <a wire:navigate href="#endorsements"
                     class="block py-2 px-3 bg-gray-100 rounded bg-opacity-0
                     transition-all duration-300
                     hover:text-gray-100 hover:bg-blue-800"
                     @click="navOpen = false">Endorsements</a>
             </li>
             <li class="hidden"> <!-- bio -->
                 <a wire:navigate href="#bio"
                     class="block py-2 px-3 bg-gray-100 rounded bg-opacity-0
                     transition-all duration-300
                     hover:text-gray-100 hover:bg-blue-800"
                     @click="navOpen = false">Meet Sam</a>
             </li>
             <li class=""> <!-- team -->
                 <a wire:navigate href="#team"
                     class="block py-2 px-3 bg-gray-100 rounded bg-opacity-0
                     transition-all duration-300
                     hover:text-gray-100 hover:bg-blue-800"
                     @click="navOpen = false">Team Bamf</a>
             </li>
             <li class=""> <!-- district -->
                 <a wire:navigate href="#district"
                     class="block py-2 px-3 bg-gray-100 rounded bg-opacity-0
                     transition-all duration-300
                     hover:text-gray-100 hover:bg-blue-800"
                     @click="navOpen = false">Our District</a>
             </li>
             <li class="">
                 <a wire:navigate href="/login"
                     class="block py-2 px-3 bg-blue-800 rounded
                     transition-all duration-300 text-gray-100 font-semibold
                     hover:text-gray-50 hover:bg-blue-900"
                     @click="navOpen = false">Masuk</a>
             </li>
         </ul>
     </nav>
 </div>