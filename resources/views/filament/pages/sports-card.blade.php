<x-filament::page>



@if (auth()->user()->registration_type === "Player" && auth()->user()->player)
<div class="card-content" style="position: relative margin-top:20px; min-height:400px;    max-width: 700px;
        background-image:url(/images/id-bg.jpg);
        padding: 10px 30px;
        color:white;
        background-size:cover;
        border-radius: 6px;">
    <div style=" margin-bottom:40px; padding-top:60px;">
        <div  style="color: white">
            <img src="{{ asset('images/layer.png') }}" class=" h-12 w-12 " style="width: 48px; height:48px;" alt="">
        </div>
        <div style="position:absolute; left:100px; top:-5px;">
         <h3  style=" text-transform:uppercase; font-weight:800; font-style:italic; font-size:1.5rem;">Sports ferderation</h3>
         <h4  style="font-size: 1.125rem; font-style:italic;  ">ID CARD</h4>
        </div>
       </div>
       <div  style="position:relative">
        <div  style="align-self: center">
          <div class="mb-3" style="margin-bottom: 0.75rem">
            <h2 style="text-transform: uppercase; font-weight:bold;">{{ Auth::user()->name }}</h2>
            <h4 style="text-transform: uppercase; font-weight:100;">Player name</h4>
          </div>
          <div style="margin-bottom: 0.75rem;">
            <h2 style="text-transform: uppercase; font-weight:600;">{{ Auth::user()->player->type_of_sport }}</h2>
            <h4 class="uppercase font-thin" style="font-weight:100; text-transform:uppercase;">Type of sport</h4>
          </div>
          <div >
            <h2 style="text-transform: uppercase; font-weight:600;">{{ Auth::user()->player->player_position }}</h2>
            <h4 class="uppercase font-thin" style="font-weight:100; text-transform:uppercase;">Player Position</h4>
          </div>
        </div>
        <div class="card-image" style=" position:absolute; top:-100px; left:400px; ">

          <img src="{{ asset('storage/'.Auth::user()->player->profile_picture) }}"  alt="" style="height:300px; width:200px;">
          <h6 style="font-size: 1.125rem; text-align:center; font-weight:bold; background-color:black;">{{ Auth::user()->created_at->format('Ymdis') }}</h6>
        </div>
      </div>
</div>

<div style="margin-top:30px;">
    <a href="{{ route('generate-player-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif



@if (auth()->user()->registration_type === "Referee" && auth()->user()->referee)
<div class="card-content" style="position: relative margin-top:20px; min-height:400px;    max-width: 700px;
        background-image:url(/images/id-bg.jpg);
        padding: 10px 30px;
        color:white;
        background-size:cover;
        border-radius: 6px;">
    <div style=" margin-bottom:40px; padding-top:60px;">
        <div  style="color: white">
            <img src="{{ asset('images/layer.png') }}" class=" h-12 w-12 " style="width: 48px; height:48px;" alt="">
        </div>
        <div style="position:absolute; left:100px; top:-5px;">
         <h3  style=" text-transform:uppercase; font-weight:800; font-style:italic; font-size:1.5rem;">Sports ferderation</h3>
         <h4  style="font-size: 1.125rem; font-style:italic;">ID CARD</h4>
        </div>
       </div>
       <div  style="position:relative">
        <div  style="align-self: center">
          <div class="mb-3" style="margin-bottom: 0.75rem">
            <h2 style="text-transform: uppercase; font-weight:bold;">{{ Auth::user()->name }}</h2>
            <h4 style="text-transform: uppercase; font-weight:100;">Referee name</h4>
          </div>
          <div style="margin-bottom: 0.75rem;">
            <h2 style="text-transform: uppercase; font-weight:600;">{{ Auth::user()->referee->type_of_sport }}</h2>
            <h4 class="uppercase font-thin" style="font-weight:100; text-transform:uppercase;">Type of sport</h4>
          </div>
          <div >
            <h2 style="text-transform: uppercase; font-weight:600;">{{ Auth::user()->referee->member }}</h2>
            <h4 class="uppercase font-thin" style="font-weight:100; text-transform:uppercase;">Member</h4>
          </div>
        </div>
        <div class="card-image" style=" position:absolute; top:-100px; left:400px; ">

          <img src="{{ asset('storage/'.Auth::user()->referee->profile_picture) }}"  alt="" style="height:300px; width:200px;">
          <h6 style="font-size: 1.125rem; text-align:center; font-weight:bold; background-color:black;">{{ Auth::user()->created_at->format('Ymdis') }}</h6>
        </div>
      </div>
</div>

<div style="margin-top:30px;">
    <a href="{{ route('generate-referee-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif


