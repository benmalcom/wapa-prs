@extends('layouts.default')
@section('content')
    <!-- Page header -->
    {{--<div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">User</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/users') }}">Users</a></li>
                <li class="active">New</li>
            </ul>

        </div>
    </div>--}}
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Table -->
        <div class="panel panel-flat mt-100">

            <div class="panel-body">


                <fieldset class="content-group">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><span class="text-semibold">Update Your Details</span></h4>

                            {!! Form::open(array('url' => '/profile','method'=>'POST', 'class' => 'form-horizontal')) !!}

                            <div class="form-group">
                                <label class="control-label col-lg-3">First Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ Auth::user()->first_name }}" placeholder="Enter First Name" name="first_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Last Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ Auth::user()->last_name }}" placeholder="Enter Last Name" name="last_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Email</label>
                                <div class="col-lg-9">
                                    <input type="email" readonly class="form-control" value="{{ Auth::user()->email }}" placeholder="Enter Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-success pull-right">Update <i class="fa fa-save position-right"></i></button>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>

                        <div class="col-md-6">
                            <h4><span class="text-semibold">Change Password</span></h4>

                            {!! Form::open(array('url' => '/password','method'=>'POST', 'class' => 'form-horizontal')) !!}

                            <div class="form-group">
                                <label class="control-label col-lg-4">Current Password</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" placeholder="Choose password"  name="old_password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Choose Password</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" placeholder="Choose password"  name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-4">Confirm Password</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" placeholder="Confirm password"  name="password_confirmation">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary pull-right">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>

                    </div>

                </fieldset>
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