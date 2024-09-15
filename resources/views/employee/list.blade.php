<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-striped" id="datatables">
                        <thead>
                            <tr>
                                <th>Emp Number</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Job Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $emp)
                                <tr>
                                    <td>{{$emp->employeeNumber}}</td>
                                    <td>{{$emp->firstName}} {{$emp->lastName}}</td>
                                    <td>{{$emp->email}}</td>
                                    <td>{{$emp->jobTitle}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
