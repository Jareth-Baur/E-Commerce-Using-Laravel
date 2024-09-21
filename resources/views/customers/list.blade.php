<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-striped" id="customerdatatable">
                        <thead>
                        <tr>
                            <th>Customer Number</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Data will be loaded via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
