@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div class="col mt-3 mt-lg-0">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    Add Attachment of {module name}
                </li>
            </ol>
        </div>

        <div class="card p-4">
            <div class="col mt-3">
                <h3>Add an attachment on {module name}</h3>

                <form id="FormId" action="/teacher/attachment" method="POST" class="col-md-6">
                    @csrf
                    <div class="mb-3">
                        <label for="idUser" class="form-label">Type</label>
                        <select class="form-control" name="category" id="category">
                            <option value="">--Please Select The Category--</option>
                            <option value="0">Upload Pdf</option>
                            <option value="1">Insert link</option>
                        </select>
                    </div>

                    <div class="mb-3" id="pdfForm" style="display: none;">
                        <label for="assignment" class="form-label">Assignment</label>
                        <input class="form-control" type="file" id="uploadPdf" name="assignment" disabled>
                        @error('assignment')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3" id="linkForm" style="display: none;">
                        <label for="assignment" class="form-label">Assignment</label>
                        <input class="form-control" type="text" id="link" name="assignment" disabled>
                        @error('assignment')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    
                
                    <div class="mb-3">
                        <a href="/teacher/modules" class="btn btn-warning">
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
