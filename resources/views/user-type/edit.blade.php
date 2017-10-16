@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">User Types</span> - List</h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/user-types') }}">User Types</a></li>
                <li class="active">Edit</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">


        <!-- Multiple row inputs (vertical) -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Edit User type</h6>
                {{--                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>--}}
            </div>

            <div class="panel-body">
                {!! Form::model($userType, ['method' => 'PUT','route' => ['user-types.update', $userType->id]]) !!}
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $userType->name }}" placeholder="Name" name="name" required>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $userType->role_name }}" placeholder="Role name" name="role_name" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
        <!-- /multiple row inputs (vertical) -->



        <!-- Table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">User Types</h5>
                <div class="heading-elements">
                    {{--<ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>--}}
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Role Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($user_types))
                        @foreach($user_types as $index=>$user_type)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user_type->name }}</td>
                                <td>{{ $user_type->role_name }}</td>
                                <td colspan="2">
                                    <a class="btn btn-info btn-xs" href="{{ route('user-types.edit',$user_type->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['user-types.destroy', $user_type->id],'class'=>'inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /table -->


        <!-- Grid -->
        <!-- /grid -->

        <!-- Footer -->
    @include('layouts.partials.footer')
    <!-- /footer -->

    </div>
    <!-- /content area -->
@endsection