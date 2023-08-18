<x-filament::page>

@if(in_array(auth()->user()->registration_type, ["Player", "Referee", "Team official", "Tournament official"]))
<div class="player-cert">
    <div style="border:10px solid black; padding:30;" >
        <div style="border:4px solid red; padding:20px; margin:20px;">
            <h1 style="text-align:center; font-weight:bold; margin-bottom:20px; color:red;">CERTIFICATE OF MEMBERSHIP</h1>
        <p style="text-align:center; font-size:1.5rem; margin-bottom:30px;">This is awarded to</p>
        <h2 style="text-align:center; font-weight:bold; margin-bottom:20px; font-size:3rem; color:red;">{{ auth()->user()->name }}</h2>
        <p style="text-align:center; font-size:1.5rem; margin-bottom:30px;">For his continous membership at the Nairobi  club.</p>
        <div style="text-align: center">
          <img src="{{ public_path('images/logos/sports_logo.png')}}" alt="">
        </div>
        </div>
      </div>

      <div style="margin-top:30px;">
        <a href="{{ route('generate-certificate') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download cert</a>
      </div>
</div>


@endif

</x-filament::page>
