@extends('layouts.default')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Dashboard</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ul>

        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Basic responsive configuration -->
        <div class="row">
            @if(!empty($details))
                @if(isset($details['ngo_count']))
                    <div class="col-md-4">
                        <div class="panel panel-flat p-5">
                            <div class="panel-body h-250 text-center">
                                <div><h4><i class="fa fa-building fa-3x"></i></h4></div>
                                <div><h5 class="text-muted">{{ \App\Ngo::title }}</h5></div>
                                <hr>
                                <div><h4 class="text-center">{{ $details['ngo_count'] }}</h4></div>
                                <blockquote>Registrations today: {{ $details['today_ngo'] }}</blockquote>
                            </div>
                        </div>
                    </div>
                @endif

                    @if(isset($details['domestic_violence_count']))
                        <div class="col-md-4">
                            <div class="panel panel-flat p-5">
                                <div class="panel-body h-250 text-center">
                                    <div><h4><i class="fa fa-female fa-3x"></i></h4></div>
                                    <div><h5 class="text-muted">{{ \App\DomesticViolence::title }}</h5></div>
                                    <hr>
                                    <div><h4 class="text-center">{{ $details['domestic_violence_count'] }}</h4></div>
                                    <blockquote>Registrations today: {{ $details['today_domestic_violence'] }}</blockquote>
                                </div>
                            </div>
                        </div>
                    @endif


                    @if(isset($details['short_skill_count']))
                        <div class="col-md-4">
                            <div class="panel panel-flat p-5">
                                <div class="panel-body h-250 text-center">
                                    <div><h4><i class="fa fa-tasks fa-3x"></i></h4></div>
                                    <div><h5 class="text-muted">{{ \App\ShortTermSkill::title }}</h5></div>
                                    <hr>
                                    <div><h4 class="text-center">{{ $details['short_skill_count'] }}</h4></div>
                                    <blockquote>Registrations today: {{ $details['today_short_skill'] }}</blockquote>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(isset($details['sensitization_count']))
                        <div class="col-md-4">
                            <div class="panel panel-flat p-5">
                                <div class="panel-body h-250 text-center">
                                    <div><h4><i class="fa fa-users fa-3x"></i></h4></div>
                                    <div><h5 class="text-muted">{{ \App\Sensitization::title }}</h5></div>
                                    <hr>
                                    <div><h4 class="text-center">{{ $details['sensitization_count'] }}</h4></div>
                                    <blockquote>Registrations today: {{ $details['today_sensitization'] }}</blockquote>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(isset($details['advocacy_count']))
                        <div class="col-md-4">
                            <div class="panel panel-flat p-5">
                                <div class="panel-body h-250 text-center">
                                    <div><h4><i class="fa fa-users fa-3x"></i></h4></div>
                                    <div><h5 class="text-muted">{{ \App\Advocacy::title }}</h5></div>
                                    <hr>
                                    <div><h4 class="text-center">{{ $details['advocacy_count'] }}</h4></div>
                                    <blockquote>Registrations today: {{ $details['today_advocacy'] }}</blockquote>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(isset($details['program_count']))
                        <div class="col-md-4">
                            <div class="panel panel-flat p-5">
                                <div class="panel-body h-250 text-center">
                                    <div><h4><i class="fa fa-shopping-basket fa-3x"></i></h4></div>
                                    <div><h5 class="text-muted">{{ \App\PovertyAlleviationProgram::title }}</h5></div>
                                    <hr>
                                    <div><h4 class="text-center">{{ $details['program_count'] }}</h4></div>
                                    <blockquote>Registrations today: {{ $details['today_program'] }}</blockquote>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(isset($details['cooperative_count']))
                        <div class="col-md-4">
                            <div class="panel panel-flat p-5">
                                <div class="panel-body h-250 text-center">
                                    <div><h4><i class="fa fa-home fa-3x"></i></h4></div>
                                    <div><h5 class="text-muted">{{ \App\WomenCooperativeSociety::title }}</h5></div>
                                    <hr>
                                    <div><h4 class="text-center">{{ $details['cooperative_count'] }}</h4></div>
                                    <blockquote>Registrations today: {{ $details['today_cooperative'] }}</blockquote>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(isset($details['vocational_count']))
                        <div class="col-md-4">
                            <div class="panel panel-flat p-5">
                                <div class="panel-body h-250 text-center">
                                    <div><h4><i class="fa fa-tasks fa-3x"></i></h4></div>
                                    <div><h5 class="text-muted">{{ \App\VocationalTrainingSkill::title }}</h5></div>
                                    <hr>
                                    <div><h4 class="text-center">{{ $details['vocational_count'] }}</h4></div>
                                    <blockquote>Registrations today: {{ $details['today_vocational'] }}</blockquote>
                                </div>
                            </div>
                        </div>
                    @endif

            @endif
        </div>

        <!-- Footer -->
    @include('layouts.partials.footer')
    <!-- /footer -->

    </div>
    <!-- /content area -->
@endsection