@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">{{ \App\Sensitization::title }}</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/sensitizations') }}"> {{ \App\Sensitization::title }} </a></li>
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
                    <th>Title</th>
                    @if(Auth::user()->hasAnyRole([\App\UserType::WOMEN_DEPT,\App\UserType::DEVELOPER]))
                    <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(count($sensitizations) > 0)
                    @foreach($sensitizations as $index=>$sensitization)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sensitization->title }}</td>
                            @if(Auth::user()->hasAnyRole([\App\UserType::WOMEN_DEPT,\App\UserType::DEVELOPER]))
                            <td colspan="2">
                                <a class="btn btn-success btn-xs" href="{{ route('sensitizations.attendees.create',$sensitization->id) }}"><i class="fa fa-plus"></i> Attendee</a>
                                <a class="btn btn-default btn-xs" href="{{ route('sensitizations.attendees.index',$sensitization->id) }}"><i class="fa fa-eye"></i> Attendees <span class="badge">{{ $sensitization->attendees_count }}</span></a>
                                <a class="btn btn-info btn-xs" href="{{ route('sensitizations.edit',$sensitization->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['sensitizations.destroy', $sensitization->id],'class'=>'inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                        @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div>{{ $sensitizations->links() }}</div>

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