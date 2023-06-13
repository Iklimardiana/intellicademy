@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div class="col mt-3 mt-lg-0">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    Add Attachment of {{ $module->name }}
                </li>
            </ol>
        </div>

        <div class="card p-4">
            <div class="col">
                <h3>Add an attachment on {{ $module->name }}</h3>

                <form id="editForm" action="/teacher/assignment/{{ $attachment->id }}" method="POST" class="col-md-6"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="idUser" class="form-label">Type</label>
                        <select class="form-control" name="category" id="category">
                            <option value="">--Please Select The Category--</option>
                            <option value="0" {{ $attachment->category === '0' ? 'selected' : '' }}>Upload Pdf</option>
                            <option value="1" {{ $attachment->category === '1' ? 'selected' : '' }}>Insert link
                            </option>
                        </select>
                    </div>

                    <div class="mb-3" id="pdfForm" style="display: none;">
                        <label for="assignment" class="form-label">Assignment</label>
                        <input class="form-control" type="file" id="uploadPdf" name="assignment" disabled>
                        <span>{{ $attachment->assignment ?: 'No file chosen' }}</span>
                        @error('assignment')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3" id="linkForm" style="display: none;">
                        <label for="assignment" class="form-label">Assignment</label>
                        <input class="form-control" type="url" id="link" name="assignment"
                            value="{{ $attachment->assignment }}" disabled>
                        @error('assignment')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
                <div class="mb-3" style="display: flex; gap: 5px;">
                    <a href="/teacher/modules/{{ $idCourse }}" class="btn btn-warning" id="backButton">
                        <i data-feather="corner-down-left"></i>
                        <span>Back</span>
                    </a>
                    <button type="submit" form="editForm" class="btn btn-primary">
                        <i data-feather="save"></i>
                    </button>
                    <form id="deleteForm" action="/teacher/assignment/{{ $attachment->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="badge bg-danger p-2"
                            onclick="deleteAssignment(event, '/teacher/assignment/{{ $attachment->id }}')" 
                            style="border: none; background: none; padding: 0;">
                            <i data-feather="trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        const categoryInput = document.querySelector('#category');
        const linkForm = document.querySelector('#linkForm');
        const pdfForm = document.querySelector('#pdfForm');


        categoryInput.addEventListener('change', function() {
            if (this.value === '0') {
                pdfForm.style.display = 'block';
                linkForm.style.display = 'none';


                pdfForm.querySelector('#uploadPdf').removeAttribute('disabled');
                linkForm.querySelector('#link').setAttribute('disabled', true);
            }

            if (this.value === '1') {
                linkForm.style.display = 'block';
                pdfForm.style.display = 'none';

                linkForm.querySelector('#link').removeAttribute('disabled');
                pdfForm.querySelector('#uploadPdf').setAttribute('disabled', true);
            }

        });

        const deleteAssignment = (event, url) => {
        event.preventDefault();

        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your data has been deleted!", {
                        icon: "success",
                    });

                    fetch(url, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    })
                    .then(response => {
                        document.getElementById("backButton").click();
                    })
                    .catch(error => {
                        // 
                    });

                } else {
                    swal("Your data is safe!");
                }
            });
        }
    </script>
@endsection
