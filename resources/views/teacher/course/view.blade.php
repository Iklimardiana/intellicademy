@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Courses</li>
        </ol>
    </div>

    {{-- <div class="card p-4">
    </div>
     --}}
<div class="row">
  <div class="col-sm-6 mb-3">
    <div class="card">
         <img src="/images/landingpage.png" class="card-img-top" alt="landingpage" style="max-height: 200px; object-fit:cover;">
      <div class="card-body">
        <h5 class="card-title">Nama Course</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est earum, sequi tempore nostrum non voluptatibus porro ipsum amet maxime consectetur.</p>
        <div class="text-center">
             <a href="#" class="btn btn-info">Students</a>
        <a href="#" class="btn btn-primary">Modul</a>
        <a href="#" class="btn btn-info">Assignment</a>
        </div>
      </div>
    </div>
  </div>
    <div class="col-sm-6 mb-3">
    <div class="card">
         <img src="/images/landingpage.png" class="card-img-top" alt="landingpage" style="max-height: 200px; object-fit:cover;">
      <div class="card-body">
        <h5 class="card-title">Nama Course</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est earum, sequi tempore nostrum non voluptatibus porro ipsum amet maxime consectetur.</p>
        <div class="text-center">
             <a href="/teacher/students" class="btn btn-info">Students</a>
        <a href="#" class="btn btn-primary">Modul</a>
        <a href="#" class="btn btn-info">Assignment</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
