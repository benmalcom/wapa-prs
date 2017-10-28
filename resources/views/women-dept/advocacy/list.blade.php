@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">{{ \App\Advocacy::title }}</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/advocacies') }}"> {{ \App\Advocacy::title }} </a></li>
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
                    @if(Auth::user()->hasAnyRole([\App\UserType::WOMEN_DEPT,\App\UserType::DEVELOPER, \App\UserType::ADMIN]))
                    <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(count($advocacies) > 0)
                    @foreach($advocacies as $index=>$advocacy)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $advocacy->title }}</td>
                            @if(Auth::user()->hasAnyRole([\App\UserType::WOMEN_DEPT,\App\UserType::DEVELOPER, \App\UserType::ADMIN]))

                            <td colspan="2">
                                <a class="btn btn-success btn-xs" href="{{ route('advocacies.attendees.create',$advocacy->id) }}"><i class="fa fa-plus"></i> Attendee</a>
                                <a class="btn btn-default btn-xs" href="{{ route('advocacies.attendees.index',$advocacy->id) }}"><i class="fa fa-eye"></i> Attendees <span class="badge">{{ $advocacy->attendees_count }}</span></a>
                                <a class="btn btn-info btn-xs" href="{{ route('advocacies.edit',$advocacy->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['advocacies.destroy', $advocacy->id],'class'=>'inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div>{{ $advocacies->links() }}</div>

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