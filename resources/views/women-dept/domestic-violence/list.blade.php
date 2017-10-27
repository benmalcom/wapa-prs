@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Domestic Violence</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/domestic-violences') }}">Domestic Violence</a></li>
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
                    <th>Email</th>
                    <th>Age</th>
                    <th>Lga of Residence</th>
                    <th>Address</th>
                    <th>Marital status</th>
                    <th>Type of Violence</th>
                    <th>Conclusion</th>
                    <th>Educational Qualification</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Lga</th>
                    @if(Auth::user()->hasAnyRole([\App\UserType::WOMEN_DEPT,\App\UserType::DEVELOPER]))
                    <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(count($violences) > 0)
                    @foreach($violences as $index=>$violence)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $violence->first_name.' '.$violence->last_name }}</td>
                            <td>{{ $violence->mobile }}</td>
                            <td>{{ $violence->email }}</td>
                            <td>{{ $violence->age }}</td>
                            <td>{{ $violence->lga_of_residence }}</td>
                            <td>{{ $violence->address }}</td>
                            <td>{{ $violence->marital_status }}</td>
                            <td>{{ $violence->type_of_violence }}</td>
                            <td>{{ $violence->conclusion }}</td>
                            <td>{{ $violence->educational_qualification }}</td>
                            <td>{{ $violence->country }}</td>
                            <td>{{ $violence->state->name}}</td>
                            <td>{{ $violence->lga->name}}</td>
                            @if(Auth::user()->hasAnyRole([\App\UserType::WOMEN_DEPT,\App\UserType::DEVELOPER]))
                            <td colspan="2">
                                <a class="btn btn-info btn-xs" href="{{ route('domestic-violences.edit',$violence->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['domestic-violences.destroy', $violence->id],'class'=>'inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div>{{ $violences->links() }}</div>

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