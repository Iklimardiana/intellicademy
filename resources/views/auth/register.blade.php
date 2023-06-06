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
                    <h2 class="text-center">Register</h2>
                </div>
                <form action="/register" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-md-4">
                                <label for="inputEmail" class="col-form-label">E-Mail</label>
                            </div>
                            <div class="col-md-8">
                                <input type="email" id="inputEmail" class="form-control" name="email" value="{{ old ('email')}}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-md-4">
                                <label for="inputUsername" class="col-form-label">Username</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="inputUsername" class="form-control" name="username" value="{{ old ('username')}}">
                            </div>
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-md-4">
                                <label for="inputFirstName" class="col-form-label">First Name</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="inputUsername" class="form-control" name="firstName" value="{{ old ('firstName')}}">
                            </div>
                            @error('firstName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-md-4">
                                <label for="inputLastName" class="col-form-label">Last Name</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="inputLastName" class="form-control" name="lastName" value="{{ old ('lastName')}}">
                            </div>
                            @error('lastName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-md-4">
                                <label for="inputPhone" class="col-form-label">Phone</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" id="inputPhone" class="form-control" name="phone" value="{{ old ('phone')}}">
                            </div>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-md-4">
                                <label for="inputPassword" class="col-form-label">Password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" id="inputPassword" class="form-control" name="password">
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-4">
                                <label for="inputConfirmationPassword" class="col-form-label">Password
                                    Confirmation</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" id="inputConfirmationPassword" class="form-control"
                                    name="password_confirmation">
                            </div>
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-grid text-center">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <p class="my-2">or</p>
                        <a href="/login" class="btn btn-warning">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection