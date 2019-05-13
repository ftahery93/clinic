<!-- Fixed navbar -->
<div class="sidebar-menu">

    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a  @if (Auth::user()->hasRolePermission('dashboard')) href="{{ url('admin/dashboard') }}" @else href="javascript:void(0);" @endif>
                     <img src="{{ asset('assets/images/logo_white.png') }}" width="120" alt="" />
                </a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon">
                    <i class="entypo-menu"></i>
                </a>
            </div>



            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation">
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>


        <ul id="main-menu" class="main-menu">           
          
             @if (Auth::user()->hasRolePermission('registeredUsers'))
                    <li class="{{ active('registeredUsers.*') }}">
                        <a href="{{ url('admin/registeredUsers') }}" >
                            <i class="entypo-users"></i>
                            <span class="title">Application Users</span>
                        </a>
                    </li>
                    @endif 
          

            @if (Auth::user()->hasRolePermission('bannerImages'))           
            <li  class="{{ active('bannerImages.*') }}">
                <a href="{{ url('admin/bannerImages/uploadImages') }}">
                    <i class="entypo-picture"></i>
                    <span class="title">Banner Images</span>
                </a>
            </li>
            @endif


            

            @if (Auth::user()->hasRolePermission('users') || Auth::user()->hasRolePermission('permissions'))
            <li class="has-sub {{ active(['users.*','permissions.*'], 'opened') }}">
                <a href="javascript:void(0);">
                    <i class="entypo-layout"></i>
                    <span class="title">Administrators</span>
                </a>
                <ul>
                    @if (Auth::user()->hasRolePermission('users'))
                    <li class="{{ active('users.*') }}">

                        <a href="{{ url('admin/users') }}">
                            <i class="entypo-user"></i>
                            <span class="title">Users</span>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->hasRolePermission('permissions'))
                    <li class="{{ active('permissions.*') }}">
                        <a href="{{ url('admin/permissions') }}">
                            <i class="entypo-users"></i>
                            <span class="title">Users Group </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            @if (Auth::user()->hasRolePermission('countries') || Auth::user()->hasRolePermission('categories'))
            <li class="has-sub {{ active(['countries.*','categories.*'], 'opened') }}">
                <a href="javascript:void(0);">
                    <i class="entypo-newspaper"></i>
                    <span class="title">Master Records</span>
                </a>
                <ul>                   
                    @if (Auth::user()->hasRolePermission('countries'))
                    <li class="{{ active('countries.*') }}">
                        <a href="{{ url('admin/countries') }}">
                            <i class="entypo-chart-area"></i>
                            <span class="title">Countries</span>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->hasRolePermission('categories'))
                    <li class="{{ active('categories.*') }}">
                        <a href="{{ url('admin/categories') }}">
                            <i class="entypo-tools"></i>
                            <span class="title">Categories</span>
                        </a>
                    </li>
                    @endif

                </ul>
            </li>
            @endif
            @if (Auth::user()->hasRolePermission('cmsPages'))
            <li class="{{ active('cmsPages.*') }}">
                <a href="{{ url('admin/cmsPages') }}" >
                    <i class="entypo-publish"></i>
                    <span class="title">CMS Pages</span>
                </a>
            </li>
            @endif 
<!--            @if (Auth::user()->hasRolePermission('information'))
            <li class="{{ active('information.*') }}">
                <a href="{{ url('admin/information') }}" >
                    <i class="entypo-publish"></i>
                    <span class="title">Information</span>
                </a>
            </li>
            @endif -->
            
            @if (Auth::user()->hasRolePermission('contactus'))
            <li class="{{ active('contactus.*') }}">
                <a href="{{ url('admin/contactus') }}" >
                    <i class="entypo-phone"></i>
                    <span class="title">Contact Entries</span>
                </a>
            </li>
            @endif 

            @if (Auth::user()->hasRolePermission('logActivity'))
            <li  class="{{ active('admin/logActivity') }}">
                        <a href="{{ url('admin/logActivity') }}">
                            <i class="entypo-clock"></i>
                            <span class="title">Log Activity</span>
                        </a>
                    </li>
            @endif


            @if (Auth::user()->hasRolePermission('backup'))
            <li  class="{{ active('admin/backup') }}">
                <a href="{{ url('admin/backup') }}">
                    <i class="entypo-upload"></i>
                    <span class="title">Backups</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->hasRolePermission('languageManagement'))
            <li class="{{ active('admin/languageManagement') }}">
                <a href="{{ url('admin/languageManagement') }}">
                    <i class="entypo-globe"></i>
                    <span class="title">Language Management</span>
                </a>
            </li>
            @endif 

        </ul>
        </li>


        </ul>

    </div>

</div>