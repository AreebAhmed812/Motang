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
                        <div class="card">
                            <!-- <div class="card-header">
                                                <h3 class="card-title">DataTable with default features</h3>
                                            </div> -->
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Ads Count</th>
                                            <!-- <th>Password</th> -->
                                            <th>Date Registered</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @if( $users )
                                        @foreach( $users as $value )
                                        <tr id="rowID-{{ $value->id }}">
                                            <td>{{$i++ }}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->phone_number}}</td>
                                            
                                            <!-- <td>{{($value->role) ?$value->role->name:'' }}</td> -->
                                            <td>{{$value->email}}</td>
                                            <!-- <td><input type="password" placeholder="Password not readable"></td> -->
                                            <!-- <td>{!!($value->status == 0) ? '<span
                                                    class="badge badge-danger">Inactive</span>'
                                                : '<span class="badge badge-success">Active</span>'!!}</td> -->
                                                <td>{{($value->ads) ?$value->ads->count():'0'}}</td>
                                                @php 
                                                            $dateTime = new \DateTime($value->created_at);
                                                            $convertedDateTime = $dateTime->format('Y-m-d\TH:i:s.u\Z');
                                                             @endphp
                                                            {{-- <td>{{ $value->created_at->setTimezone(Auth::user()->timezone)->format('Y-m-d H:i:s') }}</td> --}}
                                                            <td>
                                                                <span id="time" class="timedata">{{$convertedDateTime}}</span>
                                                            </td>
                                                <td>{!!($value->status == 0) ? '<span
                                                    class="badge badge-danger">Inactive</span>'
                                                : '<span class="badge badge-success">Active</span>'!!}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    @if(in_array('update-user', getUserPermissions()))
                                                    <a class="btn btn-primary"
                                                        href='{{ route($section->slug.".edit", $value->id) }}'><em
                                                            class="icon fa fa-edit"></em></a>
                                                    @endif
                                                    <a class="btn btn-danger">
                                                        <form id=""
                                                            onSubmit="if(!confirm('Is the form filled out correctly?')){return false;}"
                                                            class="float-right"
                                                            action=" {!! route($section->slug.'.destroy',$value->id) !!}"
                                                            method="POST">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            {!! Form::button(' <i
                                                                class="icon fa fa-trash"></i> ', ['type'
                                                            =>
                                                            'submit', 'class' => 'btn pt-1','style' =>
                                                            'padding: 2px
                                                            2px;color:white;']) !!}
                                                        </form>
                                                    </a>
                                                  
                                              
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.container-fluid -->
    </section>

</div>


@endsection

@push('scripts')

@endpush