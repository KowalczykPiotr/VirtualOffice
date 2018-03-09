<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{
    function index($skip = 0, $limit = 999999, Request $request)
    {

        $search = $request->query('search');

        $customers = Customer::take($limit)
            ->where('name', 'LIKE', '%' . $search . '%')
            ->skip($skip)
            ->orderBy('name', 'asc')
            ->get();

        $result = [];
        foreach ($customers as $customer) {

            $customer->group_name = $customer->customer_group->group_name;
            $result[] = $customer->attributesToArray();
        }

        return $result;
    }

    function show($id)
    {

        $customer = Customer::find($id);
        $customer->group_name = $customer->customer_group->group_name;
        return $customer->attributesToArray();
    }
}
