<x-filament::page>

<style>
  .certificate-container {
      border: 8px solid #ff6f61;
      width: 800px;
      margin: 0 auto;
      padding: 20px;
      position: relative;
      background-color: #fff;
  }

  .inner-container {
      border: 2px solid #8b66b0;
      padding: 30px;
      background-color: rgba(255, 255, 255, 0.95);
      /* background-image: url(images/watermark.jpg); */
      background-repeat: repeat;
      background-size: 15%;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);
      position: relative;
  }

  .title {
      text-align: center;
      font-weight: bold;
      font-size: 28px;
      color: #ff6f61;
      margin-bottom: 10px;
  }

  .name {
      text-align: center;
      font-size: 48px;
      font-weight: bold;
      color: #ff6f61;
      margin-bottom: 10px;
  }

  .description {
      text-align: center;
      font-size: 20px;
      margin-bottom: 20px;
      color: #555;
  }

  .logo-team {
      text-align: center;
      margin-top: 10px;
      margin-left: 250px;
  }

  .trophy {
      position: absolute;
      bottom: 0;
      left: 30px;
      width: 80px;
  }

  .medal {
      position: absolute;
      top: 30px;
      left: 30px;
      width: 60px;
  }

  .signature-area {
      position: absolute;
      bottom: 20px;
      right: 30px;
      width: 200px;
      height: 4px;
      background-color: #333;
  }
</style>

@if(in_array(auth()->user()->registration_type, ["Player", "Referee", "Team official", "Tournament official"]))
<div>
      <div class="certificate-container">
        <div class="inner-container" style="background-image:url(/images/watermark.jpg)">
            <img src="{{ asset('images/trophy.png') }}" alt="Trophy" class="trophy">
            <img src="{{ asset('images/gold-medal.png') }}" alt="Medal" class="medal">
            <h1 class="title">CERTIFICATE OF MEMBERSHIP</h1>
            <p class="description">This is awarded to</p>
            <h2 class="name">{{ auth()->user()->name }}</h2>
            <p class="description">For their <strong>outstanding commitment to the Nairobi Team.</strong></p>
            <div class="signature-area"></div>
            <div class="logo-team">
                <img src="{{ asset('images/logos/sports_logo.png') }}" alt="Sports Logo" width="150">
            </div>
        </div>
    </div>

      <div style="margin-top:30px;">
        <a href="{{ route('generate-certificate') }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download cert</a>
      </div>
</div>


@endif

</x-filament::page>
