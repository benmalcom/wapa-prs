@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Skill Acquisition Centers</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/skill-acquisition-centers') }}">Skill Acquisition Centers</a></li>
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
                    <th>Address</th>
                    <th>Contact Mobile</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($centers) > 0)
                    @foreach($centers as $index=>$center)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $center->name }}</td>
                            <td>{{ $center->address }}</td>
                            <td>{{ $center->mobile }}</td>
                            <td colspan="2">
                                <a class="btn btn-info btn-xs" href="{{ route('skill-acquisition-centers.edit',$center->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['skill-acquisition-centers.destroy', $center->id],'class'=>'inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div>{{ $centers->links() }}</div>

        </div>

        <!-- Footer -->
    @include('layouts.partials.footer')
    <!-- /footer -->

    </div>
    <!-- /content area -->
@endsection
@include('layouts.partials.table-scripts')