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
                            {{ __('Name') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Email') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Rol') }} {{ __('admin') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Team') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Rol') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            google_id
                         </th>

                        <th scope="col" class="relative px-2 py-3">
                            facebook_id
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            github_id
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Date create') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Date update') }}
                        </th>
                    </thead>
                    @forelse ($users as $user)
                    <tr>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->id }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->name }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->email }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->admin}}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->allTeams()->pluck('name')->join(', ') }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->teams()->pluck('role')->join('') }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->google_id }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->facebook_id }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $user->created_at }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $user->updated_at }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button @click="list=false, create=true" class="text-indigo-600 hover:text-indigo-900" wire:click="form(2,{{ $user->id }})">{{ __('Edit') }}</a>
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button onclick="confirm('¿Seguro que quieres eliminar?') || event.stopImmediatePropagation()" class="text-red-700 hover:text-red-800" wire:click="destroy({{ $user->id }})">{{ __('Delete') }}</a>
                        </td>
                    @empty
                    @endforelse
                    </tr>
                </tbody>
            </table>
                <div class="bg-red-200">

                </div>
                @if ($users->count())
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-2">
                    {!! $users->links() !!}
                </div>
                @else
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t text-gray-500 border-gray-200 sm:px-2">
                    {{ __('There are no results for the search') }} {{ $search }}
                </div>
                @endif

            </div>
            </div>
    </div>
    <div x-show="create" class="flex flex-col">
        <form wire:submit.prevent="submit" enctype="multipart/form-data">
            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="name">{{ __('Name')}}</label>
                <div class="w-96">
                    <input name="name" id="name" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

            </div>
            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="email">{{ __('Email')}}</label>
                <div class="w-96">
                    <input name="email" id="email" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="admin">{{ __('Rol')}} admin</label>
                <div class="w-96">
                    <select name="admin" id="admin" class="form-multiselect bg-white w-full rounded-md h-11 border-blue-300 px-1" wire:model="admin">
                        <option value="1">{{ __('Admin')}}</option>
                        <option value="2">{{ __('User')}}</option>
                        <option value="3">{{ __('Visitor')}}</option>
                    </select>
                        @error('admin') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="google_id">{{ __('Google')}}</label>
                <div class="w-96">
                    <input name="google_id" id="google_id" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="google_id">
                    @error('google_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="facebook_id">{{ __('Facebook')}}</label>
                <div class="w-96">
                    <input name="facebook_id" id="facebook_id" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="facebook_id">
                    @error('facebook_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="profile_photo_path">{{ __('Profile photo')}}</label>
                <div class="w-96">
                    <input name="profile_photo_path" id="profile_photo_path" autocomplete="usename" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="profile_photo_path">
                    @error('profile_photo_path') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="password">{{ __('Password')}}</label>
                <div class="w-96">
                    <input name="password" type="password" id="password" autocomplete="current-password" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
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

