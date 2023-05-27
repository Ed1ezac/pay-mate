@extends('layouts.dashboard-header')

@section('features')
<section>
    <div>
    @if (isset($organizations) && count($organizations)>0)
        <div class="flex justify-between pt-8 mb-8">
            <h3>Organizations</h3>
            <a class="px-5 py-1.5 border" href="/new/organization">{{ __('general.create_organization') }}</a>
        </div>
        <table class="bg-white">
            <thead class="bg-gray-100">
                    <th class="flex py-3 justify-start px-3 w-96">Organization Name</th>
                    <th>Payables (Fees &amp; Charges)</th>
                    <th>Created At</th>
            </thead>
            <tbody>
            @foreach ($organizations as $org)
                <tr>
                    <td class="py-2 px-3">
                        <div>
                            <a class="text-gray-700 hover:text-blue-500" href="{{ '/organization/'. $org->id .'/payables' }}">
                                {{ $org->name }}
                            </a>
                        </div>
                    </td>
                    <td>{{ count($org->payables) }}</td>
                    <td>{{ $org->created_at }}</td>    
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="flex flex-col  items-center justify-center">
            <p class="mb-5 text-center">{{ __('general.no_orgs_available') }}</p>
            <a class="px-5 py-1.5 border" href="/new/organization">{{ __('general.create_organization') }}</a>
        </div>
    @endif
    </div>
</section>
@endsection