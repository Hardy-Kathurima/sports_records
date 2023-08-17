@extends('layouts.app')

@section('content')

<section class="bg-[#37003c]">
    <article class="mx-auto max-w-screen-xl  px-4 py-16 sm:px-4 lg:py-10">
        <div class="grid gap-4 grid-cols-1 md:grid-cols-4 ">
            <div class="border bg-white border-cyan-400 rounded-t-sm ">
                <div class="flex   bg-gradient-to-r from-[#30baff] to-[#30baff] justify-center  mb-2">
                    <div class="self-start">
                        <img src="{{ asset('images/football.png') }}" class="scale-50" alt="">
                    </div>
                    <div class="self-center font-extrabold text-xl text-white/90">
                        <h5>Match Week 1</h5>
                    </div>
                </div>
                <h5 class="text-sm text-center py-4">All times shown are your local time</h5>
                <div class="flex flex-col">
                <div class="mb-2 hover:bg-cyan-400 hover:text-white">
                    <div>
                        <h5 class="text-center font-thin">Friday 11 August </h5>
                    </div>
                    <div>
                        <div class="flex justify-center py-3 border-b-2">
                            <div class="country mr-1 font-bold">Gorm</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="time mx-2">10:00</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="country ml-1 font-bold">Tusker</div>
                         <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                              </svg>

                         </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 hover:bg-cyan-400 hover:text-white">
                    <div>
                        <h5 class="text-center font-thin">Saturday 12 August </h5>
                    </div>
                    <div>
                        <div class="flex justify-center py-3 border-b-2">
                            <div class="country mr-1 font-bold">Polic</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="time mx-2">16:00</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="country ml-1 font-bold">Nzoia</div>
                         <div >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                              </svg>

                         </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 hover:bg-cyan-400 hover:text-white">
                    <div>
                        <h5 class="text-center font-thin">Sunday 13 August </h5>
                    </div>
                    <div>
                        <div class="flex justify-center py-3 border-b-2">
                            <div class="country mr-1 font-bold">KCB</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="time mx-2">19:00</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="country ml-1 font-bold">Band</div>
                         <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                              </svg>

                         </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 hover:bg-cyan-400 hover:text-white">
                    <div>
                        <h5 class="text-center font-thin">Monday 14 August </h5>
                    </div>
                    <div>
                        <div class="flex justify-center py-3 border-b-2">
                            <div class="country mr-1 font-bold">Ulinzi</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="time mx-2">22:00</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="country ml-1 font-bold">Sofa</div>
                         <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                              </svg>

                         </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 hover:bg-cyan-400 hover:text-white">
                    <div>
                        <h5 class="text-center font-thin">Tuesday 15 August </h5>
                    </div>
                    <div>
                        <div class="flex justify-center py-3 border-b-2">
                            <div class="country mr-1 font-bold">Posta</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="time mx-2">22:00</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="country ml-1 font-bold">Bidc</div>
                         <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                              </svg>

                         </div>
                        </div>
                    </div>
                </div>
                <div class="hover:bg-cyan-400 hover:text-white">
                    <div>
                        <h5 class="text-center font-thin">Wednesday 16 August </h5>
                    </div>
                    <div>
                        <div class="flex justify-center py-3 border-b-2">
                            <div class="country mr-1 font-bold">Talanta</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="time mx-2">22:00</div>
                            <img src="{{ asset('images/football2.png') }}" alt="">
                            <div class="country ml-1 font-bold">City</div>
                         <div >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                              </svg>

                         </div>
                        </div>
                    </div>
                </div>


                </div>
            </div>
            <div class="col-span-2 flex flex-col mt-6 ">
                <div class="flex flex-col">
                    <img src="{{ asset('images/gormahia.webp') }}"  class=" rounded-t-md " alt="">
                    <div class="text-white font-extrabold text-3xl mt-4 mb-6 underline">KPL giants Gor Mahia back in training for 2020/21 campaign.</div>
                    <p class="text-white/90">Kenyan Premier League (KPL) giants Gor Mahia have started training in preparations for the new campaign.</p>
                </div>

            </div>
            <div class="flex flex-col">
                <div class="flex flex-col mt-6 ">
                    <div class="flex flex-col">
                        <img src="{{ asset('images/sofapaka.png') }}"  class=" rounded-t-md " alt="">
                        <div class="font-bold text-sm text-white mt-2 mb-1">NEWS</div>
                        <div class="text-white font-extrabold text-lg mb-1 underline">Sofapaka gaffer Ouma pledges a top-five finish.</div>
                        <p class="text-white/90">Ouma said their hard-fought 2-1 ...</p>
                    </div>

                </div>
                <div class="flex flex-col mt-6 ">
                    <div class="flex flex-col">
                        <img src="{{ asset('images/League.jpeg') }}"  class=" rounded-t-md " alt="">
                        <div class="font-bold text-sm text-white mt-2 mb-1">STATS</div>
                        <div class="text-white font-extrabold text-lg mb-1 underline">FKF Premier League
                        </div>
                        <p class="text-white/90">Kenya premier legue stats.</p>
                    </div>

                </div>
            </div>
        </div>
       </article>
   </section>



@endsection
