@extends('layouts.dashboard-header')

@section('features')
<section>
    @if (isset($payables) && count($payables)>0)
    <div class="flex items-center justify-between mb-8">
        <p>Fees/Charges for {{ $org->name }}</p>
        <a class="border border-gray-400 py-1.5 px-5" href="{{ route('new_payable', $org->id) }}">
            {{ __('general.add_payable') }}
        </a>
    </div>

    <div class="mr-4 xl:mr-6 mt-8 xl:mt-10 mb-8">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="max-w-7xl shadow overflow-hidden border-b border-gray-200 sm:rounded">

                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <th scope="col" class="py-3 text-left px-3 tracking-wider">Fee/Charge Name</th>
                        <th scope="col" class="py-3 text-left px-3 tracking-wider">Type</th>
                        <th scope="col" class="py-3 text-left px-3 tracking-wider">Principal Amount</th>
                        <th scope="col" class="py-3 text-left px-3 tracking-wider">Acrrual</th>
                        <th scope="col" class="py-3 text-left px-3 tracking-wider">Recursion</th>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($payables as $payable)
                            <tr>
                                <td class="py-2 px-3">{{ $payable->name }}</td>
                                <td class="py-2 px-3">{{ $payable->type }}</td>
                                <td class="py-2 px-3">P{{ $payable->principal }}</td>
                                <td class="py-2 px-3">
                                    @if($payable->accrues)
                                    {{ 'Adds P'.$payable->accrues_by.' every '.$payable->accrues_every }}
                                    @else
                                        No Accrual
                                    @endif
                                </td>
                                <td class="py-2 px-3">
                                    @if($payable->recurs)
                                        {{ 'Recurs every '.$payable->recurs_every }}
                                    @else
                                        No Recursion
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="flex flex-col mt-12 items-center justify-center">
        <p class="mb-3 text-2xl text-center">{{ __('general.no_payables_available') }}</p>
        <p class="mb-5 text-2xl text-center">for {{ $org->name  }}</p>
        <a class="border border-gray-400 py-1.5 px-5" href="{{ route('new_payable') }}">
            {{ __('general.add_payable') }}
        </a>
    </div>
    @endif
</section>
@endsection