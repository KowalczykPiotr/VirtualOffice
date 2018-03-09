@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')


    <script> var root = './'; </script>
    <script> var _token = "{{ csrf_token() }}" </script>


    <div class="container mt-5">

        @include('messages')

        <div class="jumbotron p-4 mt-3">
            <h4>@lang('admin/users.title')
                <a href="{{ url('/admin/users/register/') }}" type="button" title="@lang('admin/users.pop_add')" class="float-right btn btn-primary">
                    <i class="fas fa-plus-square"></i>
                </a>
            </h4>
        </div>

        <div class="table-responsive">
            <table  class="table tab-users table-sm table-hover">
                <thead>
                <tr>
                    <th>@lang('admin/users.col_id')</th>
                    <th>@lang('admin/users.col_name')</th>
                    <th>@lang('admin/users.col_email')</th>
                    <th><span class="float-right">@lang('admin/users.col_action')</span></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                    <span class="float-right">
                        <a href="{{ url('/admin/users/edit/')}}/{{$user->id}}" type="button" title="@lang('admin/users.pop_edit')" class="btn btn-primary btn-sm btn-action"><i class="fas fa-edit"></i></a>
                        <a href="#"
                           onclick="if (confirm('@lang('admin/users.confirm_del')')) {window.location.href =  '{{ url('/admin/users/delete/')}}/{{$user->id}}' }"
                           type="button" title="@lang('admin/users.pop_del')"  class="btn btn-primary btn-sm btn-action"><i class="fas fa-trash-alt"></i></a>
                    </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection