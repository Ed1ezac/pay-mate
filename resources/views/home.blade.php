@extends('layouts.dashboard-header')

@section('features')
<section>
    <h3 class="text-xl mb-12 text-gray-600">Welcome Back! Select a Fee/Charge to pay for.</h3>
    <!----->
    @if(isset($payables) && count($payables)>0)
    <div>
        <div class="flex flex-wrap space-x-4 space-y-5">
        @foreach ($payables as $payable)
            <div class="bg-white shadow-sm rounded-md">
                <div class="flex flex-col space-y-3 px-16 py-14">
                    <h3 class="text-xl font-semibold">{{ $payable->name }}</h3>
                    <p>{{ $payable->organization->name }}</p>
                    <p>P{{ $payable->principal }}</p>
                    <div class="flex justify-end">
                        <a class="px-8 py-1.5 border" href="{{'/pay/for/payable/id/'.$payable->id}}">Pay</a>
                    </div>
                   
                </div>
            </div>
        @endforeach
        </div>
    </div>
    @else
    <p class="text-center mt-12 text-xl">There are no fees/charges to pay for yet..</p>
    @endif
</section>
@endsection
