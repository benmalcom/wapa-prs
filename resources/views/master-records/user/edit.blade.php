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
                <h5 class="panel-title">Update User Details</h5>
            </div>

            <div class="panel-body">

                {!! Form::model($user, ['method' => 'PUT','route' => ['users.update', $user->id], 'class' => 'form-horizontal']) !!}

                <fieldset class="content-group">
                    <div class="form-group">
                        <label class="control-label col-lg-2">First Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{ $user->first_name }}" placeholder="Enter First Name" name="first_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Last Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{ $user->last_name }}" placeholder="Enter Last Name" name="last_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" value="{{ $user->email }}" placeholder="Enter Email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" placeholder="Type new password or leave empty"  name="password">
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