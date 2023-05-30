@extends('layouts.header')

@section('content')

<section class="h-80">
    <div class="sm:pt-16 pb-10 max-w-7xl 2xl:mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 mb-20">
            <div class="flex flex-col justify-center pl-16 pr-6 py-16">
                <h2 class="text-gray-800 text-5xl font-bold mb-8 text-center">
                    Welcome to <span class="text-blue-500 font-black">PayMate</span> 
                </h2>
                <p class="text-center text-xl text-gray-400">The platform where you can pay for many government fees and charges.</p>
            </div>
            <div>
                <img class="hidden lg:block h-64 pl-32 lg:pl-0 " src="{{ asset('pay_online.svg')}}" alt="man holding bank card">
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white px-16 mt-24">
        <div class="max-w-7xl xl:mx-auto">
            <div class="flex justify-center text-center">
                <h3 class="font-bold text-4xl max-w-2xl">Pay for multiple Fees/Charges.</h3>
            </div>
            <div class="flex justify-center text-center">
                <p class="text-center text-gray-700 text-lg mt-4 max-w-2xl">Our intuitive and easy to use interface allows you to simply choose from several options to pay for on the fly.</p>
            </div>
        </div>
</section>

@endsection