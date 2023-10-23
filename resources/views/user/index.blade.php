@extends('layouts.master')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ @$users->count() }}</h3>
                                    <span>Total Users</span>
                                </div>
                                <div class="avatar bg-light-primary p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ @$users->where('status', 1)->count() }}</h3>
                                    <span>Active Users</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user-plus" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ @$users->where('status', 2)->count() }}</h3>
                                    <span>InActive Users</span>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user-check" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="text-right">
                            <a class="dt-button add-new btn btn-primary" href="/"><span>New
                                    TestPreparation</span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-statistics">
                                <div class="">
                                    <div class="table-responsive table-bordered">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Phone No</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($users->count() > 0)
                                                    @foreach ($users as $key => $user)
                                                        <tr>
                                                            <td><a class="font-weight-bold" href="#">
                                                                    {{ $key + $users->firstItem() }}</a></td>
                                                            <td>
                                                                <div class="d-flex justify-content-left align-items-center">
                                                                    <div class="avatar-wrapper">
                                                                        <div class="avatar avatar-lg mr-50">
                                                                            <img src="{{ asset($user->image) }}"
                                                                                alt="Avatar" width="32"
                                                                                height="32" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex flex-column ml-2">
                                                                        <h6 class="user-name text-truncate mb-0">
                                                                            {{ $user->name }}</h6>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><span class="text-primary">{{ $user->slug }}</span>
                                                            </td>
                                                            <td>
                                                                @if ($user->status == '1')
                                                                    <span
                                                                        class="badge badge-pill badge-light-success">Active</span>
                                                                @else
                                                                    <span
                                                                        class="badge badge-pill badge-light-danger">Inactive</span>
                                                                @endif
                                                            </td>
                                                            <td class="cell-fit">
                                                                <div class="d-inline-flex">
                                                                    <a class="dropdown-item" href="/"><i
                                                                            data-feather="edit"></i></a>
                                                                    <a class="dropdown-item deleteButton" data-href="/"><i
                                                                            data-feather="trash"></i></a>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr class="odd">
                                                        <td class="dataTables_empty">No Users</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-flex justify-content-between mx-0 row mt-1">
                                        <div class="col-sm-12 col-md-6">
                                        </div>
                                        <div class="col-sm-12 col-md-6 text-left">
                                            {{ $users->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
