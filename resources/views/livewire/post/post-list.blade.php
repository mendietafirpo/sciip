<div x-data="{ list: true, create:false, category:false }">
    <div class="flex flex-col" x-show="list">
        <div class="text-bold text-violet-700 ml-6 my-3"> {{ __($sendok)}}</div>
            <div class="py-2 align-middle inline-block min-w-full sm:px-2 lg:px-8">
            <div class="shadow  border-b border-gray-200 sm:rounded-lg">
                <div class="flex bg-white px-4 py-3 sm:px-2">
                    <input class="form-input rounded-md shadow-sm mt-1 block h-10 w-1/2"
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
                    <div>
                        <select id="category" wire:model="category" name="category" class="outline-none text-gray-500 text-sm form-input rounded-md shadow-sm h-10 mt-1 ml-2 block">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" >{{ __($category->name) }}</option>
                            @endforeach
                                <option selected value="0">{{ __('Select option')}}</option>
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
                            {{ __('Status') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Title') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Body') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Category_id') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('User_id') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Date create') }}
                        </th>

                        <th scope="col" class="relative px-2 py-3">
                            {{ __('Date update') }}
                        </th>
                    </thead>
                    @forelse ($posts as $post)
                    <tr>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $post->id }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $post->lang }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $post->status }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $post->title }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $post->body }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $post->category_id }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $post->user_id }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $post->created_at }}
                        </td>

                        <td class="px-2 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $post->updated_at }}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button @click="list=false, create=true" class="text-indigo-600 hover:text-indigo-900" wire:click="form(2,{{ $post->id }})">{{ __('Edit') }}</a>
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button onclick="confirm('¿Seguro que quieres eliminar?') || event.stopImmediatePropagation()" class="text-red-700 hover:text-red-800" wire:click="destroy({{ $post->id }})">{{ __('Delete') }}</a>
                        </td>

                    @empty
                    @endforelse
                    </tr>
                </tbody>
            </table>
                <div class="bg-red-200">

                </div>
                @if ($posts->count())
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-2">
                    {!! $posts->links() !!}
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
                <label class="w-28 control-label align-top mx-2 pt-2" for="category_id">{{ __('Category')}}</label>
                <div class="w-96">
                    <select wire:model="category_id" name="category_id" class="outline-none text-sm form-input border-gray-300 rounded-md h-10 block">
                            <option value="0">{{ __('Select option')}}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" >{{ __($category->name) }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="lang">{{ __('Lang')}}</label>
                <div class="w-96">
                    <select name="lang" id="lang" class="form-multiselect bg-white w-full rounded-md h-11 border-blue-300 px-1" wire:model="lang">
                        <option value="es">{{ __('Spanish')}}</option>
                        <option value="it">{{ __('Italian')}}</option>
                        <option value="en">{{ __('English')}}</option>
                    </select>
                        @error('lang') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="status">{{ __('Status')}}</label>
                <div class="w-96">
                    <select wire:model="status" name="status" class="outline-none text-sm form-input border-gray-300 rounded-md h-10 block">
                            <option value="1">{{ __('Published')}}</option>
                            <option value="2">{{ __('Draft')}}</option>
                            <option value="3">{{ __('Archived')}}</option>
                    </select>
                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
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
                <label class="w-28 control-label align-top mx-2 pt-2" for="body">{{ __('Body')}}</label>
                <div class="w-96">
                <textarea type="text" class="form-control bg-white w-full rounded-md h-44 border-blue-300 px-1" id="body" placeholder="{{ __('Enter')}} {{ __('body')}}" wire:model="body"></textarea>
                    @error('body') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group pt-2 flex">
                <label class="w-28 control-label align-top mx-2 pt-2" for="password">{{ __('User_id')}}</label>
                <div class="w-96">
                    <input name="user_id" type="password" id="user_id" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="user_id">
                    @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="float-right px-2 py-2">
                <button @click="list=true, create=false, edit=false" type="submit" class="bg-gray-900 hover:bg-purple-700 text-white font-bold py-2 px-2 bg-white rounded-md h-11 border-blue-300 px-1 content-center"> {{ __('Send')}}</button>
            </div>
        </form>
        <div>
            <button @click="list=true, create=false, edit=false, category=false" class="bg-transparent pull-right hover:bg-red-500 text-red-700 font-semibold hover:text-white my-1 ml-2 py-2 px-2 border border-blue-500 hover:border-transparent rounded">{{ __('Cancel') }}</button>
        </div>
    </div>
    <div x-show="category" class="flex flex-col ml-2">
        <form wire:submit.prevent="sendCategory()" enctype="multipart/form-data">
            <div class="float-lefth px-2 py-2">
                <div class="form-group pt-2 flex">
                    <label class="w-28 control-label align-top mx-2 pt-2" for="id">{{ __('Id')}}</label>
                    <div class="w-28">
                        <input name="idCategory" id="newcategory" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="idCategory">
                        @error('idCategory') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group pt-2 flex">
                    <label class="w-28 control-label align-top mx-2 pt-2" for="newcategory">{{ __('New category')}}</label>
                    <div class="w-48">
                        <input name="newcategory" id="newcategory" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" wire:model="newcategory">
                        @error('newcategory') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group pt-2 flex">
                    <button @click="list=true, create=false, edit=false, category=false" type="submit" class="bg-gray-900 hover:bg-purple-700 text-white font-bold py-2 px-2 bg-white rounded-md h-11 border-blue-300 px-1"> {{ __('Send')}}</button>
                </div>
            </div>
        </form>
        @forelse ($categories as $category)
        <table class="w-1/4">
            <tr>
                <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $category->id }}
                </td>
                <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $category->name }}
                </td>
                <td class="px-2 py-4 whitespace-nowrap text-sm font-medium">
                    <button @click="list=false, create=false, category=true" class="text-indigo-600 hover:text-indigo-900 w-28" wire:click="editcategory({{ $category->id }})">{{ __('Edit') }}</a>
                </td>

                <td class="px-2 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="confirm('¿Seguro que quieres eliminar?') || event.stopImmediatePropagation()" class="text-red-700 hover:text-red-800 w-28" wire:click="destroycategory({{ $category->id }})">{{ __('Delete') }}</a>
                </td>
            </tr>
        </table>
        @endforeach
        <button @click="list=true, create=false, edit=false, category=false" class="bg-transparent pull-right hover:bg-red-500 text-red-700 font-semibold hover:text-white my-1 ml-2 py-2 px-2 border rounded w-28">{{ __('Cancel') }}</button>
    </div>
    <div x-show="list">
        <button @click="list=false, create=true, edit=false, category=false" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white my-2 ml-2 py-2 px-2 border border-blue-500 hover:border-transparent rounded" wire:click="form(1,'')">{{ __('New register') }}</button>
        <button class="bg-transparent hover:bg-green-500 text-blue-700 font-semibold hover:text-white my-2 ml-2 py-2 px-2 border border-blue-500 hover:border-transparent rounded" wire:click="form(3,'')">{{ __('Back') }}</button>
        <button @click="list=false, create=false, edit=false, category=true" class="bg-transparent hover:bg-green-500 text-blue-700 font-semibold hover:text-white my-2 ml-2 py-2 px-2 border border-blue-500 hover:border-transparent rounded">{{ __('Category') }}</button>
    </div>
</div>

