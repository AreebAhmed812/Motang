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
                        <div class="card-header">
                            @if((in_array('create-role', getUserPermissions())))
                            <div class="nk-block-head-content float-sm-right">
                                <a href="{{ route("model-management.create") }}" class="btn btn-primary">Add New
                                    {{ $section->title }}</a>
                            </div><!-- .nk-block-head-content -->
                            @endif
                        </div>
                        <!-- main alert @s -->
                        @include('partials.alerts')
                        <!-- main alert @e -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $modelManagements as $value )
                                    <tr id="rowID-{{ $value->id }}">
                                        <td>{{$value->id }}</td>
                                        <td>{{$value->name}}</td>
                                        <!-- <td>{!!($value->status == 0) ? '<span class="badge badge-danger">Inactive</span>'
                                            : '<span class="badge badge-success">Active</span>'!!}</td> -->
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->phonenumber}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                @if(in_array('update-user', getUserPermissions()))
                                                <a class="btn btn-primary"
                                                    href='{{ route($section->slug.".edit", $value->id) }}'><em
                                                        class="icon fa fa-edit"></em></a>
                                                @endif
                                                <!-- @if(in_array('delete-user', getUserPermissions())) -->
                                                <!-- <a class="btn btn-danger deleteBtnModal" data-id="{{$user->id}}" data-route="" data-toggle="modal" data-target="#deleteModal" style="color:#fff;"><em class="icon ni ni-trash"></em></a>  -->
                                                <form id="deleteForm"
                                                    onSubmit="if(!confirm('Is the form filled out correctly?')){return false;}"
                                                    class="float-right"
                                                    action=" {!! route($section->slug.'.destroy',$user->id) !!}"
                                                    method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    {!! Form::button('<i class="icon ni ni-trash"></i> ', ['type' =>
                                                    'submit', 'class' => 'btn pt-1','style' => 'padding: 5px 5px;']) !!}
                                                </form>
                                                <!-- @endif -->
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.container-fluid -->
    </section>

</div>


@endsection

@push('scripts')

@endpush