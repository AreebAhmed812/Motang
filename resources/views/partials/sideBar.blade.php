<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <!-- <img src="{{ asset('dist/img/.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ (auth()->user()->attachment_id) ? asset(getImageURL(auth()->user()->attachment_id)) : asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                @if(auth()->user()->user_type == 0 || auth()->user()->user_type == 1 || auth()->user()->user_type == 2 )
                <li class="nav-header">User Management</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(auth()->user()->user_type == 0 || auth()->user()->user_type == 1 )
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All User</p>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{route('seller')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Seller</p>
                                </a>
                            </li>
                            <!-- @if((in_array('read-role', getUserPermissions())))
                            <li class="nav-item">
                                <a href="{{ route("roles.index") }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Role</p>
                                </a>
                            </li>
                            @endif -->
                        </ul>

                    </li>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Make/Brands
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('brands.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Make/Brands</p>
                            </a>
                        </li>


                        <!-- @if((in_array('read-role', getUserPermissions())))
                        <li class="nav-item">
                            <a href="{{ route("roles.index") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Role</p>
                            </a>
                        </li>
                        @endif -->
                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Model
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('model.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Model</p>
                            </a>
                        </li>


                        <!-- @if((in_array('read-role', getUserPermissions())))
                        <li class="nav-item">
                            <a href="{{ route("roles.index") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Role</p>
                            </a>
                        </li>
                        @endif -->
                    </ul>

                </li>
            
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Years
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('years.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Years</p>
                            </a>
                        </li>


                        <!-- @if((in_array('read-role', getUserPermissions())))
                        <li class="nav-item">
                            <a href="{{ route("roles.index") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Role</p>
                            </a>
                        </li>
                        @endif -->
                    </ul>

                    @endif
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Ads
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('ads.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Ads</p>
                            </a>
                        </li>


                        @if((in_array('read-role', getUserPermissions())))

                        <!-- <li class="nav-item">
                            <a href="{{ route("roles.index") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Role</p>
                            </a>
                        </li> -->
                        @endif
                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Feedbacks
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('feedbacks.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Feedbacks</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Abuse
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('reports.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Abuse</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(auth()->user()->user_type == 0 || auth()->user()->user_type == 1 || auth()->user()->user_type == 2)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Message
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('contact.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Message</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Profile
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('profile.edit',auth()->user()->id)}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('logout') }}" class="nav-link " onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-logout"></i>
                        <p>

                            {{ __('Logout') }}



                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>