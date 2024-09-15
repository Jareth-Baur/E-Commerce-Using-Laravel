<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers'; // Map the table to the model
    protected $primaryKey = 'customerNumber'; // Set the primary key

    // Specify the fields if you want mass assignment
    protected $fillable = ['customerName', 'contactLastName', 'contactFirstName', 'phone', 'addressLine1', 'addressLine2', 'city', 'state', 'postalCode', 'country', 'salesRepEmployeeNumber', 'creditLimit'];
}
