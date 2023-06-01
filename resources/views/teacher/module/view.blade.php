@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Nama Modules</li>
        </ol>
    </div>

    <div class="card p-4">
        <div class="col-md-4">
            <a href="/teacher/modules/create" class="btn btn-success">
                <i data-feather="plus"></i>
                <span>Add Modules</span>
            </a>

            <a href="/teacher/courses/{{ Auth::user()->id }}" class="btn btn-warning">
                <i data-feather="corner-down-left"></i>
                <span>Back</span>
            </a>
        </div>
        <div class="col mt-3 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Attachment</th>
                        <th>Sequence</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($modules as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->body }}</td>
                            @forelse ($item->attachment as  $a)
                                @if ($a->type == 0)
                                    <td>{{ $a->link }}</td>
                                @break
                            @endif
                        @empty
                            <td>
                                null
                            </td>
                        @endforelse
                        <td>{{ $item->sequence}}</td>
                        <td>
                            <a href="#" class="badge bg-warning">
                                <i data-feather="edit"></i>
                            </a>
                            <a href="#" class="badge bg-danger" onclick="lib.test()">
                                <i data-feather="trash"></i>
                            </a>
                             <a href="/teacher/assigment/{{ $item->id }}" class="badge bg-primary">
                                <i data-feather="book-open"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Modul are Empty</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>

                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection
