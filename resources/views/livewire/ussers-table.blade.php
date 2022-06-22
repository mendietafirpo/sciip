<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <div class="flex bg-white px-4 py-3 sm:px-6">
            <input class="form-input rounded-md shadow-sm mt-1 block w-3/4"
            wire:model="search"
            type="text" placeholder="{{ __('Search') }}">
            <div>
                <select wire:model="perPage" name="perPage" id="perPage" class="outline-none text-gray-500 text-sm form-input rounded-md shadow-sm mt-1 ml-2 block">
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
                <th scope="col" class="relative px-6 py-3">
                    Id
                </th>

                <th scope="col" class="relative px-6 py-3">
                    {{ __('Name')}}
                </th>

                <th scope="col" class="relative px-6 py-3">
                    {{ __('Email')}}
                </th>

                <th scope="col" class="relative px-6 py-3">
                    {{ __('Team')}}
                </th>
                <th scope="col" class="relative px-6 py-3">
                    {{ __('Role')}}
                </th>
            </thead>
            @foreach ($users as $user)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $user->id }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $user->name }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $user->email }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $user->allTeams()->pluck('name')->join(', ') }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    {{ $user->teams()->pluck('role')->join('') }}
                </span>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="#" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
        <div class="bg-red-200">

        </div>
        @if ($users->count())
        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            {{ $users->links() }}
        </div>
        @else
        <div class="bg-white px-4 py-3 flex items-center justify-between border-t text-gray-500 border-gray-200 sm:px-6">
            {{ __('There are no results for the search') }} {{ $search }}"
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
