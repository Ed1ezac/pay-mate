@extends('layouts.dashboard-header')

@section('features')
<section>
    <div class="mb-3">
        {{ Breadcrumbs::render('create-org') }}
    </div>

    <h3 class="flex sm:mt-2 2xl:mt-12 text-gray-700 justify-center p-2 text-3xl font-medium mx-6">{{ __('general.new_organization') }}</h3>
    <div class="flex justify-center mt-4 mb-12">
        <div class="bg-white shadow-md overflow-hidden px-6 py-5 w-full max-w-md rounded-md">
            <form action="{{ route('new_org') }}" method="Post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="mb-3">
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
                <div class="mt-8">
                    <button type="submit" class="my-btn relative w-full">
                        {{ __('general.create_organization') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection