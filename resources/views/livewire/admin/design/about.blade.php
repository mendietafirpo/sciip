<div class="block h-screen bg-emerald-100 rounded-b-lg dark:text-white dark:bg-gray-900 items-center sm:mx-2 my-2">
    <div class="font-bolt text-2xl py-1 px-1">
        {{ $titl }}
    </div>
    <div x-data="{ dgn:false }" @click.away="dgn = false" class="font-thin text-md mt-2 py-1 px-1">
        {{ $descrip }}

            <!-- design-->
            @if (Auth::user())
                @if(Auth::user()->admin==1||Auth::user()->admin==2)
                <div>
                    <button @click="dgn=true" class="hover:bg-red-200 rondeud-md text-red-500 hover:text-blue-800" wire:click="edit()">{{ __('Design') }}</button>
                </div>
                <div class="block w-3/4 mt-4" x-show="dgn">
                    <div>
                        <form class="form-group" wire:submit.prevent="submit(1)" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="file" wire:model="image">
                            <span class="error">{{ $sendOk }}</span>
                            <button class="form-control w-auto pull-left rounded-md bg-black text-white rounded-sm px-1" type="submit">{{ __('Change')}}</button>
                        </form>
                        <form class="form-group" wire:submit.prevent="submit(2)" enctype="multipart/form-data">
                            <input class="form-control" type="text" wire:model="title">
                            @error('title') <span class="error">{{ $message }}</span> @enderror
                            <textarea class="form-control" cols="20" rows="10" wire:model="description"></textarea>
                            @error('description') <span class="error">{{ $message }}</span> @enderror
                            <button class="form-control w-auto pull-left rounded-md bg-black text-white rounded-sm px-1" type="submit">{{ __('Change')}}</button>
                        </form>
                    </div>
                </div>
                @endif
            @endif
    </div>
    <div>
        @if($img_1)
        <img src="{{ asset('/storage/designs/'.$img_1) }}" style="width: 300px; height: auto;"></img>
        @endif
    </div>
</div>
