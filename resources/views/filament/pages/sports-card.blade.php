<x-filament::page>

<style>
 .card-content {
    max-width: 600px;
    padding: 30px;
    color: white;
    border-radius: 10px;
    margin: 20px auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
.info{
  margin-bottom: 10px;
}
  .logo-container {
    display: flex;
    align-items: start;
  }

  .logo-img {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    padding-right: 10px;
    background-color: transparent;
    display: flex;
    justify-content:start;
    align-items: center;
    /* margin-right: 10px; */
  }

  .text-container {
    text-align: left;
  }

  .title {
    text-transform: uppercase;
    font-weight: 800;
    font-style: italic;
    font-size: 0.8rem;
    margin-top: -5px;
  }

  .subtitle {
    font-size: 0.8rem;
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
    font-size: 0.5rem;
  }

  .info-subtitle {
    text-transform: uppercase;
    font-weight: 100;
    font-size: 0.6rem;
  }

  .card-image {
    position: relative;
  }

  .player-image {
    height: auto;
    max-width: 100%;
    border-radius: 10px;
    margin-top: -10px;
  }

  .timestamp {
    font-size: 0.9rem;
    text-align: center;
    font-weight: bold;
    background-color: black;
    padding: 3px 0;
    border-radius: 6px;
    margin-top: 5px;
  }
</style>



@if (auth()->user()->registration_type === "Player" && auth()->user()->player)
<div class="card-content"  style="background-image:url(/images/bg-id.jpg)">
  <div class="logo-container">
    <div class="logo-img">
      <img src="{{ asset('images/sports.png') }}" alt="">
    </div>
    <div class="text-container">
      <h3 class="title">Sports Federation</h3>
      <h4 class="subtitle">ID Card</h4>
    </div>
  </div>
  <div class="info-container">
    <div class="info">
      <h2 class="info-title">{{ Auth::user()->name }}</h2>
      <h4 class="info-subtitle">Player Name</h4>
    </div>
    <div class="info">
      <h2 class="info-title">{{ Auth::user()->player->type_of_sport }}</h2>
      <h4 class="info-subtitle">Type of Sport</h4>
    </div>
    <div class="info">
      <h2 class="info-title">{{ Auth::user()->player->player_position }}</h2>
      <h4 class="info-subtitle">Player Position</h4>
    </div>
  </div>
  <div class="card-image">
    <img src="{{ asset('storage/'.Auth::user()->player->profile_picture) }}" alt="" class="player-image">
    <div class="timestamp">{{ Auth::user()->created_at->format('Ymdis') }}</div>
  </div>
</div>

<div style="margin-top:30px;">
    <a href="{{ route('generate-player-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif



@if (auth()->user()->registration_type === "Referee" && auth()->user()->referee)
<div class="card-content"  style="background-image:url(/images/bg-id.jpg)">
  <div class="logo-container">
    <div class="logo-img">
      <img src="{{ asset('images/sports.png') }}" alt="">
    </div>
    <div class="text-container">
      <h3 class="title">Sports Federation</h3>
      <h4 class="subtitle">ID Card</h4>
    </div>
  </div>
  <div class="info-container">
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
  <div class="card-image">
    <img src="{{ asset('storage/'.Auth::user()->referee->profile_picture) }}" alt="" class="player-image">
    <div class="timestamp">{{ Auth::user()->created_at->format('Ymdis') }}</div>
  </div>
</div>

<div style="margin-top:30px;">
    <a href="{{ route('generate-referee-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif


@if (auth()->user()->registration_type === "Team official" && auth()->user()->teamOfficial)
<div class="card-content"  style="background-image:url(/images/bg-id.jpg)">
  <div class="logo-container">
    <div class="logo-img">
      <img src="{{ asset('images/sports.png') }}" alt="">
    </div>
    <div class="text-container">
      <h3 class="title">Sports Federation</h3>
      <h4 class="subtitle">ID Card</h4>
    </div>
  </div>
  <div class="info-container">
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
  <div class="card-image">
    <img src="{{ asset('storage/'.Auth::user()->teamOfficial->profile_picture) }}" alt="" class="player-image">
    <div class="timestamp">{{ Auth::user()->created_at->format('Ymdis') }}</div>
  </div>
</div>

<div style="margin-top:30px;">
    <a href="{{ route('generate-team-official-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif


@if (auth()->user()->registration_type === "Tournament official" && auth()->user()->tournamentOfficial)
<div class="card-content"  style="background-image:url(/images/bg-id.jpg)">
  <div class="logo-container">
    <div class="logo-img">
      <img src="{{ asset('images/sports.png') }}" alt="">
    </div>
    <div class="text-container">
      <h3 class="title">Sports Federation</h3>
      <h4 class="subtitle">ID Card</h4>
    </div>
  </div>
  <div class="info-container">
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
  <div class="card-image">
    <img src="{{ asset('storage/'.Auth::user()->tournamentOfficial->profile_picture) }}" alt="" class="player-image">
    <div class="timestamp">{{ Auth::user()->created_at->format('Ymdis') }}</div>
  </div>
</div>

<div style="margin-top:30px;">
    <a href="{{ route('generate-tournament-official-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif

</x-filament::page>
