<x-filament::page>

<section>
    <article class="bg-white" style="padding: 20px;">
        <div class="flex items-center">
     <div class="image">
        @if (auth()->user()->player)
        <div>
            <img src="{{ asset('storage/'.Auth::user()->player->profile_picture) }}"  alt="">
        </div>
        @endif
        @if (auth()->user()->referee)
        <div>
            <img src="{{ asset('storage/'.Auth::user()->referee->profile_picture) }}"  alt="">
        </div>
        @endif
        @if (auth()->user()->teamOfficial)
        <div>
            <img src="{{ asset('storage/'.Auth::user()->teamOfficial->profile_picture) }}"  alt="">
        </div>
        @endif
        @if (auth()->user()->tournamentOfficial)
        <div>
            <img src="{{ asset('storage/'.Auth::user()->tournamentOfficial->profile_picture) }}"  alt="">
        </div>
        @endif
     </div>
      <div class="profile-details font-bold" style="margin-left: 20px">
        <h5>Name: {{ Auth::user()->name }}</h5>
        @if (auth()->user() && auth()->user()->player)
        <h5>Type of sport: {{ auth()->user()->player->type_of_sport }}</h5>
        @endif
        @if (auth()->user() && auth()->user()->referee)
        <h5>Type of sport: {{ auth()->user()->referee->type_of_sport }}</h5>
        @endif

        @if (auth()->user() && auth()->user()->teamOfficial)
        <h5>Type of sport: {{ auth()->user()->teamOfficial->type_of_sport }}</h5>
        @endif

        @if (auth()->user() && auth()->user()->tournamentOfficial)
        <h5>Type of sport: {{ auth()->user()->tournamentOfficial->type_of_sport }}</h5>
        @endif

        @if (auth()->user() && auth()->user()->player)
        <h5>Position: {{ auth()->user()->player->player_position }}</h5>
        @endif

        @if (auth()->user() && auth()->user()->referee)
        <h5>Member: {{ auth()->user()->referee->member }}</h5>
        @endif
      </div>


        </div>

    </article>
</section>

</x-filament::page>
