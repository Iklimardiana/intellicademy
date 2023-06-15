    @extends('layouts.master')
    @section('aside')
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('message') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <aside class="col-lg-5 align-self-center">
        <div class="row justify-content-center">
            <div class="card col-11 col-md-6 col-lg-10 pb-2 pt-2">
                <div class="card-header d-flex justify-content-center gap-1">
                    <img src="{{asset('/images/logo.png')}}" alt="Logo Intellicademy" class="img-fluid" style="width: 35px">
                    <h2 class="text-center">Login</h2>
                </div>
                <form action="/login" method="POST">
                    @if ($errors->any() || session('loginError'))
                        <div class="alert alert-danger mt-1">
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (session('loginError'))
                                <p>{{ session('loginError') }}</p>
                            @endif
                        </div>
                    @endif
                    @csrf
                    <div class="card-body">
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-md-4">
                                <label for="inputUsername" class="col-form-label">Username</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="inputUsername" class="form-control" name="username">
                            </div>
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row g-3 align-items-center">
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
                    </div>
                    <div class="d-grid text-center">
                        <a href="/forgot" class="my-3">Forgot password ?</a>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <p class="my-2">or</p>
                        <a href="/register" class="btn btn-warning">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </aside>
    @endsection
    @section('content')
        <div class="text-center">
            <img src="/images/landingpage.png" alt="landing page" class="w-75">
        </div>
    @endsection