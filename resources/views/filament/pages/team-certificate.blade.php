<x-filament::page>



<style>
    .certificate-container {
        border: 8px solid #555;
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        position: relative;
        background-color: #fff;
    }

    .inner-container {
        border: 2px solid #8b66b0;
        padding: 30px;
        background-color: rgba(255, 255, 255, 0.95);

        background-repeat: repeat;
        background-size: 15%;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);
        position: relative;
    }

    .title {
        text-align: center;
        font-weight: bold;
        font-size: 24px;
        color: #ff6f61;
        margin-top: 80px;
        margin-bottom: 10px;
    }

    .name {
        text-align: center;
        font-size: 24px;
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
        margin-top: 50px;
        height: 50px;
        width: 50px;
        margin-left: 250px;
    }

    .trophy {
        position: absolute;
        top: 350px;
        left: 30px;
        width: 80px;
    }

    .medal {
        position: absolute;
        top: 20px;
        left: 160px;
        width: 60px;

    }

    .signature-area {
        position: absolute;
        right: 60px;
        margin-top: 5px;
        width: 200px;
        height: 4px;
        background-color: #333;
    }
    @media screen and (max-width: 768px) {
        .certificate-container {
        border: 8px solid #555;
        width: auto;
        margin: 0 auto;
        padding: 20px;
        position: relative;
        background-color: #fff;
    }
}
</style>



<section>
    <article>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse ($teams as $team)
            <div>
                <div class="certificate-container">
                    <div class="inner-container" style="background-image:url(/images/cert-bg2.jpg); background-repeat:no-repeat; background-size:cover;">
                        <img src="{{ asset('images/trophy.png') }}" alt="Trophy" class="trophy">
                        <img src="{{ asset('images/gold-medal.png') }}" alt="Medal" class="medal">
                        <h1 class="title">Team Certificate</h1>
                        <p class="description">This is awarded to</p>
                        <h2 class="name">{{ $team->team_name}}</h2>
                        <p class="description">For being a <strong>certified Kenyan Team.</strong></p>
                        <div class="signature-area"></div>
                        <div class="logo-team">
                            <img src="{{ asset('storage/'.$team->team_logo) }}" alt="Sports Logo"style="width: 100%; height:auto;">
                        </div>
                    </div>
                </div>

              <div style="margin-top:30px; text-align:center;">
                <a href="{{ route('generate-team-cert',$team->id) }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download cert</a>
              </div>
          </div>

            @empty

            <p>No Certificates available</p>

            @endforelse
        </div>
    </article>
</section>

</x-filament::page>
