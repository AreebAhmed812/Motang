@extends('layouts.dashboard')

@section('content')



<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $section->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">{{ env('APP_NAME') }}</a></li>

                        <li class="breadcrumb-item active">{{ $section->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card">

                        <!-- main alert @s -->
                        @include('partials.alerts')
                        <!-- main alert @e -->
                        <!-- /.card-header -->
                        <div class="card-body">


                            <div class="card-inner">
                                {!! Form::model($user, ['route' => $section->route, 'class' => 'form-validate',
                                'autocomplete' => 'off']) !!}
                                @method($section->method)
                                <div class="row g-gs">
                                    @php

                                    $disabled = '';
                                    @endphp                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Email</label>
                                            <div class="form-control-wrap">
                                                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'
                                                => 'Enter Email', 'required' => 'required', $disabled , ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Password</label>
                                            <div class="form-control-wrap">
                                                {!! Form::password('password', ['class' => 'form-control', 'placeholder'
                                                => 'Enter User Password' ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Confirm Password</label>
                                            <div class="form-control-wrap">
                                                {!! Form::password('password_confirmation', ['class' => 'form-control',
                                                'placeholder' => 'Enter Confirm Password' ]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-topics">Phone Number</label>
                                            <div class="form-control-wrap ">
                                            {!! Form::text('phone_number', null, ['class' => 'form-control', 'placeholder'
                                                => 'Enter a Phone Number', 'required' => 'required', $disabled , ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- <div class="col-md-12">
                                        <hr />
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Roles Permissions</label>
                                        </div>
                                    </div> -->

                                    <table class="table">

                                    </table>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::button('<i class="fa fa-check-square-o"></i> Save', ['type' =>
                                            'submit', 'class' => 'btn btn-primary']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.container-fluid -->
    </section>

</div>


@endsection