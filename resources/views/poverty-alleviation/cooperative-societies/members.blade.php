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
                <li class="active">{{ $womenCooperativeSociety->name }}</li>
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
                    <th>Mobile</th>
                    <th>Skill</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($members) > 0)
                    @foreach($members as $index=>$member)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $member->last_name.' '.$member->last_name }}</td>
                            <td>{{ $member->mobile }}</td>
                            <td>{{ $member->skill }}</td>
                            <td colspan="2">
                                <a class="btn btn-info btn-xs" href="{{ route('cooperative-societies.edit',$member->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['cooperative-societies.destroy', $member->id],'class'=>'inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div>{{ $members->links() }}</div>

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