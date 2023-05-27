@extends('layouts.dashboard-header')

@section('features')
<section>
    <h3 class="flex sm:mt-2 2xl:mt-8 text-gray-700 justify-center p-2 text-3xl font-medium mx-6">{{ __('general.new_organization') }}</h3>
    <div class="flex justify-center mt-4 mb-12">
        <div class="bg-white shadow-md overflow-hidden w-full max-w-md rounded-md">
            <form action="{{ route('new_org') }}" method="Post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="my-form-label">
                    {{ __('general.organization_name') }}
                    </label>
                    <input type="text" name="name" autocomplete="name" required class="w-full 
                    my-form-input @error('name') bg-red-200 border-red-400 focus:ring-red-400 @enderror">
                    @error('name')
                    <span class="text-xs p-1 bg-red-100 rounded font-normal text-red-400" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="group px-5 py-1.5 relative w-full border">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        {{ __('general.create_organization') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection