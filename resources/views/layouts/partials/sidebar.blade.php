<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                  <a href="#" class="media-left"><img src="{{ asset('assets/images/image.png') }}" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Auth::user()->getName() }}</span>
                        <div class="text-size-mini text-muted">
                            <a href="{{ route('logout') }}" class="label label-danger"
                               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    @role(\App\UserType::DEVELOPER.'|'.\App\UserType::ADMIN)
                    <li class="navigation-header"><span>Master Records</span> <i class="fa fa-female" title="Main pages"></i></li>
{{--                    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>--}}
                    <li><a href="{{url('/user-types')}}"><i class="fa fa-user-plus"></i> <span>User Types</span></a></li>
                    <li>
                        <a href="#"><i class="fa fa-users"></i> <span>Users</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("users") }}"><a href="{{url('/users')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("users/create") }}"><a href="{{url('/users/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-book"></i> <span>Skill Acquisition Courses</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("courses") }}"><a href="{{url('/courses')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("courses/create") }}"><a href="{{url('/courses/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-map-marker"></i> <span>Skill Acquisition Centers</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("skill-acquisition-centers") }}"><a href="{{url('/skill-acquisition-centers')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("skill-acquisition-centers/create") }}"><a href="{{url('/skill-acquisition-centers/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>
                    @endrole



                    {{--Women Department--}}

                    @role(\App\UserType::WOMEN_DEPT.'|'.\App\UserType::DEVELOPER.'|'.\App\UserType::ADMIN)

                    <li class="navigation-header"><span>Women Department</span> <i class="fa fa-female" title="Main pages"></i></li>

                    <li>
                        <a href="#"><i class="fa fa-building"></i> <span>NGOs</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("ngos") }}"><a href="{{url('/ngos')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("ngos/create") }}"><a href="{{url('/ngos/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-female"></i> <span>Domestic Violence</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("domestic-violences") }}"><a href="{{url('/domestic-violences')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("domestic-violences/create") }}"><a href="{{url('/domestic-violences/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-tasks"></i> <span>Short Skill Program</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("short-term-skills") }}"><a href="{{url('/short-term-skills')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("short-term-skills/create") }}"><a href="{{url('/short-term-skills/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-users"></i> <span>Sensitization</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("sensitizations") }}"><a href="{{url('/sensitizations')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("sensitizations/create") }}"><a href="{{url('/sensitizations/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-microphone"></i> <span>Advocacy</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("advocacies") }}"><a href="{{url('/advocacies')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("advocacies/create") }}"><a href="{{url('/advocacies/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>
                    @endrole




                    @role(\App\UserType::POVERTY_ALLEVIATION.'|'.\App\UserType::DEVELOPER.'|'.\App\UserType::ADMIN)
                    {{--Poverty Alleviation Department--}}

                    <li class="navigation-header"><span>Poverty Alleviation Department</span> <i class="fa fa-female" title="Main pages"></i></li>


                    <li>
                        <a href="#"><i class="fa fa-tasks"></i> <span>Poverty Alleviation Program</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("programs") }}"><a href="{{url('/programs')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("programs/create") }}"><a href="{{url('/programs/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-female"></i> <span>Women Cooperative Societies</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("cooperative-societies") }}"><a href="{{url('/cooperative-societies')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("cooperative-societies/create") }}"><a href="{{url('/cooperative-societies/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>
                @endrole

                    {{--Skill Acquisition Development--}}
{{--
                    @role(\App\UserType::SKILL_ACQUISITION.'|'.\App\UserType::DEVELOPER)

                    <li class="navigation-header"><span>Skill Acquisition Development</span> <i class="fa fa-female" title="Main pages"></i></li>

                    <li>
                        <a href="#"><i class="fa fa-user-plus"></i> <span>Center Principals</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("principals") }}"><a href="{{url('/principals')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("principals/create") }}"><a href="{{url('/principals/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>
                    @endrole
--}}


                    @role(\App\UserType::PRINCIPAL.'|'.\App\UserType::SKILL_ACQUISITION.'|'.\App\UserType::DEVELOPER.'|'.\App\UserType::ADMIN)

                    <li>
                        <a href="#"><i class="fa fa-tasks"></i> <span>Vocational Training & Skill</span></a>
                        <ul>
                            <li class="{{ \App\Helper::setActive("vocational-training-skills") }}"><a href="{{url('/vocational-training-skills')}}"><i class="fa fa-eye"></i> View All</a></li>
                            <li class="{{ \App\Helper::setActive("vocational-training-skills/create") }}"><a href="{{url('/vocational-training-skills/create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>
                    @endrole


                    @role(\App\UserType::PRS.'|'.\App\UserType::DEVELOPER.'|'.\App\UserType::ADMIN)
                    <li class="navigation-header"><span>PRS</span> <i class="fa fa-female" title="Main pages"></i></li>
                    <li class="{{ \App\Helper::setActive("advocacies") }}"><a href="{{url('/advocacies')}}"><i class="fa fa-users"></i> <span>Advocacies</span></a></li>
                    <li class="{{ \App\Helper::setActive("cooperative-societies") }}"><a href="{{url('/cooperative-societies')}}"><i class="fa fa-building"></i> <span>Women Cooperative Societies</span></a></li>
                    <li class="{{ \App\Helper::setActive("domestic-violences") }}"><a href="{{url('/domestic-violences')}}"><i class="fa fa-female"></i> <span>Violations</span></a></li>
                    <li class="{{ \App\Helper::setActive("ngos") }}"><a href="{{url('/ngos')}}"><i class="fa fa-home"></i> <span>NGOs</span></a></li>
                    <li class="{{ \App\Helper::setActive("programs") }}"><a href="{{url('/programs')}}"><i class="fa fa-female"></i> <span>Poverty Alleviation</span></a></li>
                    <li class="{{ \App\Helper::setActive("sensitizations") }}"><a href="{{url('/sensitizations')}}"><i class="fa fa-users"></i> <span>Sensitizations</span></a></li>
                    <li class="{{ \App\Helper::setActive("short-term-skills") }}"><a href="{{url('/short-term-skills')}}"><i class="fa fa-tasks"></i> <span>Short-term Skill Program</span></a></li>
                    <li class="{{ \App\Helper::setActive("vocational-training-skills") }}"><a href="{{url('/vocational-training-skills')}}"><i class="fa fa-tasks"></i> <span>Vocational Training & Skill</span></a></li>

                    <!-- /main -->
                @endrole
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>