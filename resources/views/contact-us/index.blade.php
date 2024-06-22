@extends('layouts.dashboard')

@section('content')
<style>
div#example_wrapper>.row>.col-sm-12.col-md-6:nth-child(2) {
    display: flex;
    justify-content: flex-end;
}
</style>
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
                        <div class="card-header">
                            <!-- @if((in_array('create-role', getUserPermissions()))) -->
                            <!-- <div class="nk-block-head-content float-sm-right">
                                <a href="{{ route("feedbacks.create") }}" class="btn btn-primary">Add New
                                    {{ $section->title }}</a>
                            </div>.nk-block-head-content -->
                            <!-- @endif -->
                            <!-- <div class="nk-block-head-content float-sm-right">
                                <a href="{{ route('feedbacks.create') }}" class="btn btn-primary">Add New
                                    {{ $section->title }}</a>
                            </div>.nk-block-head-content -->
                        </div>



                        <!-- main alert @s -->
                        @include('partials.alerts')
                        <!-- main alert @e -->
                        <!-- /.card-header -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
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
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Subject</th>
                                                            <th>Message</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $i = 1;
                                                        @endphp
                                                        @if( $messageContact )
                                                        @foreach( $messageContact as $value )
                                                        <tr id="rowID-{{ $value->id }}">
                                                            <td>{{$i++}}</td>
                                                            <td>{{$value->name}}</td>
                                                            <td>{{$value->email}}</td>
                                                            <td>{{$value->subject}}</td>
                                                            <td>{{$value->message}}</td>
                                                            @php 
                                                            $dateTime = new \DateTime($value->created_at);
                                                            $convertedDateTime = $dateTime->format('Y-m-d\TH:i:s.u\Z');
                                                             @endphp
                                                            {{-- <td>{{ $value->created_at->setTimezone(Auth::user()->timezone)->format('Y-m-d H:i:s') }}</td> --}}
                                                            <td>
                                                                <span id="time" class="timedata">{{$convertedDateTime}}</span>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
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
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.container-fluid -->
    </section>

</div>




@endsection

@push('scripts')

@endpush