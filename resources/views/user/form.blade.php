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
                                {!! Form::model($user, ['route' => $section->route, 'class' => 'form-validate', 'files'
                                => true, 'enctype' => 'multipart/form-data',
                                'autocomplete' => 'off']) !!}
                                @method($section->method)
                                <div class="row g-gs">
                                    @php

                                    $disabled = '';
                                    @endphp
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Upload Pictures </label>
                                            <div class="form-control-wrap">
                                                {!! Form::file('attachments[]', [
                                                'class' => 'form-control',
                                                'accept' => 'image/png, image/jpeg, image/jpg'
                                                ]) !!}


                                                <!-- Add the 'accept' attribute to restrict file types to images -->
                                                @error('images')
                                                <span style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Full Name</label>
                                            <div class="form-control-wrap">
                                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'
                                                => 'Enter a Full Name', 'required' => 'required', $disabled , ]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Username</label>
                                            <div class="form-control-wrap">
                                                {!! Form::text('username', null, ['class' => 'form-control',
                                                'placeholder'
                                                => 'Enter a Username', 'required' => 'required', $disabled , ]) !!}
                                            </div>
                                        </div>
                                    </div>
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

                                    @if(auth()->user()->user_type == 0 || auth()->user()->user_type == 1 )
                                    @if($statusFlag)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-topics">User Role</label>
                                            <div class="form-control-wrap">
                                                <!-- <?php
                                                    // Assuming $roles is an array
                                                    // $rolesWithoutLast = array_slice($roles, 0, -1);
                                                ?> -->
                                                {!! Form::select('user_type', $roles, null, [
                                                'class' => 'form-control form-select select2',
                                                'required' => 'required',
                                                'placeholder' => 'Select User Role',
                                                'id' => 'user_type_select'
                                                ]); !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-topics">Phone Number</label>
                                            <div class="form-control-wrap">
                                                {!! Form::text('phone_number', null, [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Enter a Phone Number',
                                                    'required' => 'required',
                                                    'pattern' => '[0-9]+',  // Allow only numeric input
                                                    'title' => 'Please enter only numbers',
                                                    $disabled,
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if(auth()->user()->user_type == 0 || auth()->user()->user_type == 1 )
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-topics">Status</label>
                                            <div class="form-control-wrap ">
                                                {!! Form::select('status', array(1 => 'Active', 0 => 'Block'), null,
                                                ['class' => 'form-control', 'placeholder' => 'Select a option',
                                                'required' => 'required', ]); !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endif

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