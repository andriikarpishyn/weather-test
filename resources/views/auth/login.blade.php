<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                          required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password" name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button-link href="{{ route('register') }}" type="button" >
                {{ __('Register') }}
            </x-primary-button-link>
            <x-primary-button class="ml-4" form="socialRegister">
                {{ __('Login by Google') }}
            </x-primary-button>

            <x-primary-button class="ml-4 mr-4">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <form action="{{ route('social.auth', ['provider' => 'google']) }}" method="post" id="socialRegister">
        @csrf
    </form>
</x-guest-layout>
