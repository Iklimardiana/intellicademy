@extends('layouts.master')
@section('aside')
@include('partials.aside')
@endsection
@section('content')
    <div aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/course">Courses</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>

    <div class="card p-4">
        <h2>Edit a course</h2>

        <form action="/admin/course/{{ $course->id }}" method="POST" class="col-md-6" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Course Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $course->name }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $course->price }}">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $course->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="idUser" class="form-label">Teacher</label>
                <select class="form-control" name="idUser" id="idUser">
                    <option value="">--Please Select The Teacher--</option>
                    @forelse ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" @if ($teacher->id == $course->idUser) selected @endif>
                            {{ $teacher->username }}</option>
                    @empty
                        <option value="">There Are No Teachers</option>
                    @endforelse
                </select>
                @error('idUser')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                <span id="file-name">{{ $course->thumbnail ?: 'No file chosen' }}</span>
                @error('thumbnail')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <a href="/admin/course" class="btn btn-warning">
                    <i data-feather="corner-down-left"></i>
                    <span>Back</span>
                </a>
                <button type="submit" class="btn btn-primary">
                    <i data-feather="save"></i>
                    <span>Update</span>
                </button>
            </div>
        </form>
    </div>

    <script>
        feather.replace();
        const thumbnailInput = document.getElementById('thumbnail');
        const fileNameSpan = document.getElementById('file-name');
        const previousThumbnail = "{{ $course->thumbnail }}";

        thumbnailInput.addEventListener('change', function() {
            if (this.files.length === 0) {
                fileNameSpan.textContent = previousThumbnail ? previousThumbnail : 'No file chosen';
            } else {
                fileNameSpan.textContent = this.files[0].name;
            }
        });
    </script>
@endsection
