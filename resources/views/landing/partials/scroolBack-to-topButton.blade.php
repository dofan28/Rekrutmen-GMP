  <!-- scroll-to-top -->
  <div class="fixed bottom-3 right-3"
  x-data="{ currentScrollPosition: window.pageYOffset }"
  x-show="(currentScrollPosition != 0) ? true : false"
  x-transition:enter="transition ease-out duration-1000"
  x-transition:enter-start="opacity-0 transform -translate-y-48"
  x-transition:enter-end="opacity-100 transform translate-y-0"
  x-transition:leave="transition ease-in-out duration-500"
  x-transition:leave-start="opacity-100 transform translate-0 rotate-0"
  x-transition:leave-end="opacity-0 transform translate-y-4 rotate-180 opacity-0">
 <button class="z-30 p-3 text-white transition duration-300 ease-in-out
                bg-blue-800 rounded-sm focus:outline-none"
         @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
         @scroll.window="currentScrollPosition = window.pageYOffset">
         <i class="fa-solid fa-arrow-up" style="color: #ffffff;"></i>
 </button>
</div>
