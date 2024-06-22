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
                        <!-- @if(auth()->user()->user_type == 3) -->
                            @if((in_array('create-role', getUserPermissions())))
                            <div class="nk-block-head-content float-sm-right">
                                <a href="{{ route("ads.create") }}" class="btn btn-primary">Add New
                                    {{ $section->title }}</a>
                            </div><!-- .nk-block-head-content -->
                            @endif
                        <!-- @endif -->
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
                                                            <th>Title</th>
                                                            <th>Seller</th>
                                                            <th>Views</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Feature</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $i = 1;
                                                        @endphp
                                                        @if( $ads )
                                                        @foreach( $ads as $value )

                                                        <tr id="rowID-{{ $value->id }}">
                                                            <td>{{$i++}}</td>
                                                            <td>{{ ($value->brandData) ? $value->brandData->brand_name : ''}} {{ ($value->modelData) ? $value->modelData->model : ''}}
                                                                {{($value->yearData) ? $value->yearData->year : ''}}
                                                                {{$value->color}}
                                                            </td>
                                                            <!-- <td>{{$value->seller_id}}</td> -->
                                                            <td>{{($value->user) ? $value->user->name : ''}}</td>
                                                            <td>{{$value->total_click}}</td>
                                                            @php
                                                            $dateTime = new \DateTime($value->created_at);
                                                            $convertedDateTime = $dateTime->format('Y-m-d\TH:i:s.u\Z');
                                                             @endphp
                                                            {{-- <td>{{ $value->created_at->setTimezone(Auth::user()->timezone)->format('Y-m-d H:i:s') }}</td> --}}
                                                            <td>
                                                                <span id="time" class="timedata">{{$convertedDateTime}}</span>
                                                            </td>
                                                            <td>{!!($value->status == 0) ? '<span class="badge badge-danger">Inactive</span>'
                                                                : '<span class="badge badge-success">Active</span>'!!}
                                                            </td>
                                                            <td>{!! ($value->is_feature == 0) ? '<span class="badge badge-danger">Inactive</span>' : '<span class="badge badge-' . (($value->feature_status == 'active') ? 'success' : 'danger') . '">' . formatToHumanView($value->feature_status) . '</span>' !!}</td>
                                                            <td>
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    @if(in_array('update-user', getUserPermissions()))
                                                                    <a class="btn btn-primary"  href='{{ route($section->slug.".edit", $value->id) }}'><em class="icon fa fa-edit"></em></a>
                                                                    @endif
                                                                    <a class="btn btn-danger">
                                                                        <form id="" onSubmit="if(!confirm('Is the form filled out correctly?')){return false;}" class="float-right" action=" {!! route($section->slug.'.destroy',$value->id) !!}" method="POST">
                                                                            {{ method_field('DELETE') }}
                                                                            {{ csrf_field() }}
                                                                            {!! Form::button(' <i class="icon fa fa-trash"></i> ', ['type'
                                                                            =>
                                                                            'submit', 'class' => 'btn pt-1','style' =>
                                                                            'padding: 2px
                                                                            2px;color:white;']) !!}
                                                                        </form>
                                                                    </a>
                                                                    @if(auth()->user()->user_type != 3)
                                                                    @if($value->feature_status == 'active')
                                                                    <a class="btn btn-primary">
                                                                    <form id="" onSubmit="if(!confirm('Do you want to deactivate the feature for this ad?')){return false;}" class="float-right" action="{{ route('ads.feature') }}" method="POST">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" value="{{$value->id}}" name="id"/>
                                                                            <input type="hidden" value="deactive" name="status"/>
                                                                            {!! Form::button('Deactive Feature', ['type'
                                                                            =>
                                                                            'submit', 'class' => 'btn pt-1','style' =>
                                                                            'padding: 2px
                                                                            2px;color:white;']) !!}
                                                                        </form>
                                                                       </a>
                                                                    @else
                                                                    <a class="btn btn-primary">
                                                                    <form id="" onSubmit="if(!confirm('Do you want to activate the feature for this ad?')){return false;}" class="float-right" action="{{ route('ads.feature') }}" method="POST">

                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" value="{{$value->id}}" name="id"/>
                                                                            <input type="hidden" value="active" name="status"/>
                                                                            {!! Form::button('Active Feature', ['type'
                                                                            =>
                                                                            'submit', 'class' => 'btn pt-1','style' =>
                                                                            'padding: 2px
                                                                            2px;color:white;']) !!}
                                                                        </form>
                                                                       </a>

                                                                    @endif
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
