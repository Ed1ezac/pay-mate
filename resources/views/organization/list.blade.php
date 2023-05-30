@extends('layouts.dashboard-header')

@section('features')
<section>
    <div class="mb-3">
        {{ Breadcrumbs::render('organizations') }}
    </div>

    <div>
    @if (isset($organizations) && count($organizations)>0)
        <div class="flex items-center pt-8 mb-8">
            <a class="my-btn" href="/new/organization">{{ __('general.create_organization') }}</a>
        </div>

        <div class="mr-4 xl:mr-6 mt-8 xl:mt-10 mb-8">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="max-w-7xl shadow overflow-hidden border-b border-gray-200 sm:rounded">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                    <th scope="col" class="py-3 text-left px-3 tracking-wider">Organization Name</th>
                                    <th scope="col" class="py-3 text-left px-3 tracking-wider">Fees &amp; Charges</th>
                                    <th scope="col" class="py-3 text-left px-3 tracking-wider">Created At</th>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($organizations as $org)
                                <tr>
                                    <td class="py-2 px-3">
                                        <div>
                                            <a class="text-gray-700 hover:text-blue-500" href="{{ '/organization/'. $org->id .'/payables' }}">
                                                {{ $org->name }}
                                            </a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-3 text-center">{{ count($org->payables) }}</td>
                                    <td class="py-2 px-3">{{ $org->created_at }}</td>    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-col  items-center justify-center">
            <p class="mb-5 text-center">{{ __('general.no_orgs_available') }}</p>
            <a class="px-5 py-1.5 border" href="/new/organization">{{ __('general.create_organization') }}</a>
        </div>
    @endif
    </div>
</section>
@endsection