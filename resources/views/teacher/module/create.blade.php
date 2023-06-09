@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div class="col mt-3 mt-lg-0">
        <div aria-label="breadcrumb" class="mt-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    Add module
                </li>
            </ol>
        </div>

        <div class="card p-4">
            <div class="col mt-3">
                <h3>Add a module on {{ $course->name }}</h3>

                <form id="FormId" action="/teacher/modules/{{$course->id}}" method="POST" class="col-md-6">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Sequence</label>
                        <input type="number" min=1 class="form-control" id="name" name="sequence" value="1">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Module Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea id="body-input" name="body" style="display: none"></textarea>
                        <div id="editor-container" style="min-height: 15rem; min-width:24.4rem"></div>
                    </div>

                    <div class="mb-3">
                        <a href="/teacher/modules/{{$course->id}}" class="btn btn-warning">
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

        </div>
    </div>
@endsection