@if (auth()->user()->registration_type === "Team official" && auth()->user()->teamOfficial)
<div class="card-content" style="position: relative margin-top:20px; min-height:400px;    max-width: 700px;
        background-image:url(/images/id-bg.jpg);
        padding: 10px 30px;
        color:white;
        background-size:cover;
        border-radius: 6px;">
    <div style=" margin-bottom:40px; padding-top:60px;">
        <div  style="color: white">
            <img src="{{ asset('images/layer.png') }}" class=" h-12 w-12 " style="width: 48px; height:48px;" alt="">
        </div>
        <div style="position:absolute; left:100px; top:-5px;">
         <h3  style=" text-transform:uppercase; font-weight:800; font-style:italic; font-size:1.5rem;">Sports ferderation</h3>
         <h4  style="font-size: 1.125rem; font-style:italic;">ID CARD</h4>
        </div>
       </div>
       <div  style="position:relative">
        <div  style="align-self: center">
          <div class="mb-3" style="margin-bottom: 0.75rem">
            <h2 style="text-transform: uppercase; font-weight:bold;">{{ Auth::user()->name }}</h2>
            <h4 style="text-transform: uppercase; font-weight:100;">Team official name</h4>
          </div>
          <div style="margin-bottom: 0.75rem;">
            <h2 style="text-transform: uppercase; font-weight:600;">{{ Auth::user()->teamOfficial->type_of_sport }}</h2>
            <h4 class="uppercase font-thin" style="font-weight:100; text-transform:uppercase;">Type of sport</h4>
          </div>
          <div >
            <h2 style="text-transform: uppercase; font-weight:600;">{{ Auth::user()->teamOfficial->member }}</h2>
            <h4 class="uppercase font-thin" style="font-weight:100; text-transform:uppercase;">Member</h4>
          </div>
        </div>
        <div class="card-image" style=" position:absolute; top:-100px; left:400px; ">

          <img src="{{ asset('storage/'.Auth::user()->teamOfficial->profile_picture) }}"  alt="" style="height:300px; width:200px;">
          <h6 style="font-size: 1.125rem; text-align:center; font-weight:bold; background-color:black;">{{ Auth::user()->created_at->format('Ymdis') }}</h6>
        </div>
      </div>
</div>

<div style="margin-top:30px;">
    <a href="{{ route('generate-team-official-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif


@if (auth()->user()->registration_type === "Tournament official" && auth()->user()->tournamentOfficial)
<div class="card-content" style="position: relative margin-top:20px; min-height:400px;    max-width: 700px;
        background-image:url(/images/id-bg.jpg);
        padding: 10px 30px;
        color:white;
        background-size:cover;
        border-radius: 6px;">
    <div style=" margin-bottom:40px; padding-top:60px;">
        <div  style="color: white">
            <img src="{{ asset('images/layer.png') }}" class=" h-12 w-12 " style="width: 48px; height:48px;" alt="">
        </div>
        <div style="position:absolute; left:100px; top:-5px;">
         <h3  style=" text-transform:uppercase; font-weight:800; font-style:italic; font-size:1.5rem;">Sports ferderation</h3>
         <h4  style="font-size: 1.125rem; font-style:italic;">ID CARD</h4>
        </div>
       </div>
       <div  style="position:relative">
        <div  style="align-self: center">
          <div class="mb-3" style="margin-bottom: 0.75rem">
            <h2 style="text-transform: uppercase; font-weight:bold;">{{ Auth::user()->name }}</h2>
            <h4 style="text-transform: uppercase; font-weight:100;">Tournament official name</h4>
          </div>
          <div style="margin-bottom: 0.75rem;">
            <h2 style="text-transform: uppercase; font-weight:600;">{{ Auth::user()->tournamentOfficial->type_of_sport }}</h2>
            <h4 class="uppercase font-thin" style="font-weight:100; text-transform:uppercase;">Type of sport</h4>
          </div>
          <div >
            <h2 style="text-transform: uppercase; font-weight:600;">{{ Auth::user()->tournamentOfficial->member }}</h2>
            <h4 class="uppercase font-thin" style="font-weight:100; text-transform:uppercase;">Member</h4>
          </div>
        </div>
        <div class="card-image" style=" position:absolute; top:-100px; left:400px; ">

          <img src="{{ asset('storage/'.Auth::user()->tournamentOfficial->profile_picture) }}"  alt="" style="height:300px; width:200px;">
          <h6 style="font-size: 1.125rem; text-align:center; font-weight:bold; background-color:black;">{{ Auth::user()->created_at->format('Ymdis') }}</h6>
        </div>
      </div>
</div>

<div style="margin-top:30px;">
    <a href="{{ route('generate-tournament-official-id') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download card</a>
  </div>

@endif

</x-filament::page>
