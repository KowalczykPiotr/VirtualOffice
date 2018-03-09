@extends('layouts.app')
@section('title', 'Klienci')
@section('mnu-history', 'active')
@section('content')

    <script src="{{ URL::asset('js/my-scripts/history.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/bootstrap-date-picker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/bootstrap-date-picker/locales/bootstrap-datepicker.pl.js') }}" charset="UTF-8" type="text/javascript"></script>


    <link href="{{ URL::asset('/css/datepicker.css') }}" rel="stylesheet">


    <div class="container mt-5">

        @include('messages')

        <div class="jumbotron p-4 mt-3">
            <h4>@lang('history/history.title')</h4>
        </div>


        <div class="jumbotron p-4 mt-4">
            <form action="{{ url('/history/history/') }}" role="form" method="post">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputName">@lang('history/history.sf_name')</label>
                        <input type="text" name="name" class="form-control" id="inputName" value="{{ $input->name }}" placeholder="@lang('history/history.sf_name')">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputType">@lang('history/history.sf_type')</label>
                        <select id="inputType" name="letter_type_id" class="form-control">
                            <option value="" @empty($input->group) selected @endempty >@lang('history/history.sf_type')</option>
                            @foreach($letter_types as $letter_type)
                                <option value="{{ $letter_type->id }}" @if($input->letter_type_id == $letter_type->id) selected @endif >{{ $letter_type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputPosition">@lang('history/history.sf_position')</label>
                        <select id="inputPosition" name="letter_position_id" class="form-control">
                            <option value="" @empty($input->group) selected @endempty >@lang('history/history.sf_position')</option>
                            @foreach($letter_positions as $letter_position)
                                <option value="{{ $letter_position->id }}" @if($input->letter_position_id == $letter_position->id) selected @endif >{{ $letter_position->position }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3" ng-app="mainModule" ng-controller="historyCtrl">
                        <label for="inputClient">@lang('history/history.sf_customer')</label>
                        <input id="inputClient" name="customer_name" autocomplete="off"  ng-init="inputClient='{!! addslashes($input->customer_name) !!}'" ng-model="inputClient" ng-change="inputChange()" list="inputClientList"  class="form-control" value="{{ $input->customer_name }}"  placeholder="@lang('history/history.sf_customer')">
                        <datalist id="inputClientList">
                            <option ng-repeat="item in customers" value="[[item.name]]">
                        </datalist>
                    </div>


                    <div class="form-group col-md-3">
                        <div class="input-append date"  >
                            <label for="inputDateStart">@lang('history/history.sf_date_start')</label>
                            <div id="date-start" class="input-group mb-3">
                                <input id="inputDateStart" name="date_start" data-date-format="dd-mm-yyyy"  data-date-language="pl" class="form-control" size="16" type="text"  value="{{ $input->date_start }}" placeholder="@lang('history/history.sf_date_start')">
                                <div class="add-on input-group-append">
                                    <button  class="btn btn-outline-secondary" type="button"><i class="far fa-calendar-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <div class="input-append date"  >
                            <label for="inputDateEnd">@lang('history/history.sf_date_end')</label>
                            <div id="date-end" class="input-group mb-3">
                                <input id="inputDateEnd" name="date_end" data-date-format="dd-mm-yyyy"  data-date-language="pl" class="form-control" size="16" type="text" value="{{ $input->date_end }}" placeholder="@lang('history/history.sf_date_end')">
                                <div class="add-on input-group-append">
                                    <button  class="btn btn-outline-secondary" type="button"><i class="far fa-calendar-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <script type="text/javascript">

                        $(document).ready(function() {

                            $( "#date-start" ).click(function() {

                                $('#inputDateStart').datepicker('show');
                            });

                            $( "#date-end" ).click(function() {

                                $('#inputDateEnd').datepicker('show');
                            });

                        });

                    </script>



                </div>
                <div class="row justify-content-end">
                    <div class="col">
                        <button type="submit" class="btn btn-primary float-right ml-2">
                            <i class="fas fa-search"></i>
                            @lang('history/history.btn_search')
                        </button>

                        <a href="{{ url('/history/history/') }}" class="btn btn-outline-primary float-right">
                            <i class="fas fa-users"></i>
                            @lang('history/history.btn_reset')
                        </a>
                    </div>
                </div>



            </form>
        </div>




    <div class="table-responsive">
        <table  class="table tab-history table-sm table-hover">
            <thead>
            <tr>
                <th>@lang('history/history.col_id')</th>
                <th>@lang('history/history.col_name')</th>
                <th>@lang('history/history.col_letter_type')</th>
                <th>@lang('history/history.col_letter_position')</th>
                <th>@lang('history/history.col_date')</th>


                <th><span class="float-right">@lang('history/history.col_action')</span></th>
            </tr>
            </thead>
            <tbody>
            @foreach($letters as $letter)
                <tr>
                    <td>{{$letter->id}}</td>
                    <td>{{$letter->name}}</td>
                    <td>{{$letter->letter_type->name}}</td>
                    <td>{{$letter->letter_position->position}}</td>
                    <td>{{$letter->created_at}}</td>
                    <td>
                <span class="float-right">
                    <a href="{{ url('/history/view/')}}/{{$letter->id}}" type="button" title="@lang('clients/clients.pop_view')" class="btn btn-primary btn-sm btn-action"><i class="fas fa-eye"></i></a>
                </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">

        @if (isset($next))
            <form action="{{ url('/history/history/') }}/{{$next}}" role="form" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="name" value="{{ $input->name }}">
                <input type="hidden" name="letter_type_id" value="{{ $input->letter_type_id }}">
                <input type="hidden" name="letter_position_id" value="{{ $input->letter_position_id }}">
                <input type="hidden" name="customer_name" value="{{ $input->customer_name }}">
                <input type="hidden" name="date_start" value="{{ $input->date_start }}">
                <input type="hidden" name="date_end" value="{{ $input->date_end }}">
                <button type="submit" class="btn btn-primary float-right ml-2"  >
                    <i class="fas fa-forward"></i>
                </button>
            </form>
        @endif
        @if (isset($prev))
            <form action="{{ url('/history/history/') }}/{{$prev}}" role="form" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="name" value="{{ $input->name }}">
                <input type="hidden" name="letter_type_id" value="{{ $input->letter_type_id }}">
                <input type="hidden" name="letter_position_id" value="{{ $input->letter_position_id }}">
                <input type="hidden" name="customer_name" value="{{ $input->customer_name }}">
                <input type="hidden" name="date_start" value="{{ $input->date_start }}">
                <input type="hidden" name="date_end" value="{{ $input->date_end }}">
                <button type="submit" class="btn btn-primary float-right ml-2"  >
                    <i class="fas fa-backward"></i>
                </button>
            </form>
        @endif

    </div>






@endsection