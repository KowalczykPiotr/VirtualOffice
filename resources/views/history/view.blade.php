@extends('layouts.app')
@section('title', 'Klienci')
@section('mnu-history', 'active')
@section('content')

    <div class="container mt-5">

        @include('messages')

        <div class="jumbotron p-4 mt-3">
            <h4>@lang('history/view.title')
                <a href="{{ url('/history/view/add/') }}/{{$letters->id}}" type="button" title="@lang('history/view.pop_add')" class="float-right btn btn-primary">
                    <i class="fas fa-plus-square"></i>
                </a>

            </h4>
        </div>



        <div class="p-3">
            <form>

                <div class="form-group row">
                    <label for="input-name" class="col-lg-6 control-label text-right">@lang('history/view.lab_status')</label>
                    <div class="col-lg-6">
                        <input id="input-name" readonly type="text" class="form-control form-control-sm" value="{{ $letters->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-email" class="col-lg-6 control-label text-right">@lang('history/view.lab_type')</label>
                    <div class="col-lg-6">
                        <input id="input-email" readonly type="text" class="form-control form-control-sm" value="{{$letters->letter_type->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-phone" class="col-lg-6 control-label text-right">@lang('history/view.lab_receiver')</label>
                    <div class="col-lg-6">
                        <input id="input-phone" readonly type="text" class="form-control form-control-sm" value="{{$letters->customer->name}}">
                    </div>
                </div>


                <div class="form-group row justify-content-end">
                    <div class="col">
                        <a href="{{ url('/history/history/') }}" class="btn btn-primary float-right p-2">
                            <i class="fas fa-times"></i>
                            @lang('clients/clients-view.btn_cancel')
                        </a>
                    </div>
                </div>

            </form>
        </div>




        <div class="table-responsive">
            <table  class="table tab-history-view table-sm table-hover">
                <thead>
                <tr>
                    <th>@lang('history/view.col_status')</th>
                    <th>@lang('history/view.col_operator')</th>
                    <th>@lang('history/view.col_date')</th>
                    <th><span class="float-right">@lang('history/view.col_action')</span></th>

                </tr>
                </thead>
                <tbody>
                @foreach($letter_transitions as $transition)
                    <tr>
                        <td>{{$transition->letter_position->position}}</td>
                        <td>{{$transition->user->name}}</td>
                        <td>{{$transition->created_at}}</td>
                        <td>
                            @if( !$transition->file == '' )
                            <span class="float-right">
                                <a href="{{ url('/')}}/pdf/{{$transition->file}}.pdf" target="_blank" type="button" title="@lang('clients/clients.pop_view')" class="btn btn-primary btn-sm btn-action"><i class="far fa-file-pdf"></i></a>
                            </span>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>


@endsection
