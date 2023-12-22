<x-filament::page>
    {{-- <script src="https://cdn.tailwindcss.com" defer></script> --}}

    <article class=" mx-auto max-w-screen-xl px-4 py-8 sm:px-6 ">

 <div class="flex justify-center bg-white p-8 flex-wrap space-x-8 md:flex-nowrap mb-20" style="margin-bottom: 30px">
  <div class="self-center">
    <img src="{{ asset('images/League.jpeg') }}" style="height: 100px;" alt="">
  </div>
  <div style="padding-left: 20px;">
    <p><span class="font-bold">Tournament name</span>: {{ $record->tournament_name }}</p>
    <p><span class="font-bold">Tournament start application date</span>: {{ $record->start_application_date}}</p>
    <p><span class="font-bold">Tournament  application deadline date</span>: {{ $record->application_deadline_date}}</p>
    <p><span class="font-bold">Tournament  start date</span>: {{ $record->start_date}}</p>
    <p><span class="font-bold">Tournament  end date</span>: {{ $record->end_date}}</p>
    <p><span class="font-bold">Tournament  status</span>: {{ $record->status}}</p>

  </div>
 </div>
 <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
  <div class="flex flex-col bg-white items-center py-10 px-6" style="padding: 15px;">
    <div>
      <h3 class="text-2xl">Total teams invited</h3>
    </div>
    <div class="text-center">
      <p class="text-4xl font-extrabold" style="font-size:2em;">{{ $totalTeams }}</p>
    </div>
  </div>
  <div class="flex flex-col bg-white items-center py-10 px-6" style="padding: 15px;">
    <div>
      <h3 class="text-2xl">Total teams accepted</h3>
    </div>
    <div class="text-center">
      <p class="text-4xl font-extrabold" style="font-size: 2em;">{{ $acceptedTeams }}</p>
    </div>
  </div>
 </div>


    </article>

</x-filament::page>
