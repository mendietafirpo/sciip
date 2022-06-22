<div class="@if(session('idP')) absolute py-8 w-full h-full bg-gray-600 @endif">
    <span class="text-gray-700 font-bolt ml-2">{{ __($sendOk) }}</span>
    <div class="rounded-md border-b-2xl shadow-lg">
                <form wire:ignore wire:submit.prevent="createPost" enctype="multipart/form-data" class="w-full px-1">
                    <div class="inline-flex">
                        <select wire:model="category_id" name="category_id" class="outline-none text-gray-500 text-sm form-input border-gray-300 rounded-md h-10 block">
                            <option value="0">{{ __('Select option')}}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" >{{ __($category->name) }}</option>
                        @endforeach
                        </select>
                    </div>
                        <select wire:model="status" name="status" class="outline-none text-gray-500 text-sm form-input border-gray-300 rounded-md h-10 block">
                            <option value="1">{{ __('Published')}}</option>
                            <option value="2">{{ __('Draft')}}</option>
                            <option value="3">{{ __('Archived')}}</option>
                        </select>
                        <input required wire:model="title" name="title" placeholder="{{ __('post title')}}" class="form-control bg-white w-full rounded-md h-11 border border-blue-300">
                    <div class="w-auto">
                        <div
                            x-data
                            x-init="initEditor($refs['{{ $body }}'])"
                            wire:key="{{ $body }}"
                            x-ref="{{ $body }}"
                        > {!! $body !!}
                        </div>
                    </div>
                    <div class="float-right px-2 py-2">
                        <button  type="submit" class="bg-gray-900 hover:bg-purple-700 text-white font-bold py-2 px-2 bg-white rounded-md h-11 border-blue-300 content-center">
                            @if(session('idP')){{ __('Change')}} @else {{ __('Post')}} @endif
                        </button>
                    </div>
                </form>
                @if(session('idP'))
                <div class="float-right px-2 py-2">
                    <button wire:click="cancel" class="bg-red-400 hover:bg-gray-700 pull-left text-white font-bold py-2 px-2 bg-white rounded-md h-11 border-red-300 content-center">
                        {{ __('Cancel')}}
                    </button>
                </div>
                @endif
    </div>
    <!-- scripts -->
    <script src="{{ asset('/js/ckeditor_axion.js') }}"> </script>

</div>
