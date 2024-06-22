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
                                <a href="{{ route("roles.create") }}" class="btn btn-primary">Add New {{ $section->title }}</a>
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
                                        <th>Role Name</th>
                                        <th>Role Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( $roles )
                                    @foreach( $roles as $role )
                                    <tr id="rowID-{{ $role->id }}">
                                        <td>{{$role->id }}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{!!($role->status == 0) ? '<span class="badge badge-danger">Inactive</span>' : '<span class="badge badge-success">Active</span>'!!}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                @if(in_array('update-role', getUserPermissions()))
                                                <a class="btn btn-primary" href='{{ route("roles.edit", $role->id) }}'><em class="icon fa fa-edit"></em></a>
                                                @endif
                                              
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
                    <!-- /.container-fluid -->
    </section>

</div>


@endsection

@push('scripts')

@endpush