<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $customers[0]->customerName }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 detail-holder">
                    <!-- Image at the top -->
                    <div class="customer-image">
                        <img src="{{ asset('assets/img/customers/customer_image.jpg') }}" alt="{{ $customers[0]->customerName }}" class="w-32 h-32 rounded-full mx-auto">
                    </div>

                    <!-- Customer Information -->
                    <div class="customer-card">
                        <div class="customer-info">
                            <h2 class="customer-title">Customer: {{ $customers[0]->customerName }}</h2>
                            <p class="customer-contact">Contact: {{ $customers[0]->contactFirstName }} {{ $customers[0]->contactLastName }}</p>
                            <p class="customer-phone">Phone: {{ $customers[0]->phone }}</p>
                            <p class="customer-address">
                                Address:
                                {{ $customers[0]->addressLine1 }},
                                @if($customers[0]->addressLine2)
                                    {{ $customers[0]->addressLine2 }},
                                @endif
                                {{ $customers[0]->city }},
                                {{ $customers[0]->state }},
                                {{ $customers[0]->postalCode }},
                                {{ $customers[0]->country }}
                            </p>
                            <p class="customer-sales-rep">Sales Rep Employee Number: {{ $customers[0]->salesRepEmployeeNumber }}</p>
                            <p class="customer-credit">Credit Limit: ${{ number_format($customers[0]->creditLimit, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
