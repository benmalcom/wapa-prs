@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Vocational Training & Skills</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/vocational-training-skills') }}">Vocational Training & Skills</a></li>
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
                    <th>Lassra No</th>
                    <th>Programme in View</th>
                    <th>Center</th>
                    <th>Date of Birth</th>
                    <th>Place of Birth</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Lga</th>

                    <th>Address</th>
                    <th>Marital Status</th>
                    <th>Disability</th>
                    <th>Educational Qualification</th>


                    <th>Next of Kin Name</th>
                    <th>Next of Kin Relationship</th>
                    <th>Next of Kin Mobile</th>
                    <th>Next of Kin Email</th>
                    <th>Next of Kin Address</th>
                    @if(Auth::user()->hasAnyRole([\App\UserType::SKILL_ACQUISITION,\App\UserType::DEVELOPER, \App\UserType::ADMIN]))

                    <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(count($members) > 0)
                    @foreach($members as $index=>$member)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $member->first_name.' '.$member->last_name }}</td>
                            <td>{{ $member->mobile ? $member->mobile : 'N/A' }}</td>
                            <td>{{ $member->lasrra_no ? $member->lasrra_no : 'N/A'}}</td>
                            <td>{{ $member->course->name ? $member->course->name : 'N/A'}}</td>
                            <td>{{ $member->center->name ? $member->center->name : 'N/A'}}</td>
                            <td>{{ $member->date_of_birth ? $member->date_of_birth : 'N/A'}}</td>
                            <td>{{ $member->place_of_birth ? $member->place_of_birth : 'N/A'}}</td>

                            <td>{{ $member->country ? $member->country : 'N/A'}}</td>
                            <td>{{ $member->state ? $member->state->name : 'N/A'}}</td>
                            <td>{{ $member->lga ? $member->lga->name : 'N/A'}}</td>
                            <td>{{ $member->address ? $member->address : 'N/A' }}</td>
                            <td>{{ $member->marital_status}}</td>
                            <td>{{ $member->disability_nature ? $member->disability_nature : 'N/A'}}</td>
                            <td>
                                @if(count ($member->educationalBackground) > 0)
                                    <table class="table table-bordered border-double table-condensed mt-5">
                                        <tr>
                                            <th>Institution</th>
                                            <th>Qualification</th>
                                            <th>From</th>
                                            <th>To</th>
                                        </tr>
                                        @foreach($member->educationalBackground as $value)
                                            <tr>
                                                <td>{{ $value->institution }}</td>
                                                <td>{{ $value->qualification }}</td>
                                                <td>{{ $value->from }}</td>
                                                <td>{{ $value->to }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    N/A
                                @endif
                            </td>


                            <td>{{ $member->nok_name ? $member->nok_name : 'N/A'}}</td>
                            <td>{{ $member->nok_relationship ? $member->nok_relationship : 'N/A'}}</td>
                            <td>{{ $member->nok_mobile ? $member->nok_mobile : 'N/A'}}</td>
                            <td>{{ $member->nok_email ? $member->nok_email : 'N/A'}}</td>
                            <td>{{ $member->nok_address ? $member->nok_address : 'N/A'}}</td>

                            @if(Auth::user()->hasAnyRole([\App\UserType::SKILL_ACQUISITION,\App\UserType::DEVELOPER, \App\UserType::ADMIN]))


                            <td colspan="2">
                                <a class="btn btn-info btn-xs" href="{{ route('vocational-training-skills.edit',$member->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['vocational-training-skills.destroy', $member->id],'class'=>'inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                            @endif
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