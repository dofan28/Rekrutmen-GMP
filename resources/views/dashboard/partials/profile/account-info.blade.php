@if (auth()->user()->role == 'applicant' && auth()->user()->applicantdata && auth()->user()->applicantdata->photo)
    <img src="{{ asset('storage/' . auth()->user()->applicantdata->photo) }}" class="h-28 w-h-28 object-cover">
@elseif (auth()->user()->role == 'hrd' && auth()->user()->hrddata && auth()->user()->hrddata->photo)
    <img src="{{ asset('storage/' . auth()->user()->hrddata->photo) }}" class="h-28 w-h-28 object-cover">
@else
    <img src="/images/profile/default.jpg" class="h-28 w-h-28 object-cover">
@endif
<div class="flex flex-col w-full h-full pl-5">
    <h1 class="text-2xl font-medium text-gray-800 font-montserrat">{{ auth()->user()->username }}</h1>
    <p class="text-sm text-gray-800 font-light font-poppins">{{ auth()->user()->email }}</p>
</div>
