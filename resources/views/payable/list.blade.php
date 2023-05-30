@extends('layouts.dashboard-header')

@section('features')
<section>
    <div class="mb-3">
        {{ Breadcrumbs::render('fees') }}
    </div>
@if(isset($payables) && count($payables)>0)
    <div>
        <div class="flex justify-between items-center pt-8 mb-8">
            <a class="my-btn" href="/new/payable">Create Fee/Charge </a>
        </div>
        
        <div class="flex flex-wrap space-x-4">
        @foreach ($payables as $payable)
            <div class="bg-white shadow-sm mb-4 rounded-md">
                <div class="flex flex-col space-y-3 px-16 py-14">
                    <h3 class="text-xl font-semibold">{{ $payable->name }}</h3>
                    <p>{{ $payable->organization->name }}</p>
                    <p>P{{ $payable->principal }}</p>
                    <div class="flex justify-end">
                        <a class="px-8 py-1.5 border" href="{{'/edit/payable/id/'.$payable->id}}">Edit</a>
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="text-center mt-12 text-xl">There are no fees/charges yet..</p>
    <a class="px-5 py-1.5 border" href="/new/payable">Create Fee/Charge </a>
@endif
</section>
@endsection