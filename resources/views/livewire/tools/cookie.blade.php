<div class="w-screen h-auto bg-gray-100 flex items-center justify-center ml-2 px-5 py-5 relative" x-data="{showCookieBanner:true}">
        <section class="w-full p-5 lg:px-24 absolute top-0 bg-gray-600" x-show="showCookieBanner">
                <div class="md:flex items-center -mx-3">
                    <div class="md:flex-1 px-3 mb-5 md:mb-0">
                        <p class="text-center md:text-left text-white text-xs leading-tight md:pr-12">{{__( $cookDesc )}}</p>
                    </div>
                    <div class="px-3 text-center">
                        <button id="btn" class="py-2 px-8 bg-gray-800 hover:bg-gray-900 text-white rounded font-bold text-sm shadow-xl mr-3" @click.prevent="document.getElementById('cookiesModal').showModal()">{{__('Cookie settings')}}</button>
                        <button id="btn" class="py-2 px-8 bg-green-400 hover:bg-green-500 text-white rounded font-bold text-sm shadow-xl" @click.prevent="showCookieBanner=!showCookieBanner" wire:click="ofCook">{{__('Accept cookies')}}</button>
                    </div>
                </div>
            <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            </div>
        </section>
        <dialog wire:ignore id="cookiesModal" class="h-auto w-11/12 md:w-1/2 bg-white overflow-hidden rounded-md p-0">
            <form wire:submit="cookieConfig">
                <div class="flex flex-col w-full h-auto">
                    <div class="flex w-full h-auto items-center px-5 py-3">
                        <div class="w-10/12 h-auto text-lg font-bold">
                            {{ __('Cookie settings')}}
                        </div>
                        <div class="flex w-2/12 h-auto justify-end">
                            <button @click.prevent="document.getElementById('cookiesModal').close();" class="cursor-pointer focus:outline-none text-gray-400 hover:text-gray-800">
                            <svg class="text-red-500 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex w-full items-center bg-gray-100 border-b border-gray-200 px-5 py-3 text-sm">
                        <div class="flex-1 @if($onoff_1==1) font-bold @endif">
                            <p>{{ __( $setItem_1 )}}</p>
                        </div>
                        <div class="w-10 text-right">
                            <input wire:model="onoff_1" type="checkbox" class="rounded-lg">
                        </div>
                    </div>
                    <div class="flex w-full items-center bg-gray-100 border-b border-gray-200 px-5 py-3 text-sm">
                        <div class="flex-1 @if($onoff_2==1) font-bold @endif">
                            <p>{{ __($setItem_2)}}</p>
                        </div>
                        <div class="w-10 text-right">
                            <input wire:model="onoff_2" checkerd type="checkbox" class="rounded-lg">
                        </div>
                    </div>
                    <div class="flex w-full items-center bg-gray-100 border-b border-gray-200 px-5 py-3 text-sm">
                        <div class="flex-1 @if($onoff_3==1) font-bold @endif">
                            <p>{{ __($setItem_3)}}</p>
                        </div>
                        <div class="w-10 text-right">
                            <input wire:model="onoff_3" disabled type="checkbox" class="rounded-lg">
                        </div>
                    </div>
                    <div class="flex w-full items-center bg-gray-100 border-b border-gray-200 px-5 py-3 text-sm">
                        <div class="flex-1 @if($onoff_4==1) font-bold @endif">
                            <p>{{ __($setItem_4)}}</p>
                        </div>
                        <div class="w-10 text-right">
                            <input wire:model="onoff_4" disabled type="checkbox" class="rounded-lg">
                        </div>
                    </div>
                    <div class="flex-inline">
                        <div class="inline px-5 py-3 pull-right">
                            <button type="submit" @click.prevent="document.getElementById('cookiesModal').close();" class="py-2 px-8 bg-gray-800 hover:bg-gray-900 text-white rounded font-bold text-sm shadow-xl">{{ __('Save settings')}}</button>
                        </div>
                        <div class="inline px-5 py-3 pull-left">
                            <button @click.prevent="document.getElementById('cookiesModal').close(); document.getElementById('cookiesPolicy').showModal();"  class="py-2 px-8 bg-blue-800 hover:bg-gray-900 text-white rounded font-bold text-sm shadow-xl">{{ __('Policy')}}</button>
                        </div>
                    </div>
                </div>
            </form>
        </dialog>
        <dialog wire:ignore id="cookiesPolicy" class="h-auto w-11/12 md:w-1/2 bg-white overflow-hidden rounded-md p-2">

            <livewire:tools.policy-web />

            <div class="flex w-2/12 h-auto justify-end">
                <button @click.prevent="document.getElementById('cookiesPolicy').close();" class="cursor-pointer focus:outline-none text-gray-400 hover:text-gray-800">
                    <svg class="text-red-500 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </dialog>
</div>
