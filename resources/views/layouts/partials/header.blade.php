<div class="navbar navbar-default navbar-fixed-top header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand text-white text-lg mb-5" href="{{ url('/') }}"><strong><i class="fa fa-home"></i> {{$appName}}</strong></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            {{--<li><a href="#">Text link</a></li>

            <li>
                <a href="#">
                    <i class="icon-cog3"></i>
                    <span class="visible-xs-inline-block position-right">Icon link</span>
                </a>
            </li>--}}

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
{{--                    <img src="{{ asset('assets/images/image.png') }}" alt="">--}}
                    <span>{{ Auth::user()->getName() }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ url('/profile') }}"><i class="icon-user-plus"></i> My profile</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>


                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>