<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <legend class="text-center">Admin Panel Login</legend>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            
            <x-primary-button class="ms-3" style="background-color:#52291D;">
                <i class="fa fa-sign-in" area-hidden="true"></i>&nbsp;{{ __('Log in') }}
            </x-primary-button>
        </div>
        <hr style="border:1px #000 solid;" class="mt-4 mb-4"/>
        <!-- @if (Route::has('password.request'))
                <center>
                        <x-primary-button class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="background-color:#52291D;">
                        <a href="{{ route('password.request') }}"> {{ __('Forgot your password?') }} </a>
                        </x-primary-button>
                </center>
        @endif
        <hr style="border:1px #000 solid;" class="mt-4 mb-4"/>
        <p class="text-center text-md text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Don't have a UCB Supplier Portal? </p> -->
        <!-- <center>
            <x-primary-button class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" target="_blank" href="https://jmmspices.com" style="background-color:#52291D;">
                <i class="fa fa-hand-pointer-o" area-hidden="true"></i>&nbsp;Visit JMM Website
            </x-primary-button>
        </center> -->
    </form>
</x-guest-layout>
