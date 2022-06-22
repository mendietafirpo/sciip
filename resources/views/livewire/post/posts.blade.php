<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if (!$idP)
            <div class="my-4">
                @if (Auth::user())
                    @if(Auth::user()->admin>=1 && Auth::user()->admin<=3)
                            <livewire:post.post-manager/>
                    @endif
                @endif
            </div>
            <div class="grid grid-cols-6 lg:grid-cols-12 bg-gray-200 shadow-md p-2">
                <input class="col-span-3 w-full px-1 form-input text-purple-500 border-b-4 border-purple-300 rounded-md shadow-2xl block h-10"
                wire:model="search"
                type="text" placeholder="{{ __('Search post') }}">
                <div class="col-span-3">
                    <select id="category" wire:model="category" name="category" class="w-full px-1 text-purple-500 text-sm form-input border-b-4 border-purple-300 rounded-md shadow-2xl h-10 block">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" >{{ __($category->name) }}</option>
                        @endforeach
                            <option selected value="0">{{ __('Select option')}}</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <select wire:model="orderBy" name="orderBy" id="orderBy" class="w-full px-1 text-purple-500 text-sm form-input border-b-4 border-purple-300 rounded-md shadow-2xl h-10 block">
                        <option value="asc">{{ __('Order oldest') }}</option>
                        <option value="desc">{{ __('Order recent') }} </option>
                    </select>
                </div>
                <div class="col-span-2">
                    <select wire:model="perPage" name="perPage" id="perPage" class="w-full px-1 text-purple-500 text-sm form-input border-b-4 border-purple-300 rounded-md shadow-2xl h-10 block">
                        <option value="5">5 {{ __('Per Page') }}</option>
                        <option value="10">10 {{ __('Per Page') }} </option>
                        <option value="15">15  {{ __('Per Page') }}</option>
                        <option value="20">20  {{ __('Per Page') }}</option>
                    </select>
                </div>
                @if ($search !=='')
                <div class="col-span-1">
                    <button wire:clicK="clear" class="w-full px-1 h-10 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white  border border-blue-500 hover:border-transparent rounded">
                    X </button>
                </div>
                @endif
            </div>
        @endif

        @forelse ($posts as $post)
            @if (!$idP)
            <article class="flex flex-col shadow my-4">
                <div class="bg-white flex flex-col justify-start p-6">
                    <p class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</p>
                    <p class="text-sm pb-3">
                        {{ __('By')}}
                        <a href="mailto://{{ App\Models\User::where('id',$post->user_id)->pluck('email')->first() }}"
                            class="font-semibold hover:text-gray-800">
                            @if (App\Models\User::where('id',$post->user_id)->pluck('profile_photo_path')->first())
                                <img src="{{ asset('/storage/'.App\Models\User::where('id',$post->user_id)->pluck('profile_photo_path')->first()) }}" type="button" style="width: 25px; height: 25px; border-radius: 50%;"></img>
                            @else
                                {{ App\Models\User::where('id',$post->user_id)->pluck('name')->first() }}
                            @endif
                        </a>,
                        {{__('Published')}} {{$post->created_at->format('M d, Y g:i A')}}
                    </p>
                    <p class="pb-6">{!! Str::limit($post->body, 400, $end='...') !!}
                    @if(Auth::user())
                        @if(Auth::user()->id == $post->user_id)
                            <button class="bg-green-200 w-32 shodow-lg px-2 rounded-md text-blue-800 hover:bg-black hover:text-white" wire:click="edit({{ $post->id}})">
                                {{ __('Edit')}}...
                            </button>
                        @endif
                    @endif
                    <button class="bg-gray-200 w-32 shodow-lg px-2 rounded-md text-blue-800 hover:bg-black hover:text-white" wire:click="readmore({{ $post->id}})">
                        {{ __('Read more')}}...
                    </button>
                    </p>
                </div>
            </article>
            @endif
            @if ($idP)
                <section class="max-w-7xl mx-auto absolute top-5 p-2 bg-gray-200">
                        <article>
                            <div class="bg-purple-100 rounded-md shadow-2xl text-black overflow-x-auto h-auto w-full">
                                <div class="pull-right">
                                    <button wire:click="listpost" class="text-blue hover:text-red-500 text-center text-sm ">
                                        <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="text-2xl text-blue-800 font-bold pl-2 pt-2"> {!! $post->title !!}</div>
                                <br/>
                                <div class="p-4 text-justify"> {!! $post->body !!} </div>
                            </div>
                        </article>
                @if (Auth::user())
                        <div class="m-4">
                            <button wire:click="like({{ $post->id }})" class="inline-flex space-x-2 {{ $like ? 'text-green-400 hover:text-green-500' : 'text-gray-400 hover:text-gray-500' }} focus:outline-none focus:ring-0">
                                <svg class="h-5 w-5" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                </svg>
                            </button>
                            <span class="font-thin text-gray-400">{{ $likes }}</span>
                                <div>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode('sciip.com.ar') }}"
       target="_blank">
       <i class="fa fa-facebook-official"></i>
    </a>
                                </div>
                        </div>
                @endif
                <!-- send comment-->
                <div class="bg-gray-200 shadow-lg rounded-md border-blue-200 mt-4">
                        <div>
                            <input wire:keydown.enter="sendComment({{ $post->id }})" wire:model="comment" type="text" autofocus placeholder="{{ __('Write your comment')}}" class="form-control rounded-md border-gray-300 h-11 w-3/4"/>
                        </div>
                </div>
            @endif
        @empty
        <br/>
        {{ __('There are no posts yet')}}!
        @endforelse
        {!! $posts->render() !!}
                    <div x-data="{ isOpen : ''}" class="bg-gray-200 text-thin mt-3 p-5">
                    @if ($idP)
                        @if (Auth::user())
                            @foreach ($comments as $comm)
                                <div class="bg-white shadow-md ml-2 p-1">
                                    <p class="italic text-sm">{{ App\Models\User::where('id',$comm->user_id)->pluck('name')->first() }}: {{ $comm->created_at }}</p>
                                    <p> {{ $comm->body }} <button wire:model="reply({{ $comm->post_id }}" @click="isOpen = 'reply-{{ $comm->id }}'" class="transparent text-red-600 hover:bg-gray-400 rounded-md p-1">{{ __('Reply')}}</button></p>
                                </div>
                                @foreach ($replies as $reply)
                                    @if($reply->parent_id == $comm->id)
                                        <div class="bg-gray-200 shadow-md ml-8 p-1 text-sm text-purple-500">
                                            <p class="italic">{{ App\Models\User::where('id',$reply->user_id)->pluck('name')->first() }}: {{ $reply->created_at }}</p>
                                            <p> {{ $reply->body }}</p>
                                        </div>
                                    @endif
                                @endforeach
                                <br/>
                                <div @click.away="isOpen = ''" x-show="isOpen === 'reply-{{ $comm->id }}'" class="ml-5 p-2">
                                    <input wire:keydown.enter="sendReply({{ $comm->post_id }},{{$comm->id }})" wire:model="reply" placeholder="{{ __('your reply') }}" class="form-control rounded-md border-gray-300 w-3/4" type="text"/>
                                </div>
                            @endforeach
                        @endif
                        <button class="bg-pink-300 shodow-lg px-1 rounded-md text-blue-800 hover:bg-black hover:text-white mt-2 pull-right" wire:click="listpost"> {{ __('Close')}} </button>
                    @endif
                    </div>
                </section>
</div>
