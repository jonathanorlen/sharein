<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body p-xl">

            <x-jet-validation-errors class="mb-3 rounded-0" />

            @if (session('status'))
                <div class="alert alert-success mb-3 rounded-0" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="justify-content-center">
                @csrf
                <div class="mb-l">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                 name="email" :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-l">
                    <x-jet-label value="{{ __('Password') }}" />

                    <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="current-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>
                

                <div class="mt-xl">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary text-uppercase">
                            Masuk
                        </button>
                        {{-- <x-jet-button>
                            {{ __('Log in') }}
                        </x-jet-button> --}}
                    </div>
                </div>
                <div class="mt-l">
                    <div class="custom-control custom-checkbox">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <label class="custom-control-label" for="remember_me">
                            {{ __('Ingat saya') }}
                        </label>

                        @if (Route::has('password.request'))
                        <a class="text-muted float-end" href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif
                    </div>
                </div>
                <div class="text-center mt-xxl">
                    Tidak punya akun? 
                    <a class="text-primary" href="{{ route('register') }}">{{ __('Daftar Gratis') }}
                    </a>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>