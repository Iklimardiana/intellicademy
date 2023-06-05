@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <a href="/teacher/courses/{{$profile->id}}" class="btn">
                    <i data-feather="arrow-left"></i>
                </a>
            </div>
            <div class="col text-center">
                <h4 class="mb-0">Profile</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row gap-3 justify-content-center">
            <div class="col-4">
                <img src="{{ asset('images/avatar/'.$profile->avatar) }}" alt="Avatar" class="img-fluid">
            </div>
            <div class="col-7">
                <div class="row my-3">
                    <label for="fullName" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fullName" value="{{$profile->firstName}}" disabled>
                    </div>
                </div>
                <div class="row my-3">
                    <label for="fullName" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fullName" value="{{$profile->lastName}}" disabled>
                    </div>
                </div>
                <div class="row my-3">
                    <label for="fullName" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fullName" value="{{$profile->username}}" disabled>
                    </div>
                </div>
                <div class="row my-3">
                    <label for="email" class="col-sm-2 col-form-label">E-Mail</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" value="{{$profile->email}}" disabled>
                    </div>
                </div>
                <div class="row my-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="phone" value="{{$profile->phone}}" disabled>
                    </div>
                </div>
                <div class="row my-3">
                    <label for="avatar" class="col-sm-2 col-form-label">Change Avatar</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="avatar" name="avatar" disabled>
                        <span id="file-name">{{ $profile->avatar ?: 'No file chosen' }}</span>
                        @error('thumbnail')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row my-3">
                    @if (Auth::user()->role == '1')
                        <a href="/teacher/profile/{{$profile->id}}/edit" class="btn btn-success">
                            <i data-feather="edit"></i>
                            <span>Edit Profile</span>
                        </a>
                    @else
                        <a href="/student/profile/{{$profile->id}}/edit" class="btn btn-success">
                            <i data-feather="edit"></i>
                            <span>Edit Profile</span>
                        </a>
                    @endif
                </div>

            </div>
            </div>
        </div>
    </div>
</div>
@endsection