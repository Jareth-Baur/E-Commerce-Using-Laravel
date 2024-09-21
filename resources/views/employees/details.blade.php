<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Details of {{ $employee->firstName }} {{ $employee->lastName }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 detail-holder">
                    <div class="card">
                        <img src="{{ asset('assets/img/employees/employee1.jpg') }}" alt="Employee Image" class="image">
                        <div class="info">
                            <h2 class="title">{{ $employee->firstName }} {{ $employee->lastName }}</h2>
                            <p class="description"><strong>Job Title:</strong> {{ $employee->jobTitle }}</p>
                            <p class="description"><strong>Email:</strong> {{ $employee->email }}</p>
                            <p class="description"><strong>Employee Number:</strong> {{ $employee->employeeNumber }}</p>
                            <p class="description"><strong>Office Code:</strong> {{ $employee->officeCode }}</p>
                            <p class="description"><strong>Reports To:</strong> {{ $employee->reportsTo ?? 'N/A' }}</p>
                            <p class="description"><strong>Extension:</strong> {{ $employee->extension ?? 'N/A' }}</p>
                            <a href="{{ route('emplist') }}" class="button">Back to Employee List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
