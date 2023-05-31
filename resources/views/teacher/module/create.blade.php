@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div class="col mt-3 mt-lg-0">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/teacher-dashboard/teacher-dashboard-courses.html">
                        Courses
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/teacher-dashboard/teacher-dashboard-course-detail.html">
                        Course Name
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    Add module
                </li>
            </ol>
        </div>

        <div class="card p-4">
            <div class="col mt-3">
                <h3>Add a module on {Course Name}</h3>

                <form action="#" class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Sequent</label>
                        <input type="number" min=1 class="form-control" id="name" value="1">
                        {{-- <input type="number" min=1 class="form-control is-invalid" id="name" value="1"> --}}
                        {{-- <div id="validationServer03Feedback" class="invalid-feedback">
                            Sequent 1 sudah ada
                        </div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Module Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>

                    <div class="mb-3">
                        <label for="attachments" class="form-label">Attachments</label>
                        <input class="form-control" id="attachments" type="file" id="formFileMultiple" multiple>
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <div name="" id="editor-container" style="min-height: 15rem;"></div>
                        <input type="text" name="editor" hidden>
                    </div>

                    <div class="mb-3">
                        <a href="/teacher-dashboard/teacher-dashboard-course-detail.html" class="btn btn-warning">
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
