<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Details of {{ $customers[0]->customerName }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 detail-holder">
                    <!-- Customer Information -->
                    <div class="card">
                        <img src="{{ asset('assets/img/customers/customer_image.jpg') }}"
                             alt="{{ $customers[0]->customerName }}"
                             class="image">
                        <div class="info">
                            <h2 class="title">Customer: {{ $customers[0]->customerName }}</h2>
                            <p class="description">
                                <strong>Contact:</strong> {{ $customers[0]->contactFirstName }} {{ $customers[0]->contactLastName }}
                            </p>
                            <p class="description"><strong>Phone:</strong> {{ $customers[0]->phone }}</p>
                            <p class="description"><strong>Address:</strong>
                                {{ $customers[0]->addressLine1 }},
                                @if($customers[0]->addressLine2)
                                    {{ $customers[0]->addressLine2 }},
                                @endif
                                {{ $customers[0]->city }},
                                {{ $customers[0]->state }},
                                {{ $customers[0]->postalCode }},
                                {{ $customers[0]->country }}
                            </p>
                            <p class="description"><strong>Sales Rep Employee
                                    Number:</strong> {{ $customers[0]->salesRepEmployeeNumber }}</p>
                            <p class="description"><strong>Credit Limit:</strong>
                                ${{ number_format($customers[0]->creditLimit, 2) }}</p>
                            <div class="btn2">
                                <a href="{{ route('customerlist') }}" class="button">Back to Customers List</a>
                                <a href="{{ route('customer.orders', ['customerNumber' => $customers[0]->customerNumber]) }}"
                                   class="button">View all orders</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
