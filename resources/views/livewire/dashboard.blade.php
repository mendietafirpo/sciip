<!--encabezado-->
<div x-data="{ open: false, itm1: false, itm2: false, itm3: false, itm4: false  }" class="flex mx-2 max-w-7xl">
    <!-- lateral de menu -->
    <div :class="{ 'hidden': open }" class="inline-block bg-violet-500 h-screen px-2 py-1 rounded-sm">
        <div class="inline-block w-32">
            <div class="px-2 font-thin text-gray-200">
                <!-- <?php echo config('app.name')." ";?> -->
                <p> {{ __("Admin's board") }}</p>
            </div>
            <div class="py-3"><hr class="bg-gray-200"></div>
            <!--menu administrator-->
            @if (Auth::user()->admin==1)
                <div class="py-1 ml-4">
                    <button @click="itm1 = true, itm2=false, itm3=false, itm4=false">
                        <div :class="{'font-bold':itm1, 'text-gray-800':itm1}" class="font-thin text-white">
                            {{ __('Designs')}}
                        </div>
                    </button>
                </div>
                <div class="py-1 ml-4">
                    <button @click="itm1 = false, itm2=true, itm3=false, itm4=false ">
                        <div :class="{'font-bold':itm2, 'text-gray-800':itm2}" class="font-thin text-white">
                            {{ __('Users')}}
                        </div>
                    </button>
                </div>
            <!--menu users-->
            @endif
            @if (Auth::user()->admin==1 || Auth::user()->admin==2)
                <div class="py-1 ml-4">
                    <button @click="itm1 = false, itm2=false, itm3=true, itm4=false">
                        <div :class="{'font-bold':itm3, 'text-gray-800':itm3}" class="font-thin text-white">
                            {{ __('Posts')}}
                        </div>
                    </button>
                </div>
                <div class="py-1 ml-4">
                    <button @click="itm1 = false, itm2=false, itm3=false, itm4=true">
                        <div :class="{'font-bold':itm4, 'text-gray-800':itm4}" class="font-thin text-white">
                            {{ __('Contacts')}}
                        </div>
                    </button>
                </div>
            <!--menu vistors-->
            @else

            @endif
        </div>
    </div>
    <!-- boton contraer -->
    <template x-if="open == false">
        <div title="contraer menú" class="inline-block pull-right bg-violet-600 rounded-r-lg py-22 w-auto" style="padding-top: 20%">
            <div class="inline-block pull-right">
                <button @click="open = true" class="bg-gray-600 rounded-l-3xl shadow-lg text-gray-300 font-bold hover:bg-black mx-1 p-1" wire:click="panel('off')">
                <p><</p>
                </button>
            </div>
        </div>
    </template>
    <!-- boton expandir -->
    <template x-if="open == true">
        <div title="desplegar menú" style="padding-top: 20%;" class="inline-block bg-gray-300 w-auto h-screen">
            <div class="inline-block pull-right">
                <button @click="open = false" class="bg-gray-600 rounded-r-3xl shadow-lg text-gray-300 font-bold hover:bg-black mx-1 p-1">
                    <p>></p>
                </button>
            </div>
        </div>
    </template>
    <!-- onoff del body -->
    <div class="inline-block col-span-10 bg-white w-screen h-screen">
            @if (Auth::user()->admin==1)
                <div x-show="itm1">
                    <livewire:admin.design.manager />
                </div>
                <div x-show="itm2">
                    <livewire:admin.users />
                </div>
            @endif
            @if(Auth::user()->admin==1 || Auth::user()->admin==2)
                <div x-show="itm3">
                    <livewire:post.post-list />
                </div>
                <div x-show="itm4">
                    <livewire:admin.contactme />
                </div>
            @endif
    </div>


</div>
