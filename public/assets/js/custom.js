$(document).ready(function () {
    var baseUrl = window.location.origin;
    $('#employeedatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/employees", // AJAX URL to fetch the data
        columns: [
            {data: 'employeeNumber', name: 'employeeNumber'},
            {data: 'name', name: 'name'}, // Concatenate first and last name in the controller
            {data: 'email', name: 'email'},
            {data: 'jobTitle', name: 'jobTitle'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
$(document).ready(function () {
    var baseUrl = window.location.origin;
    $('#productdatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/products", // AJAX URL to fetch the data
        columns: [
            {data: 'productCode', name: 'productCode'},
            {data: 'productName', name: 'productName'},
            {data: 'productLine', name: 'productLine'},
            {data: 'productVendor', name: 'productVendor'},   // Added productVendor
            {data: 'quantityInStock', name: 'quantityInStock'},
            {data: 'buyPrice', name: 'buyPrice'},             // Updated to buyPrice
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
$(document).ready(function () {
    var baseUrl = window.location.origin;
    $('#orderdatatable').DataTable({

        processing: true,
        serverSide: true,
        ajax: baseUrl + "/orders", // The route for server-side p
        columns: [
            {data: 'orderNumber', name: 'orderNumber'},
            {data: 'customerName', name: 'customerName'},
            {data: 'productName', name: 'productName'},
            {data: 'quantityOrdered', name: 'quantityOrdered'},
            {data: 'priceEach', name: 'priceEach'},
            {data: 'orderDate', name: 'orderDate'},
        ]
    });
});
$(document).ready(function () {
    var baseUrl = window.location.origin;
    $('#customerdatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/customers", // The route for server-side processing
        columns: [
            {data: 'customerNumber', name: 'customerNumber'}, // Matches 'customerNumber' from the server response
            {data: 'customerName', name: 'customerName'},     // Matches 'customerName' from the server response
            {data: 'contactLastName', name: 'contactLastName'}, // Matches 'contactLastName'
            {data: 'phone', name: 'phone'},                   // Matches 'phone'
            {data: 'city', name: 'city'},                     // Matches 'city'
            {data: 'country', name: 'country'},               // Matches 'country'
            {data: 'action', name: 'action', orderable: false, searchable: false}  // Matches 'action'
        ]
    });
});
$(document).ready(function () {
    var baseUrl = window.location.origin;
    $('#officedatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/offices", // AJAX URL to fetch the data
        columns: [
            {data: 'officeCode', name: 'officeCode'},   // Office Code
            {data: 'city', name: 'city'},                 // City
            {data: 'phone', name: 'phone'},               // Phone
            {data: 'fullAddress', name: 'fullAddress'},   // Combined Address
            {data: 'postalCode', name: 'postalCode'},     // Postal Code
            {data: 'territory', name: 'territory'},       // Territory
            {data: 'action', name: 'action', orderable: false, searchable: false} // Action
        ]
    });
});
$(document).ready(function () {
    var customerNumber = "{{ $customerNumber }}"; // Get customer number from Blade variable
    var baseUrl = window.location.origin;

    $('#customersOrdersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: baseUrl + "/customer/" + customerNumber + "/orders", // AJAX URL to fetch orders
            type: 'GET',
            dataType: 'json'
        },
        columns: [
            {data: 'orderNumber', name: 'orderNumber'}, // Order Number
            {data: 'orderDate', name: 'orderDate'},     // Order Date
            {data: 'status', name: 'status'},           // Status
            {data: 'comments', name: 'comments'},       // Comments
            {data: 'action', name: 'action', orderable: false, searchable: false} // Action
        ],
        // columnDefs: [
        //     {
        //         targets: 4, // Adjust index based on your action column position
        //         render: function(data, type, row) {
        //             return '<a href="/order/' + row.orderNumber + '" class="btn btn-info">View</a>';
        //         }
        //     }
        // ]
    });
});

new DataTable('#datatables');
