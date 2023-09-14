<x-filament::page>

<style>

.info{
  margin-bottom: 10px;
}

  .text-container {
    text-align: left;
  }

  .title {
    text-transform: uppercase;
    font-weight: 800;
    font-style: italic;
    font-size: 1rem;
    margin-top: -5px;
  }

  .subtitle {
    font-size: 0.9rem;
    font-style: italic;
  }

  .info-container {
    /* flex-grow: 1; */
    text-align: left;
    padding-right: 10px;
  }

  .info-title {
    text-transform: uppercase;
    font-weight: bold;
    margin-bottom: 5px;
    font-size: 1rem;
  }

  .info-subtitle {
    text-transform: uppercase;
    font-weight: 100;
    font-size: 0.8rem;
  }

  .card-image {
    position: relative;
    color: white;
  }

  .player-image {
    height: auto;
    max-width: 100%;
    border-radius: 10px;
    /* margin-top: -10px; */
  }

  .timestamp {
    font-size: 0.9rem;
    text-align: center;
    font-weight: bold;
    background-color: black;
    color:white
    padding: 3px 0;
    border-radius: 6px;
    margin-top: 5px;
  }
</style>



@if (auth()->user()->registration_type === "Player" && auth()->user()->player)
<div style="background-image:url(/images/bg-id.jpg); max-width:800px; padding:30px;" class="rounded-md">
  <div style="width:60px; height:60px; margin-bottom:10px;">
    <img src="{{ asset('images/sports.png') }}" style="width: 100%; height:auto;" alt="">
  </div>

  <div class="flex justify-between items-center">
    <div>
      <div class="text-container text-white">
        <h3 class="title">Sports Federation</h3>
        <h4 class="subtitle">ID Card</h4>
      </div>
    </div>
    <div>
      <div class="info-container text-white">
        <div class="info">
          <h2 class="info-title">{{ Auth::user()->name }}</h2>
          <h4 class="info-subtitle">Player Name</h4>
        </div>
        <div class="info">
          <h2 class="info-title">{{ Auth::user()->player->type_of_sport }}</h2>
          <h4 class="info-subtitle">Type of Sport</h4>
        </div>
      </div>
    </div>
    <div>
      <div class="card-image">
        <img src="{{ asset('storage/'.Auth::user()->player->profile_picture) }}" alt="" class="player-image">
        <div class="timestamp">{{ Auth::user()->created_at->format('Ymdis') }}</div>
      </div>
    </div>
  </div>

</div>

<div style="margin-top:30px;">
    <a href="{{ route('generate-player-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif



@if (auth()->user()->registration_type === "Referee" && auth()->user()->referee)
<div style="background-image:url(/images/bg-id.jpg); max-width:800px; padding:30px;" class="rounded-md">
  <div style="width:60px; height:60px; margin-bottom:10px;">
    <img src="{{ asset('images/sports.png') }}" style="width: 100%; height:auto;" alt="">
  </div>

  <div class="flex justify-between items-center">
    <div>
      <div class="text-container text-white">
        <h3 class="title">Sports Federation</h3>
        <h4 class="subtitle">ID Card</h4>
      </div>
    </div>
    <div>
      <div class="info-container text-white">
        <div class="info">
          <h2 class="info-title">{{ Auth::user()->name }}</h2>
          <h4 class="info-subtitle">Referee Name</h4>
        </div>
        <div class="info">
          <h2 class="info-title">{{ Auth::user()->referee->type_of_sport }}</h2>
          <h4 class="info-subtitle">Type of Sport</h4>
        </div>
        <div class="info">
          <h2 class="info-title">{{ Auth::user()->referee->member }}</h2>
          <h4 class="info-subtitle">Member</h4>
        </div>
      </div>
    </div>
    <div>
      <div class="card-image">
        <img src="{{ asset('storage/'.Auth::user()->referee->profile_picture) }}" alt="" class="player-image">
        <div class="timestamp">{{ Auth::user()->created_at->format('Ymdis') }}</div>
      </div>
    </div>
  </div>

</div>

<div style="margin-top:30px;">
    <a href="{{ route('generate-referee-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif


@if (auth()->user()->registration_type === "Team official" && auth()->user()->teamOfficial)

<div style="background-image:url(/images/bg-id.jpg); max-width:800px; padding:30px;" class="rounded-md">
  <div style="width:60px; height:60px; margin-bottom:10px;">
    <img src="{{ asset('images/sports.png') }}" style="width: 100%; height:auto;" alt="">
  </div>

  <div class="flex justify-between items-center">
    <div>
      <div class="text-container text-white">
        <h3 class="title">Sports Federation</h3>
        <h4 class="subtitle">ID Card</h4>
      </div>
    </div>
    <div>
      <div class="info-container text-white">
        <div class="info">
          <h2 class="info-title">{{ Auth::user()->name }}</h2>
          <h4 class="info-subtitle">Team official Name</h4>
        </div>
        <div class="info">
          <h2 class="info-title">{{ Auth::user()->teamOfficial->type_of_sport }}</h2>
          <h4 class="info-subtitle">Type of Sport</h4>
        </div>
        <div class="info">
          <h2 class="info-title">{{ Auth::user()->teamOfficial->member }}</h2>
          <h4 class="info-subtitle">Member</h4>
        </div>
      </div>
    </div>
    <div>
      <div class="card-image">
        <img src="{{ asset('storage/'.Auth::user()->teamOfficial->profile_picture) }}" alt="" class="player-image">
        <div class="timestamp">{{ Auth::user()->created_at->format('Ymdis') }}</div>
      </div>
    </div>
  </div>

</div>


<div style="margin-top:30px;">
    <a href="{{ route('generate-team-official-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif


@if (auth()->user()->registration_type === "Tournament official" && auth()->user()->tournamentOfficial)
<div style="background-image:url(/images/bg-id.jpg); max-width:800px; padding:30px;" class="rounded-md">
  <div style="width:60px; height:60px; margin-bottom:10px;">
    <img src="{{ asset('images/sports.png') }}" style="width: 100%; height:auto;" alt="">
  </div>

  <div class="flex justify-between items-center">
    <div>
      <div class="text-container text-white">
        <h3 class="title">Sports Federation</h3>
        <h4 class="subtitle">ID Card</h4>
      </div>
    </div>
    <div>
      <div class="info-container text-white">
        <div class="info">
          <h2 class="info-title">{{ Auth::user()->name }}</h2>
          <h4 class="info-subtitle">Tournament official Name</h4>
        </div>
        <div class="info">
          <h2 class="info-title">{{ Auth::user()->tournamentOfficial->type_of_sport }}</h2>
          <h4 class="info-subtitle">Type of Sport</h4>
        </div>
        <div class="info">
          <h2 class="info-title">{{ Auth::user()->tournamentOfficial->member }}</h2>
          <h4 class="info-subtitle">Member</h4>
        </div>
      </div>
    </div>
    <div>
      <div class="card-image">
        <img src="{{ asset('storage/'.Auth::user()->tournamentOfficial->profile_picture) }}" alt="" class="player-image">
        <div class="timestamp">{{ Auth::user()->created_at->format('Ymdis') }}</div>
      </div>
    </div>
  </div>

</div>

<div style="margin-top:30px;">
    <a href="{{ route('generate-tournament-official-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif

</x-filament::page>
