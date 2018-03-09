<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Customer_group;
use Validator;

class ClientGroupsController extends Controller
{

    public function __construct()
    {

        $this->middleware('permissions:administrator');
    }

    function index()
    {

        $customer_groups = Customer_group::all();
        return view('admin/client-groups', compact('customer_groups'));
    }

    function add()
    {

        return view('admin/client-groups-add');
    }

    function delete($id)
    {

        try {
            Customer_group::where('id', $id)->delete();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin/client-groups-del.msg_error'));
            return redirect('./admin/customer-groups');
        }

        Session::flash('alert-success', __('admin/client-groups-del.msg_ok'));
        return redirect('./admin/customer-groups');

    }

    function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'group_name' => 'required|between:3,16',
            'sort_order' => 'required|digits_between:0,255',
        ]);

        if ($validator->fails()) {

            Session::flash('alert-danger', __('admin/client-groups-add.msg_validate'));
            return redirect('./admin/customer-groups/add')
                ->withErrors($validator)
                ->withInput();
        }


        try {

            $customer_group = new Customer_group;

            $customer_group->group_name = $request->group_name;
            $customer_group->sort_order = $request->sort_order;
            $customer_group->save();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin/client-groups-add.msg_error'));
            return redirect('./admin/customer-groups');
        }

        Session::flash('alert-success', __('admin/client-groups-add.msg_ok'));
        return redirect('./admin/customer-groups');
    }

    function edit($id)
    {

        $customer_group = Customer_group::findOrFail($id);
        return view('admin/client-groups-edit', compact('customer_group'));
    }

    function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'group_name' => 'required|between:3,16',
            'sort_order' => 'required|digits_between:0,255',
        ]);

        if ($validator->fails()) {

            Session::flash('alert-danger', __('admin/client-groups-edit.msg_validate'));
            return redirect('./admin/customer-groups/edit/' . $request->id)
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $customer_group = Customer_group::find($request->id);

            $customer_group->group_name = $request->group_name;
            $customer_group->sort_order = $request->sort_order;
            $customer_group->save();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin/client-groups-edit.msg_error'));
            return redirect('./admin/customer-groups');
        }

        Session::flash('alert-success', __('admin/client-groups-edit.msg_ok'));
        return redirect('./admin/customer-groups');
    }
}
