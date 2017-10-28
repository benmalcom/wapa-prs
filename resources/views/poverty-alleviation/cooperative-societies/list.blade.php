@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Women Groups/Cooperative Societies</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/cooperative-societies') }}">Women Groups/Cooperative Societies</a></li>
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
                    <th>Division</th>
                    <th>Sub-Division</th>
                    @if(Auth::user()->hasAnyRole([\App\UserType::POVERTY_ALLEVIATION,\App\UserType::DEVELOPER,\App\UserType::ADMIN]))
                    <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(count($societies) > 0)
                    @foreach($societies as $index=>$society)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $society->name }}</td>
                            <td>{{ $society->division }}</td>
                            <td>{{ $society->sub_division ? $society->sub_division : 'N/A'}}</td>
                            @if(Auth::user()->hasAnyRole([\App\UserType::POVERTY_ALLEVIATION,\App\UserType::DEVELOPER,\App\UserType::ADMIN]))
                            <td colspan="2">
                                <a class="btn btn-success btn-xs" href="{{ url('/cooperative-societies/'.$society->id.'/new-member') }}"><i class="fa fa-plus"></i> Member</a>
                                <a class="btn btn-default btn-xs" href="{{ url('/cooperative-societies/'.$society->id.'/members') }}"><i class="fa fa-eye"></i> Members <span class="badge">{{ $society->members_count }}</span></a>
                                <a class="btn btn-info btn-xs" href="{{ route('cooperative-societies.edit',$society->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['cooperative-societies.destroy', $society->id],'class'=>'inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                            @endif

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div>{{ $societies->links() }}</div>

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