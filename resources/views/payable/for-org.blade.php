@extends('layouts.dashboard-header')

@section('features')
<section>
    @if (isset($payables) && count($payables)>0)
    <div class="flex items-center justify-between mb-8">
        <p>Payables for {{ $org->name }}</p>
        <a class="border border-gray-400 py-1.5 px-5" href="{{ route('new_payable', $org->id) }}">
            {{ __('general.add_payable') }}
        </a>
    </div>
    <table>
        <thead class="bg-gray-100">
            <th class="py-2">Payable Name</th>
            <th>Payable Type</th>
            <th>Principal Amount</th>
            <th>Acrrual</th>
            <th>Recursion</th>
        </thead>
        <tbody>
            @foreach ($payables as $payable)
            <tr>
                <td>{{ $payable->name }}</td>
                <td>{{ $payable->type }}</td>
                <td>{{ $payable->principal }}</td>
                <td>
                    @if($payable->accrues)
                    {{ 'Adds '.$payable->accrues_by.' every '.$payable->accrues_every }}
                    @else
                        No Accrual
                    @endif
                </td>
                <td>
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