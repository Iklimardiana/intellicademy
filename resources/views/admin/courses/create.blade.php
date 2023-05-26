@extends('layouts.master')

@section('content')
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/admin-dashboard-courses.html">Courses</a>
        </li>
        <li class="breadcrumb-item active">add</li>
    </ol>
</div>

<div class="card p-4">
    <h2>Add a course</h2>

    <form action="/course" method="POST" class="col-md-6" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" class="form-control" name="name" id="name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="idUser" class="form-label">Teacher</label>
            <select class="form-control" name="idUser" id="idUser">
                <option value="">--Please Select The Teacher--</option>
                @forelse ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->username }}</option>
                @empty
                    <option value="">Tidak ada Kategori</option>
                @endforelse
            </select>
            @error('idUser')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input class="form-control" type="file" id="thumbnail" name="thumbnail">
            @error('thumbnail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <a href="/course" class="btn btn-warning">
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
