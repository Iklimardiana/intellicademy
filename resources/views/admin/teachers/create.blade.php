@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection

@section('content')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin-dashboard/admin-dashboard-teachers.html">Teachers</a>
            </li>
            <li class="breadcrumb-item active">add</li>
        </ol>
    </div>

    <div class="card p-4">
        <h2>Add a teacher</h2>

        <form action="/admin/teachers" method="post" class="col-md-6">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
            </div>
            @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ old('firstName') }}">
            </div>
            @error('firstName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="{{ old('lastName') }}">
            </div>
            @error('lastName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control" id="confirm-password" name="password_confirmation">
            </div>
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <a href="/admin-dashboard/admin-dashboard-teachers.html" class="btn btn-warning">
                    <i data-feather="corner-down-left"></i>
                    <span>Back</span>
                </a>
                <button type="submit" class="btn btn-primary">
                    <i data-feather="save"></i>
                    <span>Save</span>
                </button>
            </div>
        </form>
    </div>
@endsection
