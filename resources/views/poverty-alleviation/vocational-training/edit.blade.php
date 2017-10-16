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

                {!! Form::model($povertyAlleviationProgram, ['method' => 'PUT','route' => ['programs.update', $povertyAlleviationProgram->id], 'class' => 'form-horizontal']) !!}

                <fieldset class="content-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">First Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $povertyAlleviationProgram->first_name }}" required placeholder="First Name" name="first_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Last Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" required value="{{ $povertyAlleviationProgram->last_name }}" placeholder="Last Name" name="last_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Phone No.</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" required placeholder="Phone Number" value="{{ $povertyAlleviationProgram->mobile }}" name="mobile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Age</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="age">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\PovertyAlleviationProgram::ages() as $value)
                                            <option value="{{$value}}" @if($value == $povertyAlleviationProgram->age) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Number of Children</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $povertyAlleviationProgram->number_of_children }}" required placeholder="Number of Children"  name="number_of_children">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Lga of Residence</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $povertyAlleviationProgram->lga_of_residence }}" required placeholder="Local Government of Residence"  name="lga_of_residence">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Address</label>
                                <div class="col-lg-9">
                                    <textarea rows="3" class="form-control" required placeholder="Address" name="address">
                                        {{$povertyAlleviationProgram->address}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Educational Qualification</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="educational_qualification">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\PovertyAlleviationProgram::educationalQualifications() as $value)
                                            <option value="{{$value}}" @if($value == $povertyAlleviationProgram->educational_qualification) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">Type of Work</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="type_of_work">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\PovertyAlleviationProgram::workTypes() as $value)
                                            <option value="{{$value}}" @if($value == $povertyAlleviationProgram->type_of_work) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Place of Work</label>
                                <div class="col-lg-9">
                                    <input type="text" value="{{ $povertyAlleviationProgram->place_of_work }}" class="form-control" required placeholder="Place of Work"  name="place_of_work">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Country</label>
                                <div class="col-lg-9">
                                    <select class="form-control country" required name="country">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\PovertyAlleviationProgram::countries() as $value)
                                            <option value="{{$value}}" @if($value == $povertyAlleviationProgram->country) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">State</label>
                                <div class="col-lg-9">
                                    <select class="form-control states" required name="state_id">
                                        <option value="">-- Select --</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}" @if($state->id == $povertyAlleviationProgram->state->id) selected @endif>{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Local Government</label>
                                <div class="col-lg-9">
                                    <select class="form-control lgas" required name="lga_id" disabled>
                                        <option value="">-- Select --</option>
                                        <option value="{{ $povertyAlleviationProgram->lga_id }}" selected>{{ $povertyAlleviationProgram->lga->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Next of Kin Phone</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $povertyAlleviationProgram->nok_mobile }}" required placeholder="Next of kin Phone number"  name="nok_mobile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Next of Kin Email</label>
                                <div class="col-lg-9">
                                    <input type="text" value="{{ $povertyAlleviationProgram->nok_email }}" class="form-control" placeholder="Next of kin Email(Optional)"  name="nok_email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Next of kin Address</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" required placeholder="Next of kin address" name="nok_address">
                                        {{ $povertyAlleviationProgram->nok_address }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="text-right">
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
@include('layouts.partials.state-lga-scripts')