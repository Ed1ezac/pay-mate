@extends('layouts.dashboard-header')

@section('features')
<section class="pb-8">
    <div class="mb-3">
        {{ Breadcrumbs::render('my-payments') }}
    </div>
    <div>
        @if (isset($payments) && count($payments)>0)
        <div class="mr-4 xl:mr-6 mt-8 xl:mt-10 mb-8">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="max-w-7xl shadow overflow-hidden border-b border-gray-200 sm:rounded">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <th scope="col" class="py-3 text-left px-3 tracking-wider">Paid For</th>
                                <th scope="col" class="py-3 text-left px-3 tracking-wider">Amount</th>
                                <th scope="col" class="py-3 text-left px-3 tracking-wider">Due </th>
                                <th scope="col" class="py-3 text-left px-3 tracking-wider">Paid At</th>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($payments as $paid)
                            <tr>
                                <td class="py-2 px-3">{{ $paid->payable->name }}</td>
                                <td class="py-2 px-3">P{{ $paid->amount }}</td>
                                <td class="py-2 px-3 text-red-400">{{ $paid->due }}</td>
                                <td class="py-2 px-3">{{ $paid->created_at }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="flex flex-col  items-center justify-center">
            <p class="mb-5 text-center"> No Payments Available</p>
        </div>
        @endif
    </div>
</section>
@endsection