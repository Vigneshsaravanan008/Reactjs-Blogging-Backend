<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="#">
                        <i class="ficon" data-feather="menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Test Preparation">
                        <i class="ficon text-primary" data-feather="server"></i>
                    </a>
                </li>
                <li class="nav-item d-lg-block">
                    <a class="nav-link " href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Language">
                        <i class="ficon text-danger" data-feather="globe"></i>
                    </a>
                </li>
                <li class="nav-item d-lg-block">
                    <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Kids Course">
                        <i class="ficon text-success" data-feather="briefcase"></i>
                    </a>
                </li>
                {{-- <li class="nav-item d-lg-block">
            <a class="nav-link" href="{{route('page.index')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pages">
              <i class="ficon" data-feather="book"></i>
            </a>
          </li> --}}
                <li class="nav-item d-lg-block">
                    <a class="nav-link " href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Blogs">
                        <i class="ficon text-warning" data-feather="edit"></i>
                    </a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block dark_template" data-id="{{ Auth::guard('admin')->user()->dark }}">
                <a class="nav-link nav-link-style">
                    @if (Auth::guard('admin')->user()->dark == 0)
                        <i class="ficon" data-feather="moon"></i>
                    @else
                        <i class="ficon" data-feather='sun'></i>
                    @endif
                </a>
            </li>


            <li class="nav-item dropdown dropdown-notification me-25">
                <a class="nav-link" href="#" data-bs-toggle="dropdown">
                    <i class="ficon" data-feather="bell"></i>
                    {{-- <span class="badge rounded-pill bg-danger badge-up">5</span> --}}
                </a>
                {{-- <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
            <li class="dropdown-menu-header">
              <div class="dropdown-header d-flex">
                <h4 class="notification-title mb-0 me-auto">Notifications</h4>
              </div>
            </li>
            <li class="scrollable-container media-list">
              <a class="d-flex" href="#">
                <div class="list-item d-flex align-items-start">
                  <div class="me-1">
                    <div class="avatar">
                      <img src="../../../app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" width="32" height="32">
                    </div>
                  </div>
                  <div class="list-item-body flex-grow-1">
                    <p class="media-heading">
                      <span class="fw-bolder">Congratulation Sam 🎉</span>winner!
                    </p>
                    <small class="notification-text"> Won the monthly best seller badge.</small>
                  </div>
                </div>
              </a>

            </li>
            <li class="dropdown-menu-footer">
              <a class="btn btn-primary w-100" href="#">Read all notifications</a>
            </li>
          </ul> --}}
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder">{{ Auth::guard('admin')->user()->name }}</span>
                        <span class="user-status">Admin</span>
                    </div>
                    <span class="avatar">
                        <img class="round" src="{{ asset('app-assets/images/avatar.jpg') }}"
                            alt="Sakthi" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{route('admin.profile')}}">
                        <i class="me-50" data-feather="user"></i> Profile </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('admin.settings')}}">
                        <i class="me-50" data-feather="settings"></i> Settings </a>
                    <a class="dropdown-item" href="#">
                        <i class="me-50" data-feather="power"></i> Logout </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
