<div>
    <section>
        <article class=" mx-auto max-w-screen-xl  px-4 py-16 sm:px-6 lg:py-16">

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 justify-items-center">
                <div class="self-center">
                   <div class="text-center mb-6">
                    <h2 class="font-bold text-2xl mb-3">Create your account</h2>
                    <p class="text-gray-600 text-sm">Let's get started with joining biggest growing sports platform</p>
                   </div>


                   <form wire:submit.prevent="submit" >
                    @csrf
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mb-6">
                        <div class="col-span-2 mb-2">
                            <label for="name" class="block text-sm  mb-2">Full name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" class="w-full" wire:model="name">
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-2">
                            <label for="email" class="block text-sm  mb-2">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" wire:model="email">
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-2">
                            <label for="phone" class="block text-sm  mb-2">Phone <span class="text-red-500">*</span></label>
                            <input type="text" name="phone" id="phone" wire:model="phone">
                            @error('phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-2 col-span-2">
                            <label for="registration_type" class="block text-sm  mb-2">Registration type <span class="text-red-500">*</span></label>
                            <select name="registration_type" id="registration_type" class="w-full" wire:model="registration_type">
                                <option value="">Select option</option>
                                <option value="Player">Player</option>
                                <option value="Team official">Team Official</option>
                                <option value="Referee">Referee</option>
                                <option value="Tournament official">Tournament Official</option>
                            </select>
                            @error('registration_type')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-2">
                            <label for="password" class="block text-sm  mb-2">Password <span class="text-red-500">*</span></label>
                            <input type="password" name="password" id="password" wire:model="password">
                            @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-2">
                            <label for="password_confirmation" class="block text-sm  mb-2">Confirm Password<span class="text-red-500">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" wire:model="password_confirmation">
                            @error('password_confirmation')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <button type="submit" class="bg-black text-white px-8 py-3 rounded-md w-full hover:bg-gray-600 mb-4">Submit</button>
                    <p>Already have an account? <a href="/admin" class="text-indigo-500">Sign in</a></p>
                   </form>


                </div>
                <div>
                    <img src="{{ asset('images/register-image.png') }}" class="h-fit" alt="">
                </div>
            </div>

        </article>
    </section>
</div>