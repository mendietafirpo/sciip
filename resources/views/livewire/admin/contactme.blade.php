<div x-data="{ list: true, create:false }">
    <div class="flex flex-col" x-show="list">
        <div class="text-bold text-violet-700 ml-6 my-3"> {{ __($sendok)}}</div>
            <div class="py-2 align-middle inline-block min-w-full sm:px-2 lg:px-8">
            <div class="shadow  border-b border-gray-200 sm:rounded-lg">
                <div class="flex bg-white px-4 py-3 sm:px-2">
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

            <table class="w-3/4 divide-y divide-gray-200">
                <tbody>
                    <thead>
                        <th scope="col" class="relative px-2 py-3">
                            Id
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Lang') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Name') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Surname') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Phone') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Email') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('City') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Country') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Subject') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Messege') }}
                        </th>

                    </thead>
                    @forelse ($contacts as $contact)
                    <tr>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->id }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->lang }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->name }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->surname }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->phone }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->email }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->city }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->country }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->subject }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $contact->messege }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button @click="list=false, create=true" class="text-indigo-600 hover:text-indigo-900" wire:click="form(2,{{ $contact->id }})">{{ __('Edit') }}</a>
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button onclick="confirm('¿Seguro que quieres eliminar?') || event.stopImmediatePropagation()" class="text-red-700 hover:text-red-800" wire:click="destroy({{ $contact->id }})">{{ __('Delete') }}</a>
                        </td>
                    @empty
                    @endforelse
                    </tr>
                </tbody>
            </table>
                <div class="bg-red-200">

                </div>
                @if ($contacts->count())
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-2">
                    {!! $contacts->links() !!}
                </div>
                @else
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t text-gray-500 border-gray-200 sm:px-2">
                    {{ __('There are no results for the search') }} {{ $search }}
                </div>
                @endif

            </div>
            </div>
    </div>
</div>
