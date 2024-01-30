<img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
            class="h-28 w-h-28 object-cover">
        <div class="flex flex-col w-full h-full pl-5">
            <h1 class="text-2xl font-medium text-gray-800 font-montserrat">{{ auth()->user()->username }}</h1>
            <p class="text-sm text-gray-800 font-light font-poppins">{{ auth()->user()->email }}</p>
        </div>
