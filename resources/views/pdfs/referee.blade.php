<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Referee Identification</title>

</head>
<body>
  <div>
    <div class="card-content" style="background-image: url('{{ public_path('images/bg-id.jpg') }}'); position:relative; padding:50px; color:white; border-radius:10px;"   >
      <div class="logo-container">
        <div class="logo-img" style=" width: 60px;
        height: 60px;
        border-radius: 50%;
        padding-right: 10px;
        background-color: transparent;">
          <img src="{{ public_path('images/sports.png') }}" style="width: 100%; height:auto;" alt="">
        </div>
        <div class="text-container" style="position: absolute; top:200px; padding-right:20px;">
          <h3 class="title" style=" text-transform: uppercase;
          font-weight: 800;
          font-style: italic;
          font-size: 1rem;
          margin-top: -5px;">Sports Federation</h3>
          <h4 class="subtitle">ID Card</h4>
        </div>
      </div>
      <div class="info-container" style="position: relative; top:-20px; left:350px;">
        <div class="info">
          <h2 class="info-title">{{ auth()->user()->name }}</h2>
          <h4 class="info-subtitle">Referee Name</h4>
        </div>
        <div class="info">
          <h2 class="info-title">{{ auth()->user()->referee->type_of_sport }}</h2>
          <h4 class="info-subtitle">Type of Sport</h4>
        </div>

      </div>
      <div class="card-image"  style="position: absolute; top:100px; right:100px;">
        <img src="{{ public_path('storage/'.auth()->user()->referee->profile_picture) }}" alt="" class="player-image" style=" height: auto;
        max-width: 100%;
        border-radius: 10px;
        margin-top: -10px;">
        <div class="timestamp" style=" font-size: 0.9rem;
        text-align: center;
        font-weight: bold;
        background-color: black;
        padding: 3px 0;
        border-radius: 6px;
        margin-top: 5px;">{{ auth()->user()->created_at->format('Ymdis') }}</div>
      </div>
    </div>
  </div>

</body>
</html>