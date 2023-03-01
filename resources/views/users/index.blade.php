@extends('layouts.app')


@section('breadcrumbs')
    <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
        Dashboard
        </div>
        <h2 class="page-title">
        Users
        </h2>
    </div>
@endsection

@section('pagelinks')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <span class="d-none d-sm-inline">
            <button type="button" class="btn btn-md btn-success float-end" data-bs-toggle="modal" data-bs-target="#createModal">Add New User</button>
            <!-- create modal -->
            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form  method="POST" action="{{route('usersStore')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="row mt-3">
                                    <div class="mt-3 col-md-6">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="mt-3 col-md-6">
                                        <label for="email">Email Address *</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="mt-3 col-md-6">
                                        <label for="password">Password *</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="mt-3 col-md-6">
                                        <label for="password-confirm">Confirm Password *</label>
                                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required>
                                    </div>
                                    <div class="mt-3 col-md-6">
                                        <label for="roles">Roles (hold ctrl to select multiple)</label>
                                        <select class="select2 form-control" name="roles[]" multiple="multiple">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{ucfirst($role->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- create modal -->
        </span>
    </div>
</div>
@endsection

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card card-md">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-default table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Roles</th>
                            <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td width="40" class="text-center">{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td class="text-center border px-4 py-2"><span class="badge bg-dark">{!! $user->roles->implode('name', ', '); !!}</span></td>
                                <td class="text-center" width="220">
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{$user->id}}">Edit</button>
                                    <form style="display: inline;" action="{{route('usersDestroy', $user->id)}}" onclick="return deleletconfig()" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>

                                <!-- edit modal -->
                                <div class="modal fade" id="editModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit {{$user->name}} User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form  method="POST" action="{{route('updateProfile', $user->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row mt-3">
                                                    <div class="mt-3 col-md-6">
                                                        <label for="name">Name *</label>
                                                        <input type="text" class="form-control" value="{{$user->name}}" name="name">
                                                    </div>
                                                    <div class="mt-3 col-md-6">
                                                        <label for="email">Email Address *</label>
                                                        <input type="email" name="email" value="{{$user->email}}" class="form-control">
                                                    </div>
                                                    <div class="mt-3 col-md-6">
                                                        <label for="password">Password *</label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                    <div class="mt-3 col-md-6">
                                                        <label for="password-confirm">Confirm Password *</label>
                                                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label for="roles">Roles (hold ctrl to select multiple)</label>
                                                        <select class="select2 form-control" name="roles[]" multiple="multiple">
                                                        @foreach($roles as $role)
                                                            <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>{{ucfirst($role->name)}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- edit modal -->

                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
