@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Users</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/users') }}">Users</a></li>
                <li class="active">New</li>
            </ul>

        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Add New User</h5>
            </div>

            <div class="panel-body">

                {!! Form::open(array('route' => 'users.store','method'=>'POST', 'class' => 'form-horizontal')) !!}

                <fieldset class="content-group">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="control-label col-lg-3">First Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Enter First Name" name="first_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Last Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Email</label>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="control-label col-lg-3">Choose Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" placeholder="Choose password"  name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Confirm Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" placeholder="Confirm password"  name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">User Type</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="user_type">
                                        <option value="">-- Select --</option>
                                        @foreach($user_types as $value)
                                            <option value="{{$value->id}}" data-role-name="{{ $value->role_name }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group hidden centers">
                                <label class="control-label col-lg-3">Center</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="center_id">
                                        <option value="">-- Select --</option>
                                        @foreach($centers as $center)
                                            <option value="{{$center->id}}">{{ $center->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
@include('layouts.partials.select-center')