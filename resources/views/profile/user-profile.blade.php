<x-filament::page>
   <article>
 <div class="grid gap-10 grid-cols-1 md:grid-cols-2">
    <div class="border p-8 max-w-md">
        <h2 class="font-bold pb-8" style="margin-bottom: 20px">Personal information</h2>
        <div class="flex">
            <div>  <div
                class="text-size-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=FFFFFF&background=111827"
                     alt="profile_image" class="w-full shadow-soft-sm rounded-xl">
            </div></div>
            <div style="margin-left: 20px; justify-self:center;">
                <div class="pl-8"><h3 class="font-bold">Name {{ Auth::user()->name }}</h3></div>
                <div class="font-bold">Type of sport: Football</div>
            </div>
        </div>
    </div>
    <div class="border p-8 max-w-md">
        <h2 class="font-bold pb-8" style="margin-bottom: 20px">Contact information</h2>
        <div>

            <div>
                <div class="pl-8"><h3 class="font-bold">Email: {{ Auth::user()->email }}</h3></div>
                <div class="font-bold">Phone: 0703642687</div>
            </div>
        </div>
    </div>
 </div>
   </article>
</x-filament::page>