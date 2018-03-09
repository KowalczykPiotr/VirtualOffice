<?php

namespace App\Http\Controllers\History;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Letter_transition;
use App\Letter_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Letter;
use App\Letter_position;
use Illuminate\Support\Facades\Session;
use Validator;


class HistoryController extends Controller
{

    public function __construct()
    {

        $this->middleware('permissions:clients')->except('index', 'view');
        $this->middleware('permissions:operator');
    }

    function index($page = 0, Request $request)
    {


        $letter_types = Letter_type::orderBy('sort_order', 'asc')->get();
        $letter_positions = Letter_position::orderBy('id', 'asc')->get();


        $take = 10;

        $obj = Letter::where('name', 'LIKE', '%' . $request->name . '%');

        if ($request->letter_type_id) {

            $obj = $obj->where('letter_type_id', $request->letter_type_id);
        }

        if ($request->customer_name) {

            $customers = Customer::where('name', $request->customer_name)->first();
            if ($customers) {

                $obj = $obj->where('customer_id', $customers->id);
            } else {

                $obj = $obj->where('id', 9999999999999999999);
            }
        }

        if ($request->date_start) {

            $date = strtotime($request->date_start);
            $new_date = date('Y-m-d 00:00:00', $date);
            $obj = $obj->where('created_at', '>=', $new_date);
        }

        if ($request->date_end) {

            $date = strtotime($request->date_end);
            $new_date = date('Y-m-d 23:59:59', $date);
            $obj = $obj->where('created_at', '<=', $new_date);
        }

        if ($request->letter_position_id) {

            $obj = $obj->where('letter_position_id', $request->letter_position_id);
        }


        $count = $obj->count();
        $letters = $obj->take($take)->skip($page * $take)->get();

        $letters->load('letter_type');
        $letters->load('letter_position');


        if ($page) {
            $prev = $page - 1;
        }
        if ((($page + 1) * $take) <= $count) {
            $next = $page + 1;
        }

        $input = $request;
        return view('history/history', compact('letters', 'letter_types', 'letter_positions', 'input', 'prev', 'next'));
    }

    function view($id)
    {

        $letters = Letter::findOrFail($id);
        $letters->load('letter_type');
        $letters->load('customer');

        $letter_transitions = Letter_transition::where('letter_id', $id)->get();
        $letter_transitions->load('user');
        $letter_transitions->load('letter_position');

        return view('history/view', compact('letters', 'letter_transitions'));

    }

    function add($id)
    {

        $letter_positions = Letter_position::all();
        return view('history/add', compact('id', 'letter_positions'));
    }

    function save(Request $request)
    {

        try {

            $letter_transition = new Letter_transition;
            $letter_transition->letter_id = $request->letter;
            $letter_transition->letter_position_id = $request->history;
            $letter_transition->user_id = Auth::id();
            $letter_transition->save();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('history/add.msg_error'));
            return redirect('./history/history');
        }

        Session::flash('alert-success', __('history/add.msg_ok'));
        return redirect('./history/history');

    }
}
