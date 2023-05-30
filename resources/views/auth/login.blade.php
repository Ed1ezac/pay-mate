@extends('layouts.header')

@section('content')
<section>
    <h3 class="flex sm:mt-2 2xl:mt-8 text-gray-700 justify-center p-2 text-3xl font-medium mx-6">{{ __('auth.login') }}</h3>
    <div class="flex justify-center mt-4 mb-12">
        <div class="bg-white shadow-md px-8 py-8 overflow-hidden w-full max-w-sm rounded-md">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class=" mb-3">
                    <label for="email" class="">{{ __('auth.email_address') }}</label>

                    <div class="flex flex-col">
                        <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class=" mb-3">
                    <label for="password" class="">{{ __('auth.password') }}</label>

                    <div class="flex flex-col">
                        <input id="password" type="password" class="" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="flex items-center space-x-3">
                        <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="" for="remember">
                            {{ __('auth.remember_me') }}
                        </label>
                    </div>
                </div>

                <div class="">
                    <div class="flex flex-col space-y-3">
                        <button type="submit" class="my-btn px-5 py-1.5  border">
                            {{ __('auth.login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="self-center" href="{{ route('password.request') }}">
                                {{ __('auth.forgot_password') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
