<div>
    <section>
        <article class="mx-auto max-w-screen-xl  px-4 py-16 sm:px-6 lg:py-16">

            <div class="bg-gray-100 min-h-screen flex justify-center items-center">
                <div class="bg-white p-8 rounded-lg shadow-md w-96">
                    <h1 class="text-2xl font-bold mb-4">Register</h1>

                    <form wire:submit.prevent="submit" class="grid grid-cols-2 gap-4">
                        <div class="col-span-2 mb-4">
                            <input type="text" wire:model="name" placeholder="Name" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500 @error('name') border-red-500 @enderror">
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <input type="email" wire:model="email" placeholder="Email" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror">
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <input type="tel" wire:model="phone" placeholder="Phone" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500 @error('phone') border-red-500 @enderror">
                            @error('phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4 col-span-2">
                            <select wire:model="registration_type" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                                <option value="individual">Individual</option>
                                <option value="business">Business</option>
                            </select>
                        </div>

                        <div class="col-span-2 mb-4">
                            <input type="password" wire:model="password" placeholder="Password" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror">
                            @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-2 mb-4">
                            <input type="password" wire:model="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500 @error('password_confirmation') border-red-500 @enderror">
                            @error('password_confirmation')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>



                        <button type="submit" class="col-span-2 bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Register</button>
                    </form>
                </div>
            </div>


        </article>
    </section>
</div>






