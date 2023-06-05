@extends('layouts.master')
@section('content')
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="card col-11 col-md-6 col-lg-4 pb-4">
            <div class="card-header">
                <h2 class="text-center">Enter Your New Password</h2>
            </div>
            <form action="/reset" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-md-4">
                            <label for="inputEmail" class="col-form-label">Email</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="inputEmail" class="form-control" name="email" value="{{ $resetPassword->email }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-md-4">
                            <label for="inputPassword" class="col-form-label">Password</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" id="password" class="form-control @error('password') is-invalid                        
                            @enderror" name="password"  placeholder="Password" />
                        
                            @error('password')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-md-4">
                            <label for="inputConfirmPassword" class="col-form-label">Confirm Password</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" id="inputConfirmPassword" class="form-control" name="confirmpassword">
                        </div>
                    </div>
                </div>
                <div class="d-grid text-center">
                    <button type="submit" class="btn btn-primary">Enter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection