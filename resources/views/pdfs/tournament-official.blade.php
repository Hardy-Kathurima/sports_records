<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tournament official ID</title>
  {{-- <link rel="stylesheet" type="text/css" href="{{ public_path('pdf-styles.css') }}"> --}}

</head>
<body>

  <div class="card-content"  style="background-image:url('{{ public_path('images/bg-id.jpg') }}'); display:flex; ">
    <div class="logo-container" style="display: flex">
      <div class="logo-img">
        <img src="{{ public_path('images/sports.png') }}" alt="">
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
      <img src="{{ public_path('storage/'.Auth::user()->tournamentOfficial->profile_picture) }}" alt="" class="player-image">
      <div class="timestamp">{{ Auth::user()->created_at->format('Ymdis') }}</div>
    </div>
  </div>

</body>
</html>