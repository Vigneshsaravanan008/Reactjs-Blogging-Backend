@extends('layouts.master')
@section('meta-details')
    <title>General Settings- File System</title>
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">General Settings</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">Settings
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
                        <div class="card card-statistics">
                            <div class="card-body statistics-body">
                                <form method="POST" action="{{ route('settings.store') }}" class="form form-horizontal"
                                    enctype='multipart/form-data'>
                                    @csrf
                                    <input type="hidden" name="id" value="1" />
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="fname-icon">Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                                        <input type="text" id="fname-icon" class="form-control"
                                                            name="name" placeholder="Enter Name"
                                                            value="{{ @$settings->name }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Email</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i data-feather="mail"></i></span>
                                                        <input type="text" id="email" class="form-control"
                                                            name="email" placeholder="Enter Email"
                                                            value="{{ @$settings->name }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="col-12 stock">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="fname-icon">Logo</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="file" id="formFile"
                                                        name="logo">
                                                    <input type="hidden" name="logo_path" value="{{ @$settings->logo }}" />
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar mr-50">
                                                            @if (@$settings->logo != null)
                                                                <img src="{{ asset(@$settings->logo) }}" alt="Avatar"
                                                                    width="50" height="70">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 stock">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="fname-icon">Favicon</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="file" id="formFile"
                                                        name="favicon">
                                                    <input type="hidden" name="favicon_image"
                                                        value="{{ @$settings->favicon_image }}" />
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar mr-50">
                                                            @if (@$settings->favicon_image != null)
                                                                <img src="{{ asset(@$settings->favicon_image) }}"
                                                                    alt="Avatar" width="40" height="40">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="amount">Phone No</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"> <i
                                                                data-feather='phone'></i></span>
                                                        <input type="text" id="amount" class="form-control"
                                                            name="phone_no" placeholder="Enter Phone No"
                                                            value="{{ @$settings->phone_no }}" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="amount">Facebook</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i
                                                                data-feather='facebook'></i></span>
                                                        <input type="text" id="amount" class="form-control"
                                                            name="facebook" placeholder="Facebook"
                                                            value="{{ @$settings->facebook }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="amount">Instagram</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i
                                                                data-feather='instagram'></i></span>
                                                        <input type="text" id="amount" class="form-control"
                                                            name="instagram" placeholder="Instagram"
                                                            value="{{ @$settings->instagram }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="amount">Whatsapp</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i
                                                                data-feather='message-circle'></i></span>
                                                        <input type="text" id="amount" class="form-control"
                                                            name="whatsapp" placeholder="Whatsapp"
                                                            value="{{ @$settings->whatsapp }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="amount">Twitter</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"> <i
                                                                data-feather='twitter'></i></span>
                                                        <input type="text" id="amount" class="form-control"
                                                            name="twitter" placeholder="Enter Twitter"
                                                            value="{{ @$settings->twitter }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="offeramount">Linked In</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i
                                                                data-feather='linkedin'></i></span>
                                                        <input type="text" id="offeramount" class="form-control"
                                                            name="linkedin" placeholder="LinkedIn"
                                                            value="{{ @$settings->linkedIn }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
