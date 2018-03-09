@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')

<script> var root = './'; </script>
<script> var _token = "{{ csrf_token() }}" </script>


<div class="container mt-5">

    @include('messages')


    <div class="jumbotron p-4 mt-3">
        <h4>@lang('admin/client-groups-edit.title')</h4>
    </div>

    <div class="p-3">
        <form action="{{ url('/admin/customer-groups/update/') }}" role="form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$customer_group->id}}">
            <div class="form-group row">
                <label for="input-group_name" class="col-lg-6 control-label text-right">@lang('admin/client-groups-edit.lab_name')</label>
                <div class="col-lg-6">
                    <input id="input-group_name" name="group_name" required type="text" class="form-control form-control-sm {{ $errors->has('group_name') ? ' is-invalid' : '' }}" placeholder="@lang('admin/client-groups-edit.inp_name')" value="{{$customer_group->group_name}}">
                    @if ($errors->has('group_name'))
                        <div class="invalid-feedback"> {{ $errors->first('group_name') }} </div>
                    @endif

                </div>
            </div>
            <div class="form-group row">
                <label for="input-sort_order" class="col-lg-6 control-label text-right">@lang('admin/client-groups-edit.lab_sort')</label>
                <div class="col-lg-6">
                    <input id="input-sort_order" name="sort_order" required type="text" class="form-control form-control-sm {{ $errors->has('sort_order') ? ' is-invalid' : '' }}" placeholder="@lang('admin/client-groups-edit.inp_sort')" value="{{ $customer_group->sort_order }}">
                    @if ($errors->has('sort_order'))
                        <div class="invalid-feedback"> {{ $errors->first('sort_order') }} </div>
                    @endif

                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col">
                    <button id="addLetterBtn" type="submit" class="btn btn-primary float-right p-2 ml-2">
                        <i class="fas fa-database"></i>
                        @lang('admin/client-groups-edit.btn_save')
                    </button>
                    <a href="{{ url('/admin/customer-groups/') }}" class="btn btn-primary float-right p-2 ml-2">
                        <i class="fas fa-times"></i>
                        @lang('admin/client-groups-edit.btn_cancel')
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection