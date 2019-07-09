<div class="app-header white box-shadow navbar-md">
    <div class="navbar">
        <!-- Open side - Naviation on mobile -->
        <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
            <i class="material-icons">&#xe5d2;</i>
        </a>
        <!-- / -->
        <!-- Page title - Bind to $state's title -->
        <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>
        <!-- navbar right -->
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item dropdown">
                <a class="nav-link clear" href data-toggle="dropdown">
                  <span class="avatar w-32">
                      @if(Auth::user()->photo !="")
                          <img src="{{ URL::to('uploads/users/'.Auth::user()->photo) }}" alt="{{ Auth::user()->name }}"
                               title="{{ Auth::user()->name }}">
                      @else
                          <img src="{{ URL::to('backEnd/assets/images/profile.jpg') }}" alt="{{ Auth::user()->name }}"
                               title="{{ Auth::user()->name }}">
                      @endif
                      <i class="on b-white bottom"></i>
                  </span>
                </a>
                <div class="dropdown-menu pull-right dropdown-menu-scale">
                    @if(Auth::user()->permissions ==0 || Auth::user()->permissions ==1)
                        <a class="dropdown-item"
                           href="{{ route('users_edit',Auth::user()->id) }}"><span>{{ trans('backend.profile') }}</span></a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       class="dropdown-item" href="{{ url('/logout') }}">{{ trans('backend.logout') }}</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
            <li class="nav-item hidden-md-up">
                <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                    <i class="material-icons">&#xe5d4;</i>
                </a>
            </li>
        </ul>
        <!-- / navbar right -->
    </div>
</div>