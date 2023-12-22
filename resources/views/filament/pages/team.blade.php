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
    <script src="https://cdn.tailwindcss.com"></script>
    <article class=" mx-auto max-w-screen-xl px-4 py-8 sm:px-6 ">
        <div class="grid grid-cols-1 md:grid-cols-3 mb-20 bg-white p-6">
            <div class="self-center">
                <img src="{{ asset('storage/'.$record->team_logo) }}" alt="" style="height: 100px;">
            </div>
            <div class="text-white bg-black col-span-2 p-6 text-center">
                <h1 class="text-3xl font-bold">Team name: {{ $record->team_name }}</h1>
            </div>
        </div>

     <div class="grid grid-cols-1 gap-8 md:grid-cols-2 py-10">
        <div class="self-center">
            <h3 class="text-xl font-bold">Main Team Official</h3>
            <div class="flex py-10 space-x-5">
                <div>
                    <img src="{{ asset('storage/'.$teamOfficial->profile_picture) }}" style="height:100px;" alt="">
                </div>
                <div class="flex flex-col self-center">
                    <div>
                        <p class="font-extralight">Name: {{ $teamOfficialDetails->name }}</p>
                        <p class="font-extralight">Email: {{ $teamOfficialDetails->email }}</p>
                        <p class="font-extralight">Type of Sport: {{ $teamOfficial->type_of_sport }}</p>
                    </div>

                </div>
            </div>
           </div>
           <div>

            <div class="certificate-container">
                <div class="inner-container" style="background-image:url(/images/cert-bg2.jpg); background-repeat:no-repeat; background-size:cover;">
                    <img src="{{ asset('images/trophy.png') }}" alt="Trophy" class="trophy">
                    <img src="{{ asset('images/gold-medal.png') }}" alt="Medal" class="medal">
                    <h1 class="title">Team Certificate</h1>
                    <p class="description">This is awarded to</p>
                    <h2 class="name">{{ $record->team_name}}</h2>
                    <p class="description">For being a <strong>certified Kenyan Team.</strong></p>
                    <div class="signature-area"></div>
                    <div class="logo-team">
                        <img src="{{ asset('storage/'.$record->team_logo) }}" alt="Sports Logo"style="width: 100%; height:auto;">
                    </div>
                </div>
            </div>

          <div style="margin-top:30px; text-align:center;">
            <a href="{{ route('generate-team-cert',$record->id) }}" target="_blank" class="underline px-8" style="padding:0.5rem 2rem; color:white; background:black; ">Download cert</a>
          </div>

           </div>

     </div>


       <div class="bg-white p-6">
        <h3 class="text-xl font-bold mb-6">Team Admins</h3>

        <div class="grid grid-cols-1 md:grid-cols-3">
          @forelse ($teamAdminsDetails as $adminDetail)
          <div class="flex justify-center py-10 space-x-5">
     @foreach ($teamAdmins as $teamAdmin)
     <div>
        <img src="{{ asset('storage/'.$adminDetail->profile_picture) }}" style="height:100px;" alt="">
    </div>
    <div class="flex flex-col self-center">
        <div>
            <p class="font-extralight">Name: {{ $teamAdmin->name }}</p>
            <p class="font-extralight">Email: {{ $teamAdmin->email }}</p>
            <p class="font-extralight">Type of Sport: {{ $adminDetail->type_of_sport }}</p>
            <p class="font-extralight">Team admin Membership: {{ $adminDetail->member }}</p>
        </div>

    </div>
</div>

     @endforeach

          @empty
          <p>No players Available</p>

          @endforelse




        </div>


       </div>










       <div class="bg-white p-6">
        <h3 class="text-xl font-bold mb-6">Team Players</h3>

        <div class="grid grid-cols-1 md:grid-cols-3">
          @forelse ($playerDetails as $playerDetail)
          <div class="flex justify-center py-10 space-x-5">
     @foreach ($players as $player)
     <div>
        <img src="{{ asset('storage/'.$playerDetail->profile_picture) }}" style="height:100px;" alt="">
    </div>
    <div class="flex flex-col self-center">
        <div>
            <p class="font-extralight">Name: {{ $player->name }}</p>
            <p class="font-extralight">Email: {{ $player->email }}</p>
            <p class="font-extralight">Type of Sport: {{ $playerDetail->type_of_sport }}</p>
            <p class="font-extralight">Player Position: {{ $playerDetail->player_position }}</p>
        </div>

    </div>
</div>

     @endforeach

          @empty
          <p>No players Available</p>

          @endforelse




        </div>


       </div>





       <div class="py-10">
        <h3 class="text-xl font-bold mb-6">Tournaments</h3>

        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tournament Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
           @forelse ($tournaments as $tournament)
           <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $tournament->tournament_name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $tournament->status }}</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $tournament->start_date }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $tournament->end_date }}</td>

            <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ App\Filament\Resources\TournamentResource::getUrl('view',$tournament->id) }}" class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">View Tournament</a>

            </td>
        </tr>

           @empty
           <p>No records found</p>

           @endforelse

            </tbody>
        </table>


       </div>


    </article>
</x-filament::page>