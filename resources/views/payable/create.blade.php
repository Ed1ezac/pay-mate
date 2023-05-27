@extends('layouts.dashboard-header')

@section('features')
<section>
    <h3 class="flex sm:mt-6 2xl:mt-8 text-gray-700 justify-center p-2 text-3xl font-medium mx-6">{{ __('general.new_payable') }}</h3>
    <div class="flex justify-center mt-4 mb-12">
        @if(isset($organizations) && count($organizations)>0)
        <div class="bg-white shadow-md overflow-hidden w-full max-w-md rounded-md">
            <form action="{{ route('create_payable') }}" method="Post">
                @csrf
                
                <div class="mb-4">
                    <label for="type">{{ __('general.organization_name') }}</label>
                    <div>
                        <select name="organization_id" required>
                            @foreach ($organizations as $org)
                            <option value="{{ $org->id }}">{{ $org->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="name">{{ __('general.payable_name') }}</label>
                    <div>
                        <input type="text" name="name" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="type">{{ __('general.payable_type') }}</label>
                    <div>
                        <select name="type" required>
                            <option value="fee">fee</option>
                            <option value="charge">charge</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="principal">{{ __('general.principal_amount') }}</label>
                    <div>
                        <input type="text" name="principal" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="accrues">{{ __('general.accrues') }}</label>
                    <div>
                        <input type="checkbox" name="accrues" id="" required>
                        <p class="text-gray-400 text-xs">{{ __('general.accrual_help') }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="accrues_every">{{ __('general.accrues_every') }}</label>
                    <div class="flex space-x-3">
                        <input type="text" name="accrual_frequency" id="">
                        <select name="accrual_period" id="">
                            <option value="sec">Second</option>
                            <option value="min">Minute</option>
                            <option value="hour">Hour</option>
                            <option value="day">Day</option>
                            <option value="week">Week</option>
                            <option value="Month">Month</option>
                            <option value="Year">Year</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="accrues_by">{{ __('general.accrues_by') }}</label>
                    <div>
                        <input type="text" name="accrues_by" id="">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="recurs">{{ __('general.recurs') }}</label>
                    <div>
                        <input type="checkbox" name="recurs" id="">
                        <p class="text-gray-400 text-xs">{{ __('general.recursion_help') }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="recurs_every">{{ __('general.recurs_every') }}</label>
                    <div class="flex space-x-3">
                        <input type="text" name="recursion_frequency" id="">
                        <select name="recursion_period" id="">
                            <option value="sec">Second</option>
                            <option value="min">Minute</option>
                            <option value="hour">Hour</option>
                            <option value="day">Day</option>
                            <option value="week">Week</option>
                            <option value="Month">Month</option>
                            <option value="Year">Year</option>
                        </select>
                    </div>
                </div>

                
                <button type="submit" class="py-1.5 px-5 border">{{ __('general.create_payable') }}</button>

            </form>
        </div>
        @else
        <div class="flex flex-col items-center">
            <p class="mb-5">There are no organizations to create a Payable for.</p>
            <a class="px-5 py-1.5 border" href="/new/organization">{{ __('general.create_organization') }}</a>
        </div>
        @endif
    </div>
</section>
@endsection