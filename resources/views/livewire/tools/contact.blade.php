<div>
    <div class="bg-yellow-300 rounded-md font-bold text-blue-800 text-2xl shadow-lg px-2 py-2">
        {{ __($titleForm) }}
    </div>

    <div>
        <form wire:submit.prevent="submit">
            <!-- nombre -->
            <div class="form-group flex mt-4">
                <label for="name" class="w-1/5 ml-4 control-label text-purple-700 font-bold align-top pt-2 w-32">{{ __('Name') }}:</label>
                <input type="text" name="name" class="form-control bg-white rounded-md h-10 w-full border-2 border-gray-400" autofocus wire:model="name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- apellido -->
            <div class="form-group flex">
                <label for="surname" class="w-1/5 ml-4 control-label text-purple-700 font-thin align-top pt-2 w-32">{{ __('Surname') }}:</label>
                <input type="text" name="surname" class="form-control bg-white rounded-md h-10 w-full border-2 border-gray-400" autofocus wire:model="surname">
                @error('surname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- email -->
            <div class="form-group flex">
                <label for="email" class="w-1/5 ml-4 control-label text-purple-700 font-bold align-top pt-2 w-32">{{ __('Email') }}:</label>
                <input type="text" name="email" class="form-control bg-white rounded-md h-10 w-full border-2 border-gray-400" autofocus wire:model="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- teléfono -->
            <div class="form-group flex">
                <label for="phone" class="w-1/5 ml-4 control-label text-purple-700 font-thin align-top pt-2 w-32">{{ __('Phone') }}:</label>
                <input type="text" name="phone" class="form-control bg-white rounded-md h-10 w-full border-2 border-gray-400" autofocus wire:model="phone">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- ciudad -->
            <div class="form-group flex">
                <label for="city" class="w-1/5 ml-4 control-label text-purple-700 font-thin align-top pt-2 w-32">{{ __('City') }}:</label>
                <input type="text" name="city" class="form-control bg-white rounded-md h-10 w-full border-2 border-gray-400" autofocus wire:model="city">
                @error('city') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- país -->
            <div class="form-group flex">
                <label for="country" class="w-1/5 ml-4 control-label text-purple-700 font-thin align-top pt-2 w-32">{{ __('Country') }}:</label>
                <input type="text" name="country" class="form-control bg-white rounded-md h-10 w-full border-2 border-gray-400" autofocus wire:model="country">
                @error('country') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- asunto -->
            <div class="form-group flex">
                <label for="subject" class="w-1/5 ml-4 control-label text-purple-700 font-thin align-top pt-2 w-32">{{ __('Subject') }}:</label>
                <input type="text" name="subject" class="form-control bg-white rounded-md h-10 w-full border-2 border-gray-400" autofocus wire:model="subject">
                @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- mensaje -->
            <div class="form-group flex">
                <label for="messege" class="w-1/5 ml-4 control-label text-purple-700 font-bold align-top pt-2">{{ __('Message') }}:</label>
                <textarea name="messege" autofocus class="form-control bg-white rounded-md h-28 w-full border-2 border-gray-400" wire:model="messege"></textarea>
                @error('messege') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            @if($name && $surname && $email && $messege)
                <div style="display:block;" class="pull-right py-2 px-2">
                    <button id="enviar" type="submit" class="btn btn-primary hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-md">{{ __('Send') }}</button>
                </div>
            @endif
        </form>
    </div>
    <script src="{{ asset('/js/welcome.js') }}"> </script>
</div>
