@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Non-Governmental Organizations(NGOs)</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/ngos') }}">NGOs</a></li>
                <li class="active">Edit</li>
            </ul>

        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Edit NGO</h5>
            </div>

            <div class="panel-body">

                {!! Form::model($ngo, ['method' => 'PUT','route' => ['ngos.update', $ngo->id], 'class' => 'form-horizontal']) !!}


                <fieldset class="content-group">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Organisation Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{ $ngo->name }}" placeholder="Enter Organization Name" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Address</label>
                        <div class="col-lg-10">
                            <textarea rows="3" class="form-control"  placeholder="Organization Address" name="address">{{ $ngo->address }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Name of Registrar</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{ $ngo->registrar }}" placeholder="Name of Registrar"  name="registrar">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </fieldset>
                {!! Form::close() !!}
            </div>
        </div>



        <!-- Grid -->
        <!-- /grid -->

        <!-- Footer -->
    @include('layouts.partials.footer')
    <!-- /footer -->

    </div>
    <!-- /content area -->
@endsection