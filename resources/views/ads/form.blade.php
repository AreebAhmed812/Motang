@extends('layouts.dashboard')

@section('content')
<style>
.row.g-gs>.nk-block>.row.g-gs>.col-sm-6.col-lg-4>.gallery.gallery-content.card.card-bordered>a>img {
    width: 20%;
    height: 100px;
    object-fit: cover;
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Instruction:</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h5>Please send the amount to the account below and share a screenshot of the payment to the provided number.</h5>
                <p>Phone Number: 1236549784</p>
                <p>Account Title: Test Title</p>
                <p>Bank Name: Test Bank</p>
                <p>Account Number: 123456789465</p>
                <p>IBAN: DUB2189132463121</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
              {{-- <button type="button" class="btn btn-primary">Done</button> --}}
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
                                {!! Form::model($ads, ['route' => $section->route, 'class' => 'form-validate', 'files'
                                => true, 'enctype' => 'multipart/form-data',
                                'autocomplete' => 'off']) !!}
                                @method($section->method)
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif

                                <div class="row g-gs">
                                    @if($section->method == 'PUT')

                                    {!! getFilesGalary(($ads->attachment_id) ? $ads->attachment_id : '') !!}
                                    @endif
                                    @php
                                    $disabled = '';
                                    @endphp
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Upload Pictures (minimum
                                                5)</label>
                                            <div class="form-control-wrap">
                                                {!! Form::file('attachments[]', ['class' => 'form-control', 'accept' =>
                                                'image/*', 'multiple' => true]) !!}

                                                <!-- Add the 'accept' attribute to restrict file types to images -->
                                                @error('images')
                                                <span style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Make/Brand</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('make_brand',$brand, null, ['class' =>
                                                'form-control','id'=>'make_brand', 'placeholder' =>
                                                'Select a Make/Brand',   $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Model</label>
                                            <div class="form-control-wrap">
                                                @if($section->method == 'PUT')
                                                {!! Form::select('model', $modelManagements, isset($ads) ?
                                                $ads->model_id : null, [
                                                'class' => 'form-control',
                                                'placeholder' => 'Please Select Model',
                                                 
                                                'id' => 'model',
                                                'style' => 'display:block;',
                                                $disabled,
                                                ]) !!}
                                                @else
                                                {!! Form::select('model', [], null, [
                                                'class' => 'form-control',
                                                'placeholder' => 'Please Select Model',
                                                 
                                                'id' => 'model',
                                                'style' => 'display:block;',
                                                ]) !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Select a Location</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('location', [
                                                '' => 'Select Location',
                                                'Akwa Ibom' => 'Akwa Ibom',
                                                'Abia' => 'Abia',
                                                'Abuja (FCT)' => 'Abuja (FCT)',
                                                'Adamawa' => 'Adamawa',
                                                'Akwa Ibom' => 'Akwa Ibom',
                                                'Anambra' => 'Anambra',
                                                'Bauchi' => 'Bauchi',
                                                'Bayelsa' => 'Bayelsa',
                                                'Benue' => 'Benue',
                                                'Borno' => 'Borno',
                                                'Cross River' => 'Cross River',
                                                'Delta' => 'Delta',
                                                'Ebonyi' => 'Ebonyi',
                                                'Edo' => 'Edo',
                                                'Ekiti' => 'Ekiti',
                                                'Enugu' => 'Enugu',
                                                'Gombe' => 'Gombe',
                                                'Imo' => 'Imo',
                                                'Jigawa' => 'Jigawa',
                                                'Kaduna' => 'Kaduna',
                                                'Kano' => 'Kano',
                                                'Katsina' => 'Katsina',
                                                'Kebbi' => 'Kebbi',
                                                'Kogi' => 'Kogi',
                                                'Kwara' => 'Kwara',
                                                'Lagos' => 'Lagos',
                                                'Nassarawa' => 'Nassarawa',
                                                'Niger' => 'Niger',
                                                'Ogun' => 'Ogun',
                                                'Ondo' => 'Ondo',
                                                'Osun' => 'Osun',
                                                'Oyo' => 'Oyo',
                                                'Plateau' => 'Plateau',
                                                'Rivers' => 'Rivers',
                                                'Sokoto' => 'Sokoto',
                                                'Taraba' => 'Taraba',
                                                'Yobe' => 'Yobe',
                                                'Zamfara' => 'Zamfara',
                                                ], null, ['class' => 'form-control',  
                                                $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Enter a Year of
                                                Manufacture</label>
                                            <div class="form-control-wrap">

                                                {!! Form::select('year_of_manufacture',$year_ads, null, ['class' =>
                                                'form-control', 'placeholder' =>
                                                'Enter a Year of Manufacture',   $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Select a Color</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('color', [
                                                '' => 'Select Color',
                                                'Brown' => 'Brown',
                                                'Beige' => 'Beige',
                                                'Black' => 'Black',
                                                'Blue' => 'Blue',
                                                'Brown' => 'Brown',
                                                'Gold' => 'Gold',
                                                'Gray' => 'Gray',
                                                'Green' => 'Green',
                                                'Orange' => 'Orange',
                                                'Pearl' => 'Pearl',
                                                'Pink' => 'Pink',
                                                'Purple' => 'Purple',
                                                'Red' => 'Red',
                                                'Silver' => 'Silver',
                                                'White' => 'White',
                                                'Yellow' => 'Yellow',
                                                'Others' => 'Others',
                                                ], null, ['class' => 'form-control',  
                                                $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Select a Condition</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('condition', [
                                                '' => 'Select Condition',
                                                'Brand New' => 'Brand New',
                                                'Nigerian Used' => 'Nigerian Used',
                                                'Foreign Used' => 'Foreign Used',
                                                ], null, ['class' => 'form-control',  
                                                $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Select a Transmission</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('transmission', [
                                                '' => 'Select Transmission',
                                                'Automatic' => 'Automatic',
                                                'Manual' => 'Manual',
                                                'Semi Automatic' => 'Semi Automatic',
                                                'Tiptronic' => 'Tiptronic',
                                                ], null, ['class' => 'form-control',  
                                                $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Is This Car Registered</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('car_registered', [
                                                '' => 'Select Option',
                                                '0' => 'Yes',
                                                '1' => 'No',
                                                ], null, ['class' => 'form-control',  
                                                $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Select Fuel Type</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('fuel', [
                                                '' => 'Select Fuel Type',
                                                'Petrol' => 'Petrol',
                                                'Diesel' => 'Diesel',
                                                'Petrol/Electric Hybrid' => 'Petrol/Electric Hybrid',
                                                'Natural Gas' => 'Natural Gas',
                                                'Gasoline/Electric' => 'Gasoline/Electric',
                                                'Flex-Fuel' => 'Flex-Fuel',
                                                'Electric' => 'Electric',
                                                'Diesel/Electric Hybrid' => 'Diesel/Electric Hybrid',
                                                ], null, ['class' => 'form-control',  
                                                $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Select Number of Seats</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('seats', [
                                                '' => 'Number Of Seats',
                                                '6' => '6',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4',
                                                '5' => '5',
                                                '6' => '6',
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                                '10' => '10',
                                                ], null, ['class' => 'form-control',  
                                                $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Select Number of Doors</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('doors', [
                                                '' => 'Number Of Doors',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4',
                                                '5' => '5',
                                                '6' => '6',
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                                '10' => '10',
                                                ], null, ['class' => 'form-control',  
                                                $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Enter a Price(NG)</label>
                                            <div class="form-control-wrap">
                                                {!! Form::number('price', null, [
                                                'class' => 'form-control',
                                                'placeholder' => 'Enter a Price(N)',
                                                 
                                                'min' => '0', // Set the minimum value to 0
                                                'step' => '1', // Set the step to allow decimal values
                                                $disabled,
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Is Price Negotiable?</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('price_negotiable', [
                                                '' => 'Select Option',
                                                '1' => 'No',
                                                '0' => 'Yes',
                                                ], null, ['class' => 'form-control',  
                                                $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Listed By</label>
                                            <div class="form-control-wrap">
                                                {!! Form::select('listed_by', [
                                                '' => 'Select Option',
                                                'Owner' => 'Owner',
                                                'Reseller' => 'Reseller',
                                                'Dealer' => 'Dealer',
                                                ], null, ['class' => 'form-control',  
                                                $disabled]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Phone Number to Display</label>
                                            <div class="form-control-wrap">
                                                {!! Form::text('phone_number', null, [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Phone Number to Display',
                                                     
                                                    'pattern' => '[0-9]+',  // Allow only numeric input
                                                    'title' => 'Please enter only numbers',
                                                    $disabled,
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">You want to make this add Feature:</label>
                                            <div class="form-control-wrap">
                                                <div class="form-check form-check-inline">
                                                    {!! Form::radio('is_feature', '1', null, ['class' => 'form-check-input', $disabled, 'id' => 'feature-yes', 'data-toggle' => 'modal', 'data-target' => '#exampleModalCenter']) !!}
                                                    <label class="form-check-label" for="feature-yes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    {!! Form::radio('is_feature', '0', null, ['class' => 'form-check-input', $disabled, 'id' => 'feature-no']) !!}
                                                    <label class="form-check-label" for="feature-no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    @if(auth()->user()->user_type != 3)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-topics">Status</label>
                                            <div class="form-control-wrap ">
                                                {!! Form::select('status', array(1 => 'Active', 0 => 'Block'), null,
                                                ['class' => 'form-control', 'placeholder' => 'Select a option',
                                                  ]); !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-topics">Status</label>
                                            <div class="form-control-wrap ">
                                            {!! Form::checkbox('include_description', 1, false, ['class' => 'form-check-input form-control', $disabled]) !!}
                                             <label class="form-check-label" for="include_description">Include Description</label>
                                            </div>
                                        </div>
                                    </div> -->


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">Description (More Details About
                                                The Car)</label>
                                            <div class="form-control-wrap">
                                                {!! Form::textarea('description', null, ['class' => 'form-control',
                                                'placeholder' => 'Description (More Details About The Car)',  $disabled]) !!}
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    $('#make_brand').change(function() {
        var make_brand = $(this).val();
        $.ajax({
            type: 'POST',
            url: "{{ route('brandFetch') }}",
            data: {
                'brand_name': make_brand,
                '_token': "{{ csrf_token() }}",
            },
            success: function(data) {
                // Assuming the response has a 'models' key
                console.log(data);
                var modelsDropdown = $('#model');
                modelsDropdown.empty();

                // Add the fetched models to the dropdown
                modelsDropdown.append('<option value="" >Please Select Model</option>');
                $.each(data, function(index, model) {
                    modelsDropdown.append('<option value="' + model.id + '">' +
                        model.model + '</option>');
                });
            },
            error: function(data) {
                console.log(data);
                // You can display error messages or perform other actions here
            },
        });
    });
});
</script>