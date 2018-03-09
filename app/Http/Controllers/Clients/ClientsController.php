<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Customer;
use App\Customer_group;
use Validator;


class ClientsController extends Controller
{

    public function __construct()
    {

        $this->middleware('permissions:clients')->except('index', 'view');
        $this->middleware('permissions:operator');
    }


    function index($page = 0, Request $request)
    {

        $customer_groups = Customer_group::orderBy('sort_order', 'asc')->get();

        $take = 10;

        $obj = Customer::where('name', 'LIKE', '%' . $request->name . '%')
            ->where('email', 'LIKE', '%' . $request->email . '%')
            ->where('phone', 'LIKE', '%' . $request->phone . '%');

        if ($request->group) {

            $obj = $obj->where('customer_group_id', $request->group);
        }

        $count = $obj->count();
        $customers = $obj->take($take)->skip($page * $take)->get();

        if ($page) {
            $prev = $page - 1;
        }
        if ((($page + 1) * $take) <= $count) {
            $next = $page + 1;
        }

        $input = $request;
        return view('clients/clients', compact('customers', 'customer_groups', 'input', 'prev', 'next'));
    }

    function add() {

        $customer_groups = Customer_group::all();

        return view('clients/clients-add', compact('customer_groups'));

    }

    function save(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'           =>  'required|between:3,80',
            'email'          =>  'required|between:3,80',
            'phone'          =>  'required|between:3,16',
            'group'          =>  'required',
        ]);

        if ($validator->fails()) {

            Session::flash('alert-danger', __('clients/clients-add.msg_validate'));
            return redirect('./clients/clients/add')
                ->withErrors($validator)
                ->withInput();
        }


        try {

            $customer = new Customer;

            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->customer_group_id = $request->group;
            $customer->user_id =  Auth::id();
            $customer->save();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('clients/clients-add.msg_error'));
            return redirect('./clients/clients');
        }

        Session::flash('alert-success', __('clients/clients-add.msg_ok'));
        return redirect('./clients/clients');

    }

    function view($id) {

        $customer = Customer::findOrFail($id);
        $customer->group_name = $customer->customer_group->group_name;
        return view('clients/clients-view', compact('customer'));

    }

    function edit($id) {

        $customer = Customer::findOrFail($id);
        $customer_groups = Customer_group::all();

        return view('clients/clients-edit', compact('customer', 'customer_groups'));

    }

    function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'id'             =>  'required',
            'name'           =>  'required|between:3,80',
            'email'          =>  'required|between:3,80',
            'phone'          =>  'required|between:3,16',
            'group'          =>  'required',
        ]);

        if ($validator->fails()) {

            Session::flash('alert-danger', __('clients/clients-edit.msg_validate'));
            return redirect('./clients/clients/edit/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $customer = Customer::find($request->id);

            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->customer_group_id = $request->group;

            $customer->save();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('clients/clients-edit.msg_error'));
            return redirect('./clients/clients');
        }

        Session::flash('alert-success', __('clients/clients-edit.msg_ok'));
        return redirect('./clients/clients');
    }

    function delete($id) {

        try {
            Customer::where('id', $id)->delete();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('clients/clients-del.msg_error'));
            return redirect('./clients/clients');
        }

        Session::flash('alert-success', __('clients/clients-del.msg_ok'));
        return redirect('./clients/clients');

    }
}
