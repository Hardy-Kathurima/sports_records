<x-filament::page>
    {{-- <script src="https://cdn.tailwindcss.com" defer></script> --}}
   <section>
    <article class=" mx-auto max-w-screen-xl px-4 py-8 sm:px-6 ">
        @foreach ($record->groups()->with('team')->select('group_name')->distinct()->get() as $group)
            <div class="border border-2" style="margin-bottom: 10px">
                <h1>{{ $group->group_name }}</h1>
                <p>{{ \App\Models\Group::where('group_name', $group->group_name)->with('team')->get()->pluck('team.team_name')->implode(', ') }}</p>
            </div>
        @endforeach
    </article>
   </section>
</x-filament::page>
