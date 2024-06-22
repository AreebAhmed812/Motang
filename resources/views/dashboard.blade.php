@extends('layouts.dashboard')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <section class="content">
        @if(in_array(auth()->user()->user_type, [0, 1,2]))
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$sellerCount}}</h3>
                            <p>Sellers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="{{route('seller')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">   
                            <h3>{{$reportCount}}</h3>
                            <p>Reports</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('reports.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$feedbackCount}}</h3>
                            <p>Feedbacks</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document"></i>
                        </div>
                        <a href="{{route('feedbacks.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$messageCount}}</h3>
                            <p>Message</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-chatbubble"></i> <!-- This could be a message icon -->
                        </div>
                        <a href="{{route('contact.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1>Quick System Report</h1>
                                </div>
                                <!-- main alert @s -->
                                @include('partials.alerts')
                                <!-- main alert @e -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Report Title</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sta1</td>
                                                <td>Total Number Of System Users</td>
                                                <td>{{$userCount}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta2</td>
                                                <td>Total Number Of Make/Brands	</td>
                                                <td>{{$brandCount}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta3</td>
                                                <td>Total Number Of Car Model	</td>
                                                <td>{{$modelCount}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta4</td>
                                                <td>Total Number Of Sellers	</td>
                                                <td>{{$sellerCount}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta5</td>
                                                <td>Total Number Of Cars	</td>
                                                <td>{{$adsCount}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta6</td>
                                                <td>Total Number Of Feedback	</td>
                                                <td>{{$feedbackCount}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta7</td>
                                                <td>Total Number Of Reports	</td>
                                                <td>{{$reportCount}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta8</td>
                                                <td>Total Number Of Ads Impression/Views	</td>
                                                <td>{{$totalView}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta9</td>
                                                <td>Total Number Of Blocked User</td>
                                                <td>{{$blockUser}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta10</td>
                                                <td>Total Number Of Active User</td>
                                                <td>{{$activeUser}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta11</td>
                                                <td>Total Number Of Active Ads</td>
                                                <td>{{$activeAds}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta12</td>
                                                <td>Total Number Of Daily Ads</td>
                                                <td>{{$dayAds}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta13</td>
                                                <td>Total Number Of Monthly Ads</td>
                                                <td>{{$monthlyAds}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sta14</td>
                                                <td>Total Number Of Weekly Ads</td>
                                                <td>{{$weeklyAds}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Seller section -->
        @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$adsCount}}</h3>
                            <p>Total Ads Posted</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$totalView}}</h3>
                            <p>Total Ads Views</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$feedbackCount}}</h3>
                            <p>Total Ads Feedbacks</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document"></i>
                        </div>
                        <!-- <a href="{{route('feedbacks.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$reportCount}}</h3>
                            <p>Total Ads Report</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                            <!-- </div>
                        <a href="{{route('reports.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End -->
          
        </div>
        @endif
    </section>
    <!-- Main content -->
    <!-- <section class="content" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);">
        <h1 style="text-align: center; font-weight:bold;">WELCOME TO MOTANG</h1>
    </section> -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection