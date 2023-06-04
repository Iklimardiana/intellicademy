@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Profile</h4>
    </div>
    <div class="card-body">
        <div class="row gap-3 justify-content-center">
            <div class="col-4">
                <img src="{{ asset('images/avatar/'.$profile->avatar) }}" alt="Avatar" class="img-fluid">
            </div>
            <div class="col-7">
                <form action="/teacher/profile/{{$profile->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row my-3">
                        <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $profile->firstName }}">
                        </div>
                        @error('firstName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row my-3">
                        <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $profile->lastName }}">
                        </div>
                        @error('lastName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row my-3">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" value="{{ $profile->username }}">
                        </div>
                        @error('userName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row my-3">
                        <label for="email" class="col-sm-2 col-form-label">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email }}">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row my-3">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="phone" name="phone" value="{{ $profile->phone }}">
                        </div>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row my-3">
                        <label for="avatar" class="col-sm-2 col-form-label">Change Avatar</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="avatar" name="avatar">
                            <span id="file-name">{{ $profile->avatar ?: 'No file chosen' }}</span>
                            @error('avatar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                          <button type="submit" class="btn btn-success custom-button">
                            <i data-feather="save"></i>
                            <span>Update</span>
                          </button>
                        </div>
                        <div class="col">
                            <a href="/teacher/profile/{{$profile->id}}" class="btn btn-warning custom-button">
                                <i data-feather="x-circle"></i>
                                <span>Cancel</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    feather.replace();
    const avatarInput = document.getElementById('avatar');
    const fileNameSpan = document.getElementById('file-name');
    const previousAvatar = "{{ $profile->avatar }}";

    avatarInput.addEventListener('change', function() {
        if (this.files.length === 0) {
            fileNameSpan.textContent = previousAvatar ? previousAvatar : 'No file chosen';
        } else {
            fileNameSpan.textContent = this.files[0].name;
        }
    });
</script>
@endsection