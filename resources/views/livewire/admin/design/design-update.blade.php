<div class="max-w-sm mx-auto rounded-lg shadow-xl overflow-hidden p-6 space-y-10">
    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        @if(Auth::user()->admin==1)
        <div class="form-group pt-2 flex">
            <label class="w-28 control-label align-top mx-2 pt-2" for="color_bg">{{ __('Color')}}_bg</label>
            <div class="w-96">
                <input name="color_bg" id="color_bg" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" placeholder="bg-sky-400" wire:model="color_bg">
                @error('color_bg') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group pt-2 flex">
            <label class="w-28 control-label align-top mx-2 pt-2" for="color_tx_1">{{ __('Color')}}_tx_1</label>
            <div class="w-96">
                <input name="color_tx_1" id="color_tx_1" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" placeholder="text-gray-700" wire:model="color_tx_1">
                @error('color_tx_1') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group pt-2 flex">
            <label class="w-28 control-label align-top mx-2 pt-2" for="color_tx_2">{{ __('Color')}}_tx_2</label>
            <div class="w-96">
                <input name="color_tx_2" id="color_tx_2" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" placeholder="text-gray-600" wire:model="color_tx_2">
                @error('color_tx_2') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group pt-2 flex">
            <label class="w-28 control-label align-top mx-2 pt-2" for="text_sz_1">{{ __('Text')}}_sz_1</label>
            <div class="w-96">
                <input name="text_sz_1" id="text_sz_1" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" placeholder="font-lg" wire:model="text_sz_1">
                @error('text_sz_1') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group pt-2 flex">
            <label class="w-28 control-label align-top mx-2 pt-2" for="text_sz_1">{{ __('Text')}}_sz_2</label>
            <div class="w-96">
                <input name="text_sz_2" id="text_sz_2" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" placeholder="font-md" wire:model="text_sz_2">
                @error('text_sz_2') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group pt-2 flex">
            <label class="w-28 control-label align-top mx-2 pt-2" for="class">{{ __('Class')}}</label>
            <div class="w-96">
                <input name="class" id="class" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" placeholder="ejm shadow-lg" wire:model="class">
                @error('class') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group pt-2 flex">
            <label class="w-28 control-label align-top mx-2 pt-2" for="status">{{ __('Status')}}</label>
            <div class="w-96">
                <input type="text" class="bg-white w-full rounded-md h-11 border border-blue-300 px-1" id="status" placeholder="true / false" wire:model="status"/>
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
        @endif
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
</div>
