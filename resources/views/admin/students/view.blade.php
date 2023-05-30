@extends('layouts.master')
@section('aside')
@include('partials.aside')
@endsection
@section('content')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Students</li>
        </ol>
    </div>

    <div class="card p-4">
        <div class="col-md-4">
            <a href="/admin-dashboard-students-add.html" class="btn btn-success">
                <i data-feather="plus"></i>
                <span>Add Students</span>
            </a>
        </div>
        <div class="col mt-3 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>E-Mail</th>
                        <th>Phone</th>
                        <th>Avatar</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->firstName . ' ' . $item->lastName }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <img src="{{ asset($item->avatar) }}" alt="Avatar" class="rounded-circle" width="40">
                            </td>
                            <td>
                                <a href="/admin/students/{{$item->id}}/edit" class="badge bg-warning p-1">
                                    <i data-feather="edit"></i>
                                </a>
                                <form action="/admin/students/{{$item->id}}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger p-1" style="border: none; background: none; padding: 0;">
                                        <i data-feather="trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Teachers are Empty</td>
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
