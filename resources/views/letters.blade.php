@extends('layouts.app')
@section('title', 'Klienci')
@section('mnu-letters', 'active')
@section('content')

<script src="{{ URL::asset('js/my-scripts/clients-list.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/tableHeadFixer.js') }}" type="text/javascript"></script>

<script> var root = './'; </script>
<script> var _token = "{{ csrf_token() }}" </script>


<div class="container mt-5" ng-app="mainModule" ng-controller="clientsCtrl">


    <div class="row">
        <div class="col-md-4">
            <div class="input-group">
                <input ng-change="listFirst()" name="myBrowser" ng-model="dupa" class="form-control py-2 border-right-0 border" type="search" value="search" id="example-search-input">
                <span class="input-group-append">
                    <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
                </span>
            </div>
        </div>
    </div>


    <div class="jumbotron p-4 mt-3">
        <h4>@lang('letters.title')</h4>
    </div>

    <!-- --------------------------------------------------------->

    <script>
        $(document).ready(function() {
            $("#fixTable>table").tableHeadFixer();
        });
    </script>

    <div id="fixTable">
        <table  class="table table-sm table-hover">
            <thead>
            <tr>
                <th>@lang('letters.col_id')</th>
                <th>@lang('letters.col_name')</th>
                <th>@lang('letters.col_email')</th>
                <th>@lang('letters.col_phone')</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-click="selectClient(item.id)" ng-dblclick="selectClient2(item.id)" ng-repeat="item in customers">
                <td>[[item.id]]</td>
                <td>[[item.name]]</td>
                <td>[[item.email]]</td>
                <td>[[item.phone]]</td>
            </tr>
            <tr id="scroll-tab-2">
                <td colspan="4">
                    <img ng-hide="hide_loader" class="push-left ng-hide" src="./assets/img/loader.gif" alt="" style="width:  20px;">
                </td>
            </tr>

            </tbody>
        </table>

    </div>

    <!-- --------------------------------------------------------->

    @include('letters-modal.letters')


</div>
@endsection