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
new DataTable('#datatables');
