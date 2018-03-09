@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')


    <div class="container mt-5">

        @include('messages')


        <div class="jumbotron p-4 mt-3">
            <h4>@lang('history/add.title')</h4>
        </div>

        <div class="p-3">
            <form action="{{ url('/history/save/') }}" role="form" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="letter" value="{{$id}}">

                <div class="form-group row">
                    <label for="input-group" class="col-lg-6 control-label text-right">@lang('history/add.lab_position')</label>
                    <div class="col-lg-6">
                        <select id="input-group" name="history" class="form-control form-control-sm  {{ $errors->has('history') ? ' is-invalid' : '' }}">
                            @foreach($letter_positions as $position)
                                <option  value="{{ $position->id }}">{{ $position->position }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col">
                        <button id="addLetterBtn" type="submit" class="btn btn-primary float-right p-2 ml-2">
                            <i class="fas fa-database"></i>
                            &nbsp;@lang('history/add.btn_save')
                        </button>
                        <a href="{{ url('/clients/clients/') }}" class="btn btn-primary float-right p-2 ml-2">
                            <i class="fas fa-times"></i>
                            @lang('history/add.btn_cancel')
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection