@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')

<script> var root = './'; </script>
<script> var _token = "{{ csrf_token() }}" </script>


<div class="container mt-5">

    @include('messages')


    <div class="jumbotron p-4 mt-3">
        <h4>@lang('clients/clients-view.title')</h4>
    </div>

    <div class="p-3">
        <form>

            <div class="form-group row">
                <label for="input-name" class="col-lg-6 control-label text-right">@lang('clients/clients-view.lab_name')</label>
                <div class="col-lg-6">
                    <input id="input-name" readonly type="text" class="form-control form-control-sm" value="{{ $customer->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="input-email" class="col-lg-6 control-label text-right">@lang('clients/clients-view.lab_email')</label>
                <div class="col-lg-6">
                    <input id="input-email" readonly type="text" class="form-control form-control-sm" value="{{ $customer->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="input-phone" class="col-lg-6 control-label text-right">@lang('clients/clients-view.lab_phone')</label>
                <div class="col-lg-6">
                    <input id="input-phone" readonly type="text" class="form-control form-control-sm" value="{{ $customer->phone }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="input-group" class="col-lg-6 control-label text-right">@lang('clients/clients-view.lab_group')</label>
                <div class="col-lg-6">
                    <input id="input-group" readonly type="text" class="form-control form-control-sm" value="{{ $customer->group_name }}">
                </div>
            </div>


            <div class="form-group row justify-content-end">
                <div class="col">
                    <a href="{{ url('/clients/clients/') }}" class="btn btn-primary float-right p-2">
                        <i class="fas fa-times"></i>
                        @lang('clients/clients-view.btn_cancel')
                    </a>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection