@extends('layouts.dashboard-header')

@section('features')
<section>
    <h3 class="flex sm:mt-6 2xl:mt-8 mb-8 text-gray-700 justify-center p-2 text-3xl font-medium mx-6">{{ __('general.new_payment') }}</h3>
    
    <div class="flex space-x-24 flex-wrap">
        <div class="bg-white w-96 p-6 shadow-md">
            <form action="#" method="POST">
                <div class="">
                    <div class="flex flex-col mb-4">
                        <label for="names">Card Holder Name</label>
                        <input type="text" id="names" name="names" autocomplete="names">
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="card-number">Card Details</label>
                        <pay></pay>
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
                <div class="text-4xl">
                    P{{ $payable->principal }}
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection