@extends('layouts.dashboard-header')

@section('features')
<section class="pb-8">
    <div class="mb-3">
        {{ Breadcrumbs::render('pay', $payable) }}
    </div>
    <h3 class="flex sm:mt-6 2xl:mt-8 mb-8 text-gray-700 justify-center p-2 text-3xl font-medium mx-6">{{ __('general.new_payment') }}</h3>
    
    <div class="flex space-x-24 space-y-8 mb-8 flex-wrap">
        <div class="bg-white w-96 p-6 shadow-md">
            <form action="{{ route('create_payment') }}" method="POST">
                @csrf                    
                    <input type="hidden" name="payable_id" value="{{ $payable->id }}"/>

                <div class="">
                    <div class="flex flex-col mb-4">
                        <label for="names">Card Holder Name</label>
                        <input type="text" id="names" name="names" required autocomplete="names">
                    </div>

                    <input type="hidden" name="payable_id" value="{{ $payable->id }}">
                    <div class="flex flex-col mb-4">
                        <label for="names">Amount</label>
                        <input type="text" type="number" name="amount" required autocomplete="names">
                    </div>
                    
                    <div class="flex flex-col mb-4">
                        <label for="card-number">Card Details</label>
                        <Pay></Pay>
                    </div>

                    <div class="flex justify-center mb-4">
                        <button class="border border-gray w-full py-2" type="submit">Pay</button>
                    </div>
                </div>
            </form>
        </div>

        <!---Invoice--->
        <div>
            <div class="p-4 border border-3 border-gray-300">
                <h3 class="font-semibold mb-4">{{ $payable->name }} Fee</h3>
                <div class="text-4xl mb-3">
                    P{{ $payable->principal }} <span class="text-xs">base charge</span>
                </div>

                @if(isset($due) && $due->due > 0)
                <div class="text-4xl mb-3">
                    P{{ $due->amount }} <span class="text-xs">due payments</span>
                </div>
                @endif

                @if($payable->accrues && $payable->due_at)
                <div class="text-4xl mb-3">
                    P{{ $payable->principal }} <span class="text-xs">accrued charge</span>
                </div>
                @endif

            </div>
        </div>
        
    </div>
</section>
@endsection