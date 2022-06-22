<div x-data="{ list: true, create:false }">
    <div class="flex flex-col" x-show="list">
        <div class="text-bold text-green-800 m-3"> {{ __($sendok)}}</div>
            <div class="py-2 align-middle inline-block min-w-full sm:px-2 lg:px-8">
                <div class="flex bg-white px-4 py-3 sm:px-2 bg-gray-200">
                    <input class="form-input rounded-md shadow-sm mt-1 block h-10 w-3/4"
                    wire:model="search"
                    type="text" placeholder="{{ __('Search') }}">
                    <div>
                        <select wire:model="perPage" name="perPage" id="perPage" class="outline-none text-gray-500 text-sm form-input rounded-md shadow-sm h-10 mt-1 ml-2 block">
                            <option value="5">5 {{ __('Per Page') }}</option>
                            <option value="10">10 {{ __('Per Page') }} </option>
                            <option value="15">15  {{ __('Per Page') }}</option>
                            <option value="20">20  {{ __('Per Page') }}</option>
                        </select>
                    </div>

                    @if ($search !=='')
                    <div>
                    <button wire:clicK="clear" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white my-1 ml-2 py-2 px-2 border border-blue-500 hover:border-transparent rounded">
                        X </button>
                    </div>
                    @endif
                </div>

            <table class="w-full divide-y divide-white">
                <tbody>
                    <thead>
                        <th scope="col" class="relative px-2 py-3">
                            Id {{ $idDgn }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Page')}}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Element')}}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Lang')}}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            Color bg
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            Color text 1
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            Color text 2
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            Text size 1
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            Text size 2
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            Class
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Title') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Description') }}
                        </th>

                    </thead>
                    @forelse ($designs as $design)
                    <tr>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $design->id }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $design->pageweb }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $design->element }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $design->lang }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $design->color_bg }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $design->color_tx_1 }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $design->color_tx_2 }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $design->text_sz_1 }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $design->text_sz_2 }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $design->class }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $design->status }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $design->redirect }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $design->title }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $design->description }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button @click="list=false, create=true" class="text-indigo-600 hover:text-indigo-900" wire:click="form(2,{{ $design->id }})">{{ __('Edit') }}</a>
                        </td>
                    @empty
                    @endforelse
                    </tr>
                </tbody>
            </table>
                @if ($designs->count())
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-2">
                    {!! $designs->links() !!}
                </div>
                @else
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t text-gray-500 border-gray-200 sm:px-2">
                    {{ __('There are no results for the search') }} {{ $search }}
                </div>
                @endif

            </div>
    </div>
    <div x-show="create" class="flex flex-col">
        <form wire:submit.prevent="submit" enctype="multipart/form-data">
            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="pageweb">{{ __('Page')}}</label>
                <div class="w-96">
                    <input name="pageweb" id="pageweb" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="pageweb">
                    @error('pageweb') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

            </div>
            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="element">{{ __('Element')}}</label>
                <div class="w-96">
                    <input name="element" id="element" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="element">
                    @error('element') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="lang">{{ __('Language')}}</label>
                <div class="w-96">
                    <select value="{{ session('lang')}}" name="lang" id="lang" class="form-multiselect bg-white w-full rounded-md h-11 border-blue-300 px-1" wire:model="lang">
                        <option selected value=''>{{ __('Select option')}}</option>
                        <option value="es">{{ __('Spanish')}}</option>
                        <option value="it">{{ __('Italian')}}</option>
                        <option value="en">{{ __('English')}}</option>
                    </select>
                        @error('lang') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="color_bg">{{ __('Color')}}_bg</label>
                <div class="w-96">
                    <input name="color_bg" id="color_bg" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="color_bg">
                    @error('color_bg') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="color_tx_1">{{ __('Color')}}_tx_1</label>
                <div class="w-96">
                    <input name="color_tx_1" id="color_tx_1" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="color_tx_1">
                    @error('color_tx_1') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="color_tx_2">{{ __('Color')}}_tx_2</label>
                <div class="w-96">
                    <input name="color_tx_2" id="color_tx_2" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="color_tx_2">
                    @error('color_tx_2') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="text_sz_1">{{ __('Text')}}_sz_1</label>
                <div class="w-96">
                    <input name="text_sz_1" id="text_sz_1" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="text_sz_1">
                    @error('text_sz_1') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="text_sz_1">{{ __('Text')}}_sz_2</label>
                <div class="w-96">
                    <input name="text_sz_2" id="text_sz_2" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="text_sz_2">
                    @error('text_sz_2') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="class">{{ __('Class')}}</label>
                <div class="w-96">
                    <input name="class" id="class" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="class">
                    @error('class') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="status">{{ __('Status')}}</label>
                <div class="w-96">
                    <input type="text" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" id="status" placeholder="hidden / visible" wire:model="status"/>
                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="redirect">{{ __('Redirect')}}</label>
                <div class="w-96">
                    <input type="text" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" id="redirect" placeholder="url" wire:model="redirect"/>
                    @error('redirect') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="title">{{ __('Title')}}</label>
                <div class="w-96">
                    <input name="title" id="title" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="title">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="description">{{ __('Description')}}</label>
                <div class="w-96">
                    <textarea type="text" class="form-control bg-white w-full rounded-md h-44 border-blue-300 px-1" id="description" placeholder="{{ __('Enter')}} {{ __('description')}}" wire:model="description"></textarea>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="float-right px-2 py-2">
                <button @click="list=true, create=false, edit=false" type="submit" class="bg-gray-900 hover:bg-purple-700 text-white font-bold py-2 px-2 bg-white rounded-md h-11 border-blue-300 px-1 content-center"> {{ __('Send')}}</button>
            </div>
        </form>
        <div>
            <button @click="list=true, create=false, edit=false" class="bg-transparent pull-right hover:bg-red-500 text-red-700 font-semibold hover:text-white my-1 ml-2 py-2 px-2 border border-blue-500 hover:border-transparent rounded">{{ __('Cancel') }}</button>
        </div>
    </div>
    <button x-show="list" @click="list=false, create=true, edit=false" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white my-2 ml-2 py-2 px-2 border border-blue-500 hover:border-transparent rounded" wire:click="form(1,'')">{{ __('New register') }}</button>
    <button x-show="list" class="bg-transparent hover:bg-green-500 text-blue-700 font-semibold hover:text-white my-2 ml-2 py-2 px-2 border border-blue-500 hover:border-transparent rounded" wire:click="form(3,'')">{{ __('Back') }}</button>
</div>
