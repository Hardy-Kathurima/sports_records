<x-filament::page>
    <script src="https://cdn.tailwindcss.com"></script>
    <article class=" mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:py-24">
        <div class="grid grid-cols-1 md:grid-cols-3 mb-20">
            <div class="self-center">
                <img src="{{ asset('storage/'.$record->team_logo) }}" alt="">
            </div>
            <div class="text-white bg-black col-span-2 p-6 text-center">
                <h1 class="text-3xl font-bold">Team name: {{ $record->team_name }}</h1>
            </div>
        </div>

        <div>


            <div class="flex flex-col mb-8">
                <h2 class="font-bold text-2xl mb-6">Team Official</h2>
                <div class="mb-4">
                    <img  src="{{ asset('storage/'.$teamOfficial->profile_picture) }}" alt="" style="height: 200px; width:200;">
                </div>
                <div class="flex">
                  <div>
                    @forelse ($users as $user)
                    <h3 class="font-semibold text-xl">Name: {{ $teamOfficial1->name }}</h3>


                  </div>
                  <div class="self-center">

                    {{-- <a href="{{ \App\Filament\Resources\UserResource::getUrl('view',['record' => $user->id]) }}" class="underline text-indigo-500 px-8 py-2">View official</a> --}}
                  </div>
                  @empty
                  <h3 class="font-bold">User not available</h3>

                  @endforelse
                </div>

            </div>

            <div class="mb-8">
                <h2 class="font-bold text-2xl mb-8">Team Players</h2>
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="flex flex-col">
                        <div>
                            <img src="" alt="">
                        </div>
                        <div>
                            Player Name
                        </div>

                    </div>
                    <div>2</div>
                    <div>3</div>
                </div>

            </div>


            <div>
                <h2 class="font-bold text-2xl mb-8">Tournaments</h2>

            </div>


            <div>

            </div>





            <div>
                {{-- <a href={{ UserResource::getUrl(['record' => $user->id]) }} --}}
            </div>
        </div>

    </article>
</x-filament::page>