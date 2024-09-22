<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Details of {{ $office->city }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 detail-holder">
                    <div class="card">
                        @php
                            $randomImage = 'office' . rand(1, 4) . '.jpg'; // Randomly select an image from office1 to office4
                        @endphp
                        <img src="{{ asset('assets/img/offices/' . $randomImage) }}" alt="Office Image" class="image">
                        <div class="info">
                            <h3 class="text-lg font-bold">Office Code: {{ $office->officeCode }}</h3>
                            <p class="description"><strong>City:</strong> {{ $office->city }}</p>
                            <p class="description"><strong>Phone:</strong> {{ $office->phone }}</p>
                            <p class="description"><strong>Address Line 1:</strong> {{ $office->addressLine1 }}</p>
                            <p class="description"><strong>Address Line 2:</strong> {{ $office->addressLine2 }}</p>
                            <p class="description"><strong>State:</strong> {{ $office->state }}</p>
                            <p class="description"><strong>Country:</strong> {{ $office->country }}</p>
                            <p class="description"><strong>Postal Code:</strong> {{ $office->postalCode }}</p>
                            <p class="description"><strong>Territory:</strong> {{ $office->territory }}</p>
                            <a href="{{ route('officelist') }}" class="button">Back to Offices List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
