@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')

<script> var root = './'; </script>
<script> var _token = "{{ csrf_token() }}" </script>


<div class="container mt-5">

    @include('messages')


    <div class="jumbotron p-4 mt-3">
        <h4>@lang('admin/letter-types-edit.title')</h4>
    </div>

    <div class="p-3">
        <form action="{{ url('/admin/letter-types/update/') }}" role="form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$letter_type->id}}">
            <div class="form-group row">
                <label for="input-name" class="col-lg-6 control-label text-right">@lang('admin/letter-types-edit.lab_name')</label>
                <div class="col-lg-6">
                    <input id="input-name" name="name" required type="text" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="@lang('admin/letter-types-edit.inp_name')" value="{{$letter_type->name}}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
                    @endif

                </div>
            </div>
            <div class="form-group row">
                <label for="input-sort_order" class="col-lg-6 control-label text-right">@lang('admin/letter-types-edit.lab_sort')</label>
                <div class="col-lg-6">
                    <input id="input-sort_order" name="sort_order" required type="text" class="form-control form-control-sm {{ $errors->has('sort_order') ? ' is-invalid' : '' }}" placeholder="@lang('admin/letter-types-edit.inp_sort')" value="{{ $letter_type->sort_order }}">
                    @if ($errors->has('sort_order'))
                        <div class="invalid-feedback"> {{ $errors->first('sort_order') }} </div>
                    @endif

                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col">
                    <button id="addLetterBtn" type="submit" class="btn btn-primary float-right p-2 ml-2">
                        <i class="fas fa-database"></i>
                        @lang('admin/letter-types-edit.btn_save')
                    </button>
                    <a href="{{ url('/admin/letter-types/') }}" class="btn btn-primary float-right p-2 ml-2">
                        <i class="fas fa-times"></i>
                        @lang('admin/letter-types-edit.btn_cancel')
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection