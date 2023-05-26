@extends('layouts.header')

@section('content')
<section>
    <h3 class="flex sm:mt-2 2xl:mt-8 text-gray-700 justify-center p-2 text-3xl font-medium mx-6">{{ __('auth.register') }}</h3>
    <div class="flex justify-center mt-4 mb-12">
        <div class="bg-white shadow-md overflow-hidden w-full max-w-md rounded-md">
            <form method="POST" action="{{ route('register') }}">
                    @csrf
                <div class="mb-3">
                    <label for="name" class="">{{ __('auth.name') }}</label>

                    <div class="flex flex-col space-y-3">
                        <input id="name" type="text" class="" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="id_number" class="">{{ __('auth.id_number') }}</label>
                    <div class="flex flex-col space-y-3">
                        <input id="id_number" type="text" class="" name="id_number" value="{{ old('id_number') }}" required autocomplete="id_number">
                        @error('id_number')
                            <span class="" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class=" mb-3">
                    <label for="email" class="">{{ __('auth.email_address') }}</label>
                    <div class="flex flex-col space-y-3">
                        <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="">{{ __('auth.password') }}</label>
                    <div class="flex flex-col space-y-3">
                        <input id="password" type="password" class="" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="">{{ __('auth.confirm_password') }}</label>
                    <div class="flex">
                        <input id="password-confirm" type="password" class="w-full" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="">
                        <button type="submit" class="py-1.5 px-5 border">
                            {{ __('auth.register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
