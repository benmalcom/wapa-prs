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
                <li class="active">New</li>
            </ul>

        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Edit Domestic Violence Issue</h5>
            </div>

            <div class="panel-body">

                {!! Form::model($domesticViolence, ['method' => 'PUT','route' => ['domestic-violences.update', $domesticViolence->id], 'class' => 'form-horizontal']) !!}

                <fieldset class="content-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">First Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $domesticViolence->first_name }}" required placeholder="First Name" name="first_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Last Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $domesticViolence->last_name }}" required placeholder="Last Name" name="last_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Phone No.</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $domesticViolence->mobile }}" required placeholder="Phone Number" name="mobile">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-lg-3">Email</label>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control" value="{{ $domesticViolence->email }}" placeholder="Email(Optional)" name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Age</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" value="{{ $domesticViolence->age }}" required placeholder="Age" name="age">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Lga of Residence</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{ $domesticViolence->lga_of_residence }}" required placeholder="Local Government of Residence"  name="lga_of_residence">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Address</label>
                                <div class="col-lg-9">
                                    <textarea rows="3" class="form-control" required placeholder="Address" name="address">
                                        {{ $domesticViolence->address }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">Marital Status</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="marital_status">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\DomesticViolence::maritalStatus() as $value)
                                            <option value="{{$value}}" @if($domesticViolence->marital_status==$value) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Type of Violence</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="type_of_violence">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\DomesticViolence::type() as $value)
                                            <option value="{{$value}}" @if($domesticViolence->type_of_violence==$value) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Conclusion</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="conclusion">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\DomesticViolence::conclusion() as $value)
                                            <option value="{{$value}}" @if($domesticViolence->conclusion==$value) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Educational Qualification</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="educational_qualification">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\DomesticViolence::educationalQualifications() as $value)
                                            <option value="{{$value}}" @if($domesticViolence->educational_qualification==$value) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Country</label>
                                <div class="col-lg-9">
                                    <select class="form-control country" required name="country">
                                        <option value="">-- Select --</option>
                                        @foreach(\App\DomesticViolence::country() as $value)
                                            <option value="{{$value}}" @if($domesticViolence->country==$value) selected @endif>{{$value}}</option>
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
                                            <option value="{{$state->id}}" @if($domesticViolence->state_id==$state->id) selected @endif>{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Local Government</label>
                                <div class="col-lg-9">
                                    <select class="form-control lgas" required name="lga_id" disabled>
                                        <option value="{{$domesticViolence->lga->id}}">{{$domesticViolence->lga->name}}</option>

                                    </select>
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