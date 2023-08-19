

<div class="card-content" style="position: relative margin-top:20px;   max-width: 700px;
background-image: url('{{ public_path('images/id-bg.jpg') }}');
padding: 40px;
color:white;
border-radius: 6px; ">
    <div style=" margin-bottom:40px;">
        <div  style="color: white">
            <img src="{{ public_path('images/layer.png') }}" class=" h-12 w-12 " style="width: 48px; height:48px;" alt="">
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
        <div class="card-image" style=" position:absolute; top:-20px; left:400px; ">
          <img src="{{ public_path('storage/'.Auth::user()->teamOfficial->profile_picture) }}"  alt="" style="height:300px; width:200px;">
          <h6 style="font-size: 1.125rem; text-align:center; font-weight:bold; background-color:black;">{{ Auth::user()->created_at->format('Ymdis') }}</h6>
        </div>
      </div>
</div>

