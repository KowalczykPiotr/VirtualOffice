@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')

    <script> var root = './'; </script>
    <script> var _token = "{{ csrf_token() }}" </script>


    <div class="container mt-5">

        @include('messages')


        <div class="jumbotron p-4 mt-3">
            <h4>@lang('clients/clients-add.title')</h4>
        </div>

        <div class="p-3">
            <form action="{{ url('/clients/clients/save/') }}" role="form" method="post">
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="input-name" class="col-lg-6 control-label text-right">@lang('clients/clients-add.lab_name')</label>
                    <div class="col-lg-6">
                        <input id="input-name" name="name" required type="text" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="@lang('clients/clients-add.inp_name')" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
                        @endif

                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-email" class="col-lg-6 control-label text-right">@lang('clients/clients-add.lab_email')</label>
                    <div class="col-lg-6">
                        <input id="input-email" name="email" required type="email" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="@lang('clients/clients-add.inp_email')" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback"> {{ $errors->first('email') }} </div>
                        @endif

                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-phone" class="col-lg-6 control-label text-right">@lang('clients/clients-add.lab_phone')</label>
                    <div class="col-lg-6">
                        <input id="input-phone" name="phone" required type="text" class="form-control form-control-sm {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="@lang('clients/clients-add.inp_phone')" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback"> {{ $errors->first('phone') }} </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-group" class="col-lg-6 control-label text-right">@lang('clients/clients-add.lab_group')</label>
                    <div class="col-lg-6">
                        <select id="input-group" name="group" class="form-control form-control-sm  {{ $errors->has('group') ? ' is-invalid' : '' }}">
                            <option value="" @empty($input->group) selected @endempty >@lang('clients/clients.sf_select')</option>
                            @foreach($customer_groups as $customer_group)
                                <option value="{{ $customer_group->id }}">{{ $customer_group->group_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row justify-content-end">
                    <div class="col">
                        <button id="addLetterBtn" type="submit" class="btn btn-primary float-right p-2 ml-2">
                            <i class="fas fa-database"></i>
                            &nbsp;@lang('clients/clients-add.btn_add')
                        </button>
                        <a href="{{ url('/clients/clients/') }}" class="btn btn-primary float-right p-2 ml-2">
                            <i class="fas fa-times"></i>
                            @lang('clients/clients-add.btn_cancel')
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection