@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')

    <script> var root = './'; </script>
    <script> var _token = "{{ csrf_token() }}" </script>


    <div class="container mt-5">

        @include('messages')


        <div class="jumbotron p-4 mt-3">
            <h4>@lang('admin/users-register.title')</h4>
        </div>

        <div class="p-3">
            <form action="{{ url('/admin/users/save/') }}" role="form" method="post">
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="name" class="col-lg-6 control-label text-right">@lang('admin/users-register.lab_name')</label>
                    <div class="col-lg-6">
                        <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-lg-6 control-label text-right">@lang('admin/users-register.lab_email')</label>
                    <div class="col-lg-6">
                        <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-lg-6 control-label text-right">@lang('admin/users-register.lab_password')</label>
                    <div class="col-lg-6">
                        <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-lg-6 control-label text-right">@lang('admin/users-register.lab_confirm')</label>
                    <div class="col-lg-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="permissions" class="col-lg-6 control-label text-right">@lang('admin/users-register.lab_permissions')</label>
                    <div class="col-lg-6">
                        <select id="permissions" name="permissions" class="form-control">
                            <option value="{{ Config::get('constants.PERMISSIONS_SUSPENDED_V') }}">@lang('admin/users-register.per_suspended')</option>
                            <option value="{{ Config::get('constants.PERMISSIONS_OPERATOR_V') }}" selected>@lang('admin/users-register.per_operator')</option>
                            <option value="{{ Config::get('constants.PERMISSIONS_CLIENTS_V') }}" selected>@lang('admin/users-register.per_clients')</option>
                            <option value="{{ Config::get('constants.PERMISSIONS_ADMINISTRATOR_V') }}">@lang('admin/users-register.per_administrator')</option>
                            <option value="{{ Config::get('constants.PERMISSIONS_SUPERUSER_V') }}">@lang('admin/users-register.per_superuser')</option>
                        </select>
                    </div>
                </div>


                <div class="form-group row justify-content-end">
                    <div class="col">
                        <button id="addLetterBtn" type="submit" class="btn btn-primary float-right p-2 ml-2">
                            <i class="fas fa-database"></i>
                            &nbsp;@lang('admin/users-register.btn_add')
                        </button>
                        <a href="{{ url('/admin/users/') }}" class="btn btn-primary float-right p-2 ml-2">
                            <i class="fas fa-times"></i>
                            @lang('admin/users-register.btn_cancel')
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection