@extends('layouts.app')
@section('title', 'Klienci')
@section('mnu-clients', 'active')
@section('content')


<script> var root = './'; </script>
<script> var _token = "{{ csrf_token() }}" </script>


<div class="container mt-5">

    @include('messages')

    <div class="jumbotron p-4 mt-3">
        <h4>@lang('clients/clients.title')
            <a href="{{ url('/clients/clients/add/') }}" type="button" title="@lang('clients/clients.pop_add')" class="float-right btn btn-primary">
                <i class="fas fa-plus-square"></i>
            </a>
        </h4>
    </div>

    <div class="jumbotron p-4 mt-4">
        <form action="{{ url('/clients/clients/') }}" role="form" method="post">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputName">@lang('clients/clients.sf_name')</label>
                    <input type="text" name="name" class="form-control" id="inputName" value="{{ $input->name }}" placeholder="@lang('clients/clients.sf_name')">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail">@lang('clients/clients.sf_email')</label>
                    <input type="test" name="email" class="form-control" id="inputEmail" value="{{ $input->email }}" placeholder="@lang('clients/clients.sf_email')">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPhone">@lang('clients/clients.sf_phone')</label>
                    <input type="test" name="phone" class="form-control" id="inputPhone" value="{{ $input->phone }}" placeholder="@lang('clients/clients.sf_phone')">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputGroup">@lang('clients/clients.sf_group')</label>
                    <select id="inputGroup" name="group" class="form-control">
                        <option value="" @empty($input->group) selected @endempty >@lang('clients/clients.sf_select')</option>
                        @foreach($customer_groups as $customer_group)
                            <option value="{{ $customer_group->id }}" @if($input->group == $customer_group->id) selected @endif >{{ $customer_group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col">
                    <button type="submit" class="btn btn-primary float-right ml-2">
                        <i class="fas fa-search"></i>
                        @lang('clients/clients.btn_search')
                    </button>

                <a href="{{ url('/clients/clients/') }}" class="btn btn-outline-primary float-right">
                    <i class="fas fa-users"></i>
                    @lang('clients/clients.btn_reset')
                </a>
            </div>
            </div>

        </form>
    </div>



    <div class="table-responsive">
        <table  class="table tab-clients table-sm table-hover">
            <thead>
            <tr>
                <th>@lang('clients/clients.col_id')</th>
                <th>@lang('clients/clients.col_name')</th>
                <th>@lang('clients/clients.col_email')</th>
                <th>@lang('clients/clients.col_phone')</th>
                <th><span class="float-right">@lang('clients/clients.col_action')</span></th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>
                <span class="float-right">
                    <a href="{{ url('/clients/clients/view/')}}/{{$customer->id}}" type="button" title="@lang('clients/clients.pop_view')" class="btn btn-primary btn-sm btn-action"><i class="fas fa-eye"></i></a>
                    @if(Auth::user()->permissions & Config::get('constants.PERMISSIONS_ADMINISTRATOR') )



                    <a href="{{ url('/clients/clients/edit/')}}/{{$customer->id}}" type="button" title="@lang('clients/clients.pop_edit')" class="btn btn-primary btn-sm btn-action"><i class="fas fa-edit"></i></a>
                    <a href="#"
                       onclick="if (confirm('@lang('clients/clients.confirm_del')')) {window.location.href =  '{{ url('/clients/clients/delete/')}}/{{$customer->id}}' }"
                       type="button" title="@lang('clients/clients.pop_del')"  class="btn btn-primary btn-sm btn-action"><i class="fas fa-trash-alt"></i></a>
                    @endif
                </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">

        @if (isset($next))
            <form action="{{ url('/clients/clients/') }}/{{$next}}" role="form" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="name" value="{{ $input->name }}">
                <input type="hidden" name="rmail" value="{{ $input->email }}">
                <input type="hidden" name="phone" value="{{ $input->phone }}">
                <input type="hidden" name="group" value="{{ $input->group }}">
                <button type="submit" class="btn btn-primary float-right ml-2"  >
                    <i class="fas fa-forward"></i>
                </button>
            </form>
        @endif
        @if (isset($prev))
            <form action="{{ url('/clients/clients/') }}/{{$prev}}" role="form" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="name" value="{{ $input->name }}">
                <input type="hidden" name="email" value="{{ $input->email }}">
                <input type="hidden" name="phone" value="{{ $input->phone }}">
                <input type="hidden" name="group" value="{{ $input->group }}">
                <button type="submit" class="btn btn-primary float-right ml-2"  >
                    <i class="fas fa-backward"></i>
                </button>
            </form>
        @endif

    </div>


@endsection