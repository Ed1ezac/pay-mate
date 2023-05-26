@extends('layouts.header')

@section('content')

<section class="h-80">
    <div class="pt-24 pb-10 h-full max-w-7xl 2xl:mx-auto">
        <h2 class="text-gray-800 text-5xl font-bold mb-8 text-center">
            Welcome to <span class="text-blue-500 font-black">PayMate</span> 
        </h2>
        <p class="text-center text-xl text-gray-400">The platform where you can pay for many government fees and charges.</p>
    </div>
</section>

<section class="pt-8">
    <div class="mt-12 text-center text-sm text-gray-500">
       Laravel Build v{{ Illuminate\Foundation\Application::VERSION }}
    </div>
</section>

@endsection