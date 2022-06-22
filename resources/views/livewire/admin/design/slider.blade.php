<div x-data="{ dgn:false}">
    <div class="grid grid-cols-2 gap-2 md:grid-cols-5 max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div id="elem1" style="opacity:''" class="inline-block h-22 ml-4 my-6 px-2 py-2 {{ $sl_class_1 }} {{ $sl_tx_s_1 }} { $sl_tx_c_1 }} hover:bg-sky-500 hover:text-white border-1 border-sky-300 shadow-2xl rounded-lg {{ $sl_bg_2 }}">
            <button wire:click="toredirect(1)" class="text-center align-middle">{{ $sl_desc_1 }}</button>
        </div>
        <div id="elem2" style="opacity:0.2" class="inline-block h-22 ml-4 my-6 px-2 py-2 {{ $sl_class_2 }} {{ $sl_tx_s_2 }} { $sl_tx_c_2 }} hover:bg-pink-500 hover:text-white border-1 border-pink-300 shadow-2xl rounded-lg {{ $sl_bg_2 }}">
            <button wire:click="toredirect(2)" class="text-center align-middle">{{ $sl_desc_2 }}</button>
        </div>
        <div id="elem3" style="opacity:0.2" class="inline-block h-22 ml-4 my-6 px-2 py-2 {{ $sl_class_3 }} {{ $sl_tx_s_3 }} { $sl_tx_c_3 }} hover:bg-amber-500 hover:text-white border-1 border-amber-300 shadow-2xl rounded-lg {{ $sl_bg_3 }}">
            <button wire:click="toredirect(3)" class="text-center align-middle">{{ $sl_desc_3 }}</button>
        </div>
        <div id="elem4" style="opacity:0.2" class="inline-block h-22 ml-4 my-6 px-2 py-2 {{ $sl_class_4 }} {{ $sl_tx_s_4 }} { $sl_tx_c_4 }} hover:bg-violet-500 hover:text-white border-1 border-violet-300 shadow-2xl rounded-lg {{ $sl_bg_4 }}">
            <button wire:click="toredirect(4)" class="text-center align-middle">{{ $sl_desc_4 }}</button>
        </div>
        <div id="elem5" style="opacity:0.2" class="inline-block h-22 ml-4 my-6 px-2 py-2 {{ $sl_class_5 }} {{ $sl_tx_s_5 }} { $sl_tx_c_5 }} hover:bg-emerald-500 hover:text-white border-1 border-emerald-300 shadow-2xl rounded-lg {{ $sl_bg_5 }}">
            <button wire:click="toredirect(5)" class="text-center align-middle">{{ $sl_desc_5 }}</button>
        </div>
    </div>
    <!-- Form modal updated configuration -->
    @if(Auth::user())
        @if(Auth::user()->admin==1)
        <div class="flex ml-4">
            <button wire:click="formUpdate({{ $sl_item}})" @click="dgn=true" class="inline bg-red-200 text-red-800 hover:bg-red-500 hover:text-white rounded-md h-10 p-1">{{ __('Change')}} slider</button>
            <div x-show="dgn" class="w-2/3 p-5 lg:px-24 absolute rounded-b-lg top-0 bg-violet-200">
                <div :class="{ 'hidden': !dgn }" class="hidden">
                    <livewire:admin.design.design-update />
                <button @click="dgn=false" class="bg-pink-300 shodow-lg px-1 rounded-md text-blue-800 hover:bg-black hover:text-white mt-2 pull-right"> {{ __('Close')}} </button>
                </div>
            </div>
            <select wire:model="sl_item"class="inline w-20 ml-2 h-10 px-2 border-blue-800 rounded-md form-input text-blue-800">
                <option value="1">item 1</option>
                <option value="2">item 2</option>
                <option value="3">item 3</option>
                <option value="4">item 4</option>
                <option value="5">item 5</option>
            </select>
        </div>
        @endif
    @endif
</div>
