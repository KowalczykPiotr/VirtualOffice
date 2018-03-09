@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')


<script> var root = './'; </script>
<script> var _token = "{{ csrf_token() }}" </script>


<div class="container mt-5">

    @include('messages')

    <div class="jumbotron p-4 mt-3">
        <h4>@lang('admin/letter-types.title')
            <a href="{{ url('/admin/letter-types/add/') }}" type="button" title="@lang('admin/letter-types.pop_add')" class="float-right btn btn-primary">
                <i class="fas fa-plus-square"></i>
            </a>
        </h4>
    </div>

    <div class="table-responsive">
        <table  class="table tab-letter-types table-sm table-hover">
            <thead>
            <tr>
                <th>@lang('admin/letter-types.col_id')</th>
                <th>@lang('admin/letter-types.col_name')</th>
                <th class="text-center">@lang('admin/letter-types.col_sort')</th>
                <th><span class="float-right">@lang('admin/letter-types.col_action')</span></th>
            </tr>
            </thead>
            <tbody>
            @foreach($letter_types as $type)
                <tr>
                    <td>{{$type->id}}</td>
                    <td>{{$type->name}}</td>
                    <td class="text-center">{{$type->sort_order}}</td>
                    <td>
                    <span class="float-right">
                        <a href="{{ url('/admin/letter-types/edit/')}}/{{$type->id}}" type="button" title="@lang('admin/letter-types.pop_edit')" class="btn btn-primary btn-sm btn-action"><i class="fas fa-edit"></i></a>
                        <a href="#"
                           onclick="if (confirm('@lang('admin/letter-types.confirm_del')')) {window.location.href =  '{{ url('/admin/letter-types/delete/')}}/{{$type->id}}' }"
                           type="button" title="@lang('admin/letter-types.pop_del')"  class="btn btn-primary btn-sm btn-action"><i class="fas fa-trash-alt"></i></a>
                    </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection