<div>
    <div class="bg-gray-500 rounded-md border-b-2xl shadow-lg">
        <form wire:submit.prevent="createPost" enctype="multipart/form-data">
            <select wire:model="category_id" name="category_id" class="outline-none text-gray-500 text-sm form-input border-gray-300 rounded-md mt-1 ml-2 h-10 block">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" >{{ __($category->name) }}</option>
            @endforeach
            </select>
            <input required wire:model="title" name="title" placeholder="{{ __('post title')}}" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1">
            <div wire:ignore class="w-auto">
                <div
                    x-data
                    x-init="initEditor($refs['{{ $body }}'])"
                    wire:key="{{ $body }}"
                    x-ref="{{ $body }}"
                >
                {!! $this->body !!}
                </div>
            </div>
            <div class="float-right px-2 py-2">
                <button  type="submit" class="bg-gray-900 hover:bg-purple-700 text-white font-bold py-2 px-2 bg-white rounded-md h-11 border-blue-300 px-1 content-center"> {{ __('Post')}}</button>
            </div>
        </form>
    </div>
    <script src="{{ asset('/js/ckeditor_axion.js') }}"> </script>
</div>
