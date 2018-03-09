@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')

    <script> var root = './'; </script>
    <script> var _token = "{{ csrf_token() }}" </script>


    <div class="container mt-5">

        @include('messages')


        <div class="jumbotron p-4 mt-3">
            <h4>@lang('admin/users-edit.title')</h4>
        </div>

        <div class="p-3">
            <form action="{{ url('/admin/users/update/') }}" role="form" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-group row">
                    <label for="name" class="col-lg-6 control-label text-right">@lang('admin/users-edit.lab_name')</label>
                    <div class="col-lg-6">
                        <input id="name" type="text" readonly class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-lg-6 control-label text-right">@lang('admin/users-edit.lab_email')</label>
                    <div class="col-lg-6">
                        <input id="email" type="text" readonly class="form-control" name="email" value="{{ $user->email }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="permissions" class="col-lg-6 control-label text-right">@lang('admin/users-edit.lab_permissions')</label>
                    <div class="col-lg-6">
                        <select id="permissions" name="permissions" class="form-control" @if( Auth::id() == $user->id ) disabled @endif>
                            <option value="{{ Config::get('constants.PERMISSIONS_SUSPENDED_V') }}" @if($user->permissions == Config::get('constants.PERMISSIONS_SUSPENDED_V')) selected @endif>@lang('admin/users-edit.per_suspended')</option>
                            <option value="{{ Config::get('constants.PERMISSIONS_OPERATOR_V') }}" @if($user->permissions == Config::get('constants.PERMISSIONS_OPERATOR_V')) selected @endif>@lang('admin/users-edit.per_operator')</option>
                            <option value="{{ Config::get('constants.PERMISSIONS_CLIENTS_V') }}" @if($user->permissions == Config::get('constants.PERMISSIONS_CLIENTS_V')) selected @endif>@lang('admin/users-edit.per_clients')</option>
                            <option value="{{ Config::get('constants.PERMISSIONS_ADMINISTRATOR_V') }}" @if($user->permissions == Config::get('constants.PERMISSIONS_ADMINISTRATOR_V')) selected @endif>@lang('admin/users-edit.per_administrator')</option>
                            <option value="{{ Config::get('constants.PERMISSIONS_SUPERUSER_V') }}" @if($user->permissions > Config::get('constants.PERMISSIONS_SUPERUSER_V')) selected @endif>@lang('admin/users-edit.per_superuser')</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col">
                        <button @if( Auth::id() == $user->id ) disabled @endif
                        id="addLetterBtn" type="submit" class="btn btn-primary float-right p-2 ml-2">
                            <i class="fas fa-database"></i>
                            &nbsp;@lang('admin/users-edit.btn_save')
                        </button>
                        <a href="{{ url('/admin/users/') }}" class="btn btn-primary float-right p-2 ml-2">
                            <i class="fas fa-times"></i>
                            @lang('admin/users-edit.btn_cancel')
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection