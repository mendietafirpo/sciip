<!--alpine-->
<div x-data="{ open:false, home:true, about:false, contact:false }">
    <!-- lenguagues -->
    <div class="flex">
        <button wire:click="spain">
            <div class="@if(session('lang')=='es') text-blue-700 border-b-2 border-blue-700 @endif ml-2 px-1 font-thin text-sm">{{ __('Spanish') }}</div>
        </button>
        <button wire:click="italy">
            <div class="@if(session('lang')=='it') text-blue-700 border-b-2 border-blue-700 @endif ml-2 px-1 font-thin text-sm">{{ __('Italian') }}</div>
        </button>
        <button @click="select=true" wire:click="engla">
            <div class="@if(session('lang')=='en') text-blue-700 border-b-2 border-blue-700 @endif ml-2 px-1 font-thin text-sm">{{ __('English') }}</div>
        </button>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <nav class="bg-gray-900 mx-2 my-1 rounded-t-lg">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start invisible sm:visible">
                    <div class="flex-shrink-0 flex items-center bg-red-400 rounded-lg">
                    <img class="block lg:hidden h-8 w-auto" src="{{ asset('/logo.png') }}" alt="sciip">
                    <img style="overflow: hidden; border-radius:50%" class="hidden lg:block h-10 w-16" src="{{ asset('/logo.png') }}" alt="sciip">
                    </div>
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <button @click="home = true, about=false, contact=false" :class="{'border-b-2':home,'font-bold':contact}" class="text-gray-200 hover:bg-gray-700 hover:text-white p-2 text-sm font-thin">{{ __('Home')}}</button>
                            <button @click="home = false, about=true, contact=false" :class="{'border-b-2':about,'font-bold':contact}" class="text-gray-200 hover:bg-gray-700 hover:text-white p-2 text-sm font-thin" >{{ __('About')}}</button>
                            <button @click="home = false, about=false, contact=true" :class="{'border-b-2':contact,'font-bold':contact}" class="text-gray-200 hover:bg-gray-700 hover:text-white p-2 text-sm font-thin">{{ __('Contact')}}</button>
                            @if (Auth::user())
                                <a href="{{ route('dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ __('Dashboard')}}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    </button>
                </div>
                <!-- Profile dropdown -->
                <!-- Right Side Of Navbar -->
                <div class="flex text-white pull-right px-2">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <a href="{{ url('/login') }}">{{ __('Login')}}</a>
                        <a>&nbsp|&nbsp</a>
                        <a href="{{ url('/register') }}">{{ __('Register')}}</a>
                    @else
                            <button @click="open = ! open">
                            <a title="{{ Auth::user()->name }}: {{ Auth::user()->email }}"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-right:15px;; padding-bottom:5px; padding-top:5px; padding-left:5px;">
                            @if (Auth::user()->profile_photo_url)
                                <img src="{{ asset(Auth::user()->profile_photo_url) }}" type="button" style="width: 35px; height: 35px; border-radius: 50%;"></img>
                            @else
                                {{ Auth::user()->username }}
                            @endif
                            </a> </button>
                    @endif
                    <div x-show="open" @click.away="open = false" class="pt-2 ml-2">
                        <a href="{{ route('profile.show') }}"><i class="fa fa-btn fa-user"></i> Perfil</a></li>
                        <a>
                            <form id="logout-form" action="{{ url('logout') }}" method="POST">{{ csrf_field() }}<button type="submit">Salir</button></form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
            <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden space-y-1">
                <button @click="home = true, about=false, contact=false" class="flex text-gray-300 hover:bg-gray-700 hover:text-white p-2 rounded-md text-sm font-medium">{{ __('Home')}}</button>
                <button @click="home = false, about=true, contact=false" class="flex text-gray-300 hover:bg-gray-700 hover:text-white p-2 rounded-md text-sm font-medium" >{{ __('About')}}</button>
                <button @click="home = false, about=false, contact=true" class="flex text-gray-300 hover:bg-gray-700 hover:text-white p-2 rounded-md text-sm font-medium">{{ __('Contact')}}</button>
                @if (Auth::user())
                    <a href="{{ route('dashboard') }}" class="flex text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ __('Dashboard')}}</a>
                @endif
        </div>
    </nav>
    <body>
        @include('flash-message')
        <!-- politice the cookies -->
        @if (session('cook') == 'true')
            <div>
                <livewire:tools.cookie />
            </div>
        @endif
        <!--encabezado-->
        <div x-show="home" x-data="{ slider:true }">
            @if($header=='true')
                <livewire:admin.design.header />
            @endif
            @if($slider=='true')
                <livewire:admin.design.slider />
            @endif
        </div>
        <!--about -->
        <div x-show="about">
            <div :class="{ 'hidden': !about }" class="hidden" >
                <livewire:admin.design.about />
            </div>
        </div>

        <!--contacto -->
        <div x-show="contact">
            <div :class="{ 'hidden': !contact }" class="md:w-3/4 lg:w-1/2 hidden">
                <livewire:tools.contact />
            </div>
        </div>
        <!-- list post -->
        <div x-show="home">
            <livewire:post.posts/>
        </div>
    </body>
<!--SCRIPTS-->
<script src="{{ asset('/js/welcome.js') }}"> </script>


<footer>
    @include('layouts.main')
    @include('layouts.footer')
</footer>

</div>
