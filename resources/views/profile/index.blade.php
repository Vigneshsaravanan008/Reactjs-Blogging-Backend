@extends('layouts.master')
@section('meta-details')
    <title>Account Settings- File Sytem</title>
@endsection
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Account</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Account Settings </a>
                                    </li>
                                    <li class="breadcrumb-item active"> Account
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills mb-2">
                            <!-- account -->
                            <li class="nav-item">
                                <a class="nav-link profile {{ request()->routeIs('admin.profile') ? 'active' : '' }}"
                                    href="javascript:void(0)" data-id="1">
                                    <i data-feather="user" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Account</span>
                                </a>
                            </li>
                            <!-- security -->
                            <li class="nav-item">
                                <a class="nav-link profile" href="javascript:void(0)" data-id="2">
                                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Security</span>
                                </a>
                            </li>
                        </ul>

                        <!-- profile -->
                        <div class="card" id="profile"
                            style="{{ request()->routeIs('admin.profile') ? 'display:block' : 'display:none' }}">
                            <div class="card-body py-2 my-25">
                                <!-- form -->
                                <form method="GET" action="{{ route('admin.profile.update') }}" class="form-validate">
                                    @csrf
                                    <div class="row mt-1">
                                        <div class="col-12">
                                            <h4 class="mb-1">
                                                <i data-feather="user" class="font-medium-4 mr-25"></i>
                                                <span class="align-middle">Personal Information</span>
                                            </h4>
                                        </div>

                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="name">Name</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather="user"></i></span>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ Auth::guard('admin')->user()->name }}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 mb-1">
                                            <div class="form-group">
                                                <label for="mobile"> Mobile</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="phone"></i></span>
                                                    <input id="mobile" type="text" class="form-control"
                                                        value="{{ Auth::guard('admin')->user()->phone_no }}"
                                                        name="phone_no" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 mb-1">
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="mail"></i></span>
                                                    <input type="email" class="form-control" placeholder="Email"
                                                        value="{{ Auth::guard('admin')->user()->email }}" name="email"
                                                        id="email" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                Changes</button>
                                        </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>
                        <div class="card" id="password" style="display:none">
                            <!-- Account Tab starts -->
                            <div class="card-body">
                                <!-- users edit Info form start -->
                                <form method="GET" action="{{ route('admin.profile.setting') }}" class="form-validate">
                                    @csrf
                                    <div class="row mt-1">
                                        <div class="col-12">
                                            <h4 class="mb-1">
                                                <i data-feather="user" class="font-medium-4 mr-25"></i>
                                                <span class="align-middle">Password Change</span>
                                            </h4>
                                        </div>
                                        {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">New Password</label>
                                            <input type="text" class="form-control" placeholder="Password" value="" name="password" id="password" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile">Confirm Password</label>
                                            <input type="tel" class="form-control" placeholder="Confirm Password" value="" name="confirm_password" id="confirm_password"/>
                                        </div>
                                    </div> --}}

                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="account-new-password">New Password</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" id="account-new-password" name="password"
                                                    class="form-control" placeholder="Enter new password" />
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="account-retype-new-password">Confirm
                                                Password</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control"
                                                    id="account-retype-new-password" name="confirm_password"
                                                    placeholder="Confirm your new password" />
                                                <div class="input-group-text cursor-pointer"><i data-feather="eye"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                Changes</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit Info form ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $(".profile").on('click', function() {
                $(".profile").removeClass('active');
                $(this).addClass('active');
                var value = $(this).attr('data-id');
                if (value == 1) {
                    $("#profile").css('display', 'block');
                    $("#password").css('display', 'none');
                }

                if (value == 2) {
                    $("#profile").css('display', 'none');
                    $("#password").css('display', 'block');
                }
            })
        })
    </script>
@endsection
