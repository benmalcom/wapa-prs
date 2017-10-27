@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Poverty Alleviation Program</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/programs') }}">Poverty Alleviation Program</a></li>
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
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Lga of Residence</th>
                    <th>Address</th>
                    <th>Number of Children</th>
                    <th>Type of Work</th>
                    <th>Place of Work</th>
                    <th>Educational Qualification</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Lga</th>
                    <th>Next of Kin Mobile</th>
                    <th>Next of Kin Email</th>
                    <th>Next of Kin Address</th>
                    @can(Auth::user()->hasRole(\App\UserType::POVERTY_ALLEVIATION))
                    <th>Actions</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @if(count($programs) > 0)
                    @foreach($programs as $index=>$program)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $program->first_name.' '.$program->last_name }}</td>
                            <td>{{ $program->mobile ? $program->mobile : 'N/A' }}</td>
                            <td>{{ $program->age ? $program->age : 'N/A' }}</td>
                            <td>{{ $program->lga_of_residence ? $program->lga_of_residence : 'N/A' }}</td>
                            <td>{{ $program->address ? $program->address : 'N/A'}}</td>
                            <td>{{ $program->number_of_children ? $program->number_of_children : 'N/A' }}</td>
                            <td>{{ $program->type_of_work ? $program->type_of_work : 'N/A' }}</td>
                            <td>{{ $program->place_of_work ? $program->place_of_work : 'N/A'}}</td>
                            <td>{{ $program->educational_qualification ? $program->educational_qualification : 'N/A'}}</td>
                            <td>{{ $program->country ? $program->country : 'N/A'}}</td>
                            <td>{{ $program->state->name ? $program->state->name : 'N/A'}}</td>
                            <td>{{ $program->lga->name ? $program->lga->name : 'N/A'}}</td>
                            <td>{{ $program->nok_mobile ? $program->nok_mobile : 'N/A'}}</td>
                            <td>{{ $program->nok_email ? $program->nok_email : 'N/A'}}</td>
                            <td>{{ $program->nok_address ? $program->nok_address : 'N/A'}}</td>

                            @can(Auth::user()->hasRole(\App\UserType::POVERTY_ALLEVIATION))
                            <td colspan="2">
                                <a class="btn btn-info btn-xs" href="{{ route('programs.edit',$program->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['programs.destroy', $program->id],'class'=>'inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
@                           @endcan
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div>{{ $programs->links() }}</div>

        </div>
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