
<div x-data="{ readmore:false, readmore2:false, readmore3:false, dgn:false }" @click.away="readmore=false, readmore2=false, readmore3=false, dgn=false">

    <div class="max-w-screen-xl mx-auto px-4 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        <!-- Grid column 1 -->
        <div class="flex flex-col flex-1 px-10 py-12 bg-violet-300 hover:bg-violet-800 hover:text-gray-500 rounded-lg shadow-lg">
            <h2 class="text-gray-900 text-2xl font-bold leading-snug">
                {{ $title_1 }}
            </h2>
            <div class="flex-1" @click.away="readmore=false">
                <img src="{{ asset('/storage/designs/'.$img_1) }}" style="width:200px; height:auto;border-radius:5%"></img>
                <p class="mt-2 text-lg">
                    {{ Str::limit($descrip_1, 100, $end='...')}} <button @click="readmore=true" class="text-blue-400 font-thin">{{ __('Read more') }}</button>
                </p>
                <div x-show="readmore">
                    <div class="flex-1 rounded-md shadow-lg bg-violet-200 mx-4 my-4 p-2 w-full text-justify">{{ $descrip_1 }}</div>
                </div>
            </div>
            <div>
            <!-- design-->
            @if (Auth::user())
                @if(Auth::user()->admin==1||Auth::user()->admin==2)
                <div class="mt-2">
                    <form wire:submit.prevent="submit(1,1)" enctype="multipart/form-data">
                    <label class="btn bg-red-200 hover:bg-red-500 hover:text-white text-red-800 rounded-lg h-8 p-1" for="image">{{__('Change') }} {{ __('image')}}</label>
                        <input name="image" id="image" style="visibility:hidden;" type="file" wire:model="image">
                        @if($image)
                        <button class="bg-black text-white rounded-sm p-1" type="submit">{{ __('Change')}}</button>
                        @endif
                    </form>
                </div>
                <button wire:click="formUpdate(1)" @click="dgn=true" class="bg-red-200 text-red-800 hover:bg-red-500 hover:text-white rounded-md h-8 p-1">{{ __('Change')}} {{ __('text')}}</button>
                @endif
            @endif
            </div>
        </div>
        <!-- Grid column 2 -->
        <div class="flex flex-col flex-1 px-10 py-12 bg-emerald-300 hover:bg-emerald-800 hover:text-gray-500 rounded-lg shadow-lg">
            <h2 class="text-gray-900 text-2xl font-bold leading-snug">
                {{ $title_2 }}
            </h2>
            <div class="flex-1" @click.away="readmore2=false">
                <img src="{{ asset('/storage/designs/'.$img_2) }}" style="width:200px; height:auto; border-radius:5%"></img>
                <p class="mt-2 text-lg">
                    {{ Str::limit($descrip_2, 100, $end='...')}} <button @click="readmore2=true" class="text-blue-400 font-thin">{{ __('Read more') }}</button>
                </p>
                <div x-show="readmore2">
                    <div class="flex-1 rounded-md shadow-lg bg-emerald-200 mx-4 my-4 p-2 w-full text-justify">{{ $descrip_2 }}</div>
                </div>
            </div>
            <div @click.away="dgn2 = false">
            <!-- design-->
            @if (Auth::user())
                @if(Auth::user()->admin==1||Auth::user()->admin==2)
                <div class="mt-2">
                    <form wire:submit.prevent="submit(2,1)" enctype="multipart/form-data">
                    <label class="btn bg-red-200 hover:bg-red-500 hover:text-white text-red-800 rounded-lg h-8 p-1" for="image">{{__('Change') }} {{ __('image')}}</label>
                        <input name="image" id="image" style="visibility:hidden;" type="file" wire:model="image">
                        @if($image)
                        <button class="bg-black text-white rounded-sm p-1" type="submit">{{ __('Change')}}</button>
                        @endif
                    </form>
                </div>
                <button wire:click="formUpdate(2)" @click="dgn=true" class="bg-red-200 text-red-800 hover:bg-red-500 hover:text-white rounded-md h-8 p-1">{{ __('Change')}} {{ __('text')}}</button>
                @endif
            @endif
            </div>
        </div>
        <!-- Grid column 3 -->
        <div class="flex flex-col flex-1 px-10 py-12 bg-sky-300 hover:bg-sky-800 hover:text-gray-500 rounded-lg shadow-lg">
            <h2 class="text-gray-900 text-2xl font-bold leading-snug">
                {{ $title_3 }}
            </h2>
            <div class="flex-1" @click.away="readmore3=false">
                <img src="{{ asset('/storage/designs/'.$img_3) }}" style="width:300px; height:auto; border-radius:5%"></img>
                <p class="mt-2 text-lg">
                    {{ Str::limit($descrip_3, 100, $end='...')}} <button @click="readmore3=true" class="text-blue-400 font-thin">{{ __('Read more') }}</button>
                </p>
                <div x-show="readmore3">
                    <div class="flex-1 rounded-md shadow-lg bg-sky-200 mx-4 my-4 p-2 w-full text-justify">{{ $descrip_3 }}</div>
                </div>
            </div>
            <div>
            <!-- design-->
            @if (Auth::user())
                @if(Auth::user()->admin==1||Auth::user()->admin==2)
                <div class="mt-2">
                    <form wire:submit.prevent="submit(3,1)" enctype="multipart/form-data">
                    <label class="btn bg-red-200 hover:bg-red-500 hover:text-white text-red-800 rounded-lg h-8 p-1" for="image">{{__('Change') }} {{ __('image')}}</label>
                        <input name="image" id="image" style="visibility:hidden;" type="file" wire:model="image">
                        @if($image)
                        <button class="bg-black text-white rounded-sm p-1" type="submit">{{ __('Change')}}</button>
                        @endif
                    </form>
                </div>
                <button wire:click="formUpdate(3)" @click="dgn=true" class="bg-red-200 text-red-800 hover:bg-red-500 hover:text-white rounded-md h-8 p-1">{{ __('Change')}} {{ __('text')}}</button>
                @endif
            @endif
            </div>
        </div>
    </div>
    <!-- Form modal updated configuration -->
    @if(Auth::user())
        @if(Auth::user()->admin==1||Auth::user()->admin==2)
        <div x-show="dgn" class="w-2/3 p-5 lg:px-24 rounded-b-lg top-0 bg-violet-200">
            <div :class="{ 'hidden': !dgn }" class="hidden">
                <livewire:admin.design.design-update />
            <button @click="dgn=false" class="bg-pink-300 shodow-lg px-1 rounded-md text-blue-800 hover:bg-black hover:text-white mt-2 pull-right"> {{ __('Close')}} </button>
            </div>
        </div>
        @endif
    @endif
</div>
