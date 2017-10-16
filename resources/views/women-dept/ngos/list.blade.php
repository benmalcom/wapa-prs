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
                <li class="active">All</li>
            </ul>

        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic responsive configuration -->
        <div class="panel panel-flat p-5">
            <table class="table table-condensed datatable-basic table-striped table-bordered dt-responsive nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Registrar</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($ngos) > 0)
                    @foreach($ngos as $index=>$ngo)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ngo->name }}</td>
                            <td>{{ $ngo->registrar }}</td>
                            <td>{{ $ngo->address }}</td>
                            <td colspan="2">
                                <a class="btn btn-info btn-xs" href="{{ route('ngos.edit',$ngo->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['user-types.destroy', $ngo->id],'class'=>'inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div>{{ $ngos->links() }}</div>

        </div>
        {{--<div class="panel panel-flat">
            --}}{{--<div class="panel-heading">
                <h5 class="panel-title">Configuration option</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>--}}{{--

            <div class="panel-body">
                The <code>Responsive</code> extension for DataTables can be applied to a DataTable in one of two ways; with a specific <code>class name</code> on the table, or using the DataTables initialisation options. This method shows the latter, with the <code>responsive</code> option being set to the boolean value <code>true</code>. The <code>responsive</code> option can be given as a boolean value, or as an object with configuration options.
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Job Title</th>
                    <th>DOB</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                --}}{{--@if(count($ngos))
                    @foreach($ngos as $index=>$ngo)
                        <tr>
                            <td>Name</td>
                            <td><a href="#">Enright</a></td>
                            <td>Traffic Court Referee</td>
                            <td>22 Jun 1972</td>
                            <td><span class="label label-success">Active</span></td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                            <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                            <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>

--}}{{----}}{{--                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user_type->name }}</td>
                            <td>{{ $user_type->role_name }}</td>
                            <td colspan="2">
                                <a class="btn btn-info btn-xs" href="{{ route('user-types.edit',$user_type->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['user-types.destroy', $user_type->id],'class'=>'inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>--}}{{----}}{{--
                    @endforeach
                @endif

--}}{{--                </tbody>
            </table>
        </div>--}}
        <!-- /basic responsive configuration -->
        <!-- /table -->


        <!-- Grid -->
        <!-- /grid -->

        <!-- Footer -->
    @include('layouts.partials.footer')
    <!-- /footer -->

    </div>
    <!-- /content area -->
@endsection
@include('layouts.partials.table-scripts')