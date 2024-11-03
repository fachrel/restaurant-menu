@extends('layouts.app')

@php
    $title = "Create User";
    $url = route('users.store');
    if ($editMode) {
        $title = "Edit User";
        $url = route('users.update', $user->id);
    }
@endphp

@section('title', $title)
@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h4 class="card-title text-white ">{{ $title }}</h4>
        </div>
        @error('name')
            <div class="alert-danger">{{ $message }}</div>
        @enderror
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ $url }}">
                    @if ($editMode)
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <input type="checkbox" id="status" name="status" class="form-check-input" 
                                        @if ($editMode)
                                            {{ $user->status == '1' ? 'checked' : '' }}
                                        @else
                                            checked
                                        @endif
                                        >
                                        <label for="status">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Name</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="name" class="form-control" name="name" value="{{ $editMode ? $user->name : '' }}" placeholder="Name">
                            </div>
                            <div class="col-md-4">
                                <label>Username</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="username" id="username" class="form-control" value="{{ $editMode ? $user->username : '' }}" name="username" placeholder="Username">
                            </div>
                            <div class="col-md-4">
                                <label>Email</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="email" id="email" class="form-control" name="email" value="{{ $editMode ? $user->email : '' }}" placeholder="Email">
                            </div>
                            @if ($editMode)
                                <div class="col-md-4">
                                    <label>Old Password</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="password" id="old-password" class="form-control" name="old_password" placeholder="Old Password">
                                </div>
                            @endif
                            <div class="col-md-4">
                                <label>Password</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="col-md-4">
                                <label>Password Confirmation</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="password" id="password-confirmation" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">{{ $editMode ? 'Update' : 'Submit' }}</button>
                                {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                <a href="{{ route('users.index') }}" type="button" class="btn btn-dark me-1 mb-1">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
