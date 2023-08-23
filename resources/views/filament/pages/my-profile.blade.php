<x-filament::page>
<section>

    @if (!auth()->user()->player || !auth()->user()->referee || !auth()->user()->teamOfficial || !auth()->user()->tournamentOfficial )

    <h2>Please fill all the details to complete the profile</h2>

    @endif



   @if (auth()->user() && auth()->user()->player)
   <article class="player-profile bg-white max-w-xl " style="padding: 40px;">
    <div class="profile-content flex">

        <div class="image">
            <img src="{{ asset('storage/'.Auth::user()->player->profile_picture) }}" style="border-radius: 50%"  width="200" height="200" alt="">
        </div>

        <div class="details" style="margin-left: 40px;">

            <h2 class="font-bold flex items-center" style="margin-bottom: 10px;"> <span class="inline-block" style="margin-right: 5px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              </span> Name: {{ auth()->user()->name }}</h2>
              <h2 class="font-bold flex items-center" style="margin-bottom: 10px;"> <span class="inline-block" style="margin-right: 5px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
              </svg>
              </span> Type of sport: {{ auth()->user()->player->type_of_sport }}</h2>

              <h2 class="font-bold flex items-center" style="margin-bottom: 10px;"> <span class="inline-block" style="margin-right: 5px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
              </svg>
              </span> Player position: {{ auth()->user()->player->player_position }}</h2>
              <h2 class="font-bold flex items-center" style="margin-bottom: 10px;"> <span class="inline-block" style="margin-right: 5px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.87c1.355 0 2.697.055 4.024.165C17.155 8.51 18 9.473 18 10.608v2.513m-3-4.87v-1.5m-6 1.5v-1.5m12 9.75l-1.5.75a3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0L3 16.5m15-3.38a48.474 48.474 0 00-6-.37c-2.032 0-4.034.125-6 .37m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.17c0 .62-.504 1.124-1.125 1.124H4.125A1.125 1.125 0 013 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 016 13.12M12.265 3.11a.375.375 0 11-.53 0L12 2.845l.265.265zm-3 0a.375.375 0 11-.53 0L9 2.845l.265.265zm6 0a.375.375 0 11-.53 0L15 2.845l.265.265z" />
              </svg>

              </span> Player age: {{ auth()->user()->player->age }}</h2>
              <h2 class="font-bold flex items-center" style="margin-bottom: 10px;"> <span class="inline-block" style="margin-right: 5px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
              </svg>
              </span> Player height: {{ auth()->user()->player->height }}</h2>


        </div>
    </div>
    </article>
   @endif

   @if (auth()->user() && auth()->user()->teamOfficial)
   <article class="team-official-profile">
    <div class="profile-content">

        <img src="{{ asset('storage/'.Auth::user()->teamOfficial->profile_picture) }}" style="border-radius: 50%"  width="200" height="200" alt="">
    </div>
    </article>
   @endif


   @if (auth()->user() && auth()->user()->referee)
   <article class="referee-profile">
    <div class="profile-content">
    </div>
    </article>
   @endif

   @if (auth()->user() && auth()->user()->tournamentOfficial)
   <article class="tournament-official-profile">
    <div class="profile-content">
    </div>
    </article>
   @endif
</section>

</x-filament::page>


