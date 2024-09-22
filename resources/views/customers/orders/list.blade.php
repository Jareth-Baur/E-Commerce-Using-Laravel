<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Orders for Customer #{{ $customerNumber }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-striped" id="ordersTable">
                        <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Orders will be dynamically loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            var customerNumber = "{{ $customerNumber }}"; // Get customer number from the blade variable--}}

{{--            $.ajax({--}}
{{--                url: '/customer/' + customerNumber + '/orders',--}}
{{--                method: 'GET',--}}
{{--                dataType: 'json',--}}
{{--                success: function(orders) {--}}
{{--                    var tbody = $('#ordersTable tbody');--}}
{{--                    tbody.empty(); // Clear existing rows--}}

{{--                    orders.forEach(function(order) {--}}
{{--                        var row = '<tr>' +--}}
{{--                            '<td>' + order.orderNumber + '</td>' +--}}
{{--                            '<td>' + new Date(order.orderDate).toLocaleDateString() + '</td>' +--}}
{{--                            '<td>' + order.status + '</td>' +--}}
{{--                            '<td>' + order.comments + '</td>' +--}}
{{--                            '<td><a href="/order/' + order.orderNumber + '" class="btn btn-info">View</a></td>' +--}}
{{--                            '</tr>';--}}
{{--                        tbody.append(row);--}}
{{--                    });--}}
{{--                },--}}
{{--                error: function(xhr) {--}}
{{--                    console.error('Error fetching orders:', xhr);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
</x-app-layout>
