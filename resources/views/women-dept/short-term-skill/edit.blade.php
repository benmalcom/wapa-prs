@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">{{ \App\ShortTermSkill::title }}</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ url('/short-term-skills') }}">{{ \App\ShortTermSkill::title }}</a></li>
                <li class="active">Edit</li>
            </ul>

        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Edit Record</h5>
            </div>

            <div class="panel-body">

                {!! Form::model($shortTermSkill, ['method' => 'PUT','route' => ['short-term-skills.update', $shortTermSkill->id], 'class' => 'form-horizontal']) !!}

                <fieldset class="content-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">First Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $shortTermSkill->first_name }}" required placeholder="First Name" name="first_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Last Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $shortTermSkill->last_name }}" required placeholder="Last Name" name="last_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Phone No.</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $shortTermSkill->mobile }}" required placeholder="Phone Number" name="mobile">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Gender</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="gender">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\ShortTermSkill::genders() as $value)
                                            <option value="{{$value}}" @if($shortTermSkill->gender && $shortTermSkill->gender== $value) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-lg-3">Marital Status</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="marital_status">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\ShortTermSkill::maritalStatus() as $value)
                                            <option value="{{$value}}" @if($shortTermSkill->marital_status && $shortTermSkill->marital_status== $value) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Date of Birth</label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $shortTermSkill->date_of_birth }}" name="date_of_birth"  data-toggle="datepicker" placeholder="Click to select date" required>
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Place of Birth</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $shortTermSkill->place_of_birth }}"  required placeholder="Place of Birth"  name="place_of_birth">
                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="control-label col-lg-3">Disabilities</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="disability">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\ShortTermSkill::disabilities() as $value)
                                            <option value="{{$value}}" @if($shortTermSkill->disability && $shortTermSkill->disability== $value) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group disability-nature hidden">
                                <label class="control-label col-lg-3">Nature</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $shortTermSkill->disability_nature }}"  placeholder="If yes, state nature of disability"  name="disability_nature">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-lg-3">Nationality</label>
                                <div class="col-lg-9">
                                    <select class="form-control country" required name="country">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\ShortTermSkill::countries() as $value)
                                            <option value="{{$value}}" @if($shortTermSkill->country && $shortTermSkill->country== $value) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">State</label>
                                <div class="col-lg-9">
                                    <select class="form-control states" required name="state_id"  disabled>
                                        <option value="">-- Select --</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Local Government</label>
                                <div class="col-lg-9">
                                    <select class="form-control lgas" required name="lga_id" disabled>
                                        <option value="">-- Select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Postal Address</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" required placeholder="Postal Address" name="postal_address">{{ $shortTermSkill->postal_address }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Permanent Address</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" required placeholder="Permanent Contact Address" name="permanent_address">{{ $shortTermSkill->permanent_address }}</textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                    <h4>Next of Kin Details</h4><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">Next of Kin Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $shortTermSkill->nok_name }}" required placeholder="Name of next of kin"  name="nok_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Next of kin Address</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" required placeholder="Next of kin address" name="nok_address">{{ $shortTermSkill->nok_address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">Relationship</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $shortTermSkill->nok_relationship }}" placeholder="Your relationship with next of kin"  name="nok_relationship">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Occupation</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $shortTermSkill->nok_occupation }}" placeholder="Your next of kin occupation"  name="nok_occupation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Next of Kin Phone</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $shortTermSkill->nok_mobile }}" required placeholder="Next of kin Phone number"  name="nok_mobile">
                                </div>
                            </div>


                        </div>
                        <h4>Educational Background</h4><hr>
                        @if($shortTermSkill->educationalBackground && !empty($shortTermSkill->educationalBackground))
                            @foreach($shortTermSkill->educationalBackground as $index=>$edu)
                                <div class="row edu">
                                    <input type="hidden" name="education[{{$index}}][id]" value="{{ $edu->id }}">
                                    <div class="col-md-3">
                                        <label class="control-label">Name of Institution</label>
                                        <input type="text" class="form-control edu-input"  placeholder="Name of Institution" value="{{ $edu->institution }}"  name="education[{{$index}}][institution]">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Qualification Obtained</label>
                                        <select class="form-control country edu-input"  name="education[{{$index}}][qualification]">
                                            <option value="">-- Select --</option>
                                            @foreach(\App\VocationalTrainingSkill::educationalQualifications() as $value)
                                                <option value="{{$value}}" @if($edu->qualification && $edu->qualification== $value) selected @endif>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>From</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control edu-input" value="{{ $edu->from }}" name="education[{{$index}}][from]" data-toggle="datepicker" placeholder="Click to select date">
                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>To</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control edu-input" value="{{ $edu->to }}" name="education[{{$index}}][to]" data-toggle="datepicker" placeholder="Click to select date">
                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <a class="more-edu-btn"><i class="fa fa-plus"></i> Add More</a>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>
                                    Are you employed or attended any education or undergoing any course presently?
                                </h5>
                                <label class="radio-inline">
                                    <input type="radio" required name="engagement_status" id="inlineRadio1" value="Yes"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" required name="engagement_status" id="inlineRadio2" value="No" checked> No
                                </label>
                                <input type="text" class="form-control hidden mt-5" name="engagement_details" placeholder="If yes, give details">

                            </div>
                            <div class="col-md-12">
                                <h5>Any other information</h5>
                                <input type="text" class="form-control" name="other_information" placeholder="Enter any other information">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>

                    </div>


                </fieldset>
                {!! Form::close() !!}
            </div>
        </div>



        <!-- Grid -->
        <!-- /grid -->

        <!-- Footer -->
    @include('layouts.partials.footer')
    <!-- /footer -->

    </div>
    <!-- /content area -->
@endsection
@include('layouts.partials.datepicker-scripts')
@include('layouts.partials.state-lga-scripts')
@include('layouts.partials.form-scripts')