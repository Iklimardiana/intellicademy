@extends('layouts.master')
@section('aside')
@include('partials.aside')
@endsection
@section('content')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Teachers</li>
        </ol>
    </div>

    <div class="card p-4">
        <div class="col-md-4">
            <a href="/admin-dashboard-teachers-add.html" class="btn btn-success">
                <i data-feather="plus"></i>
                <span>Add Teacher</span>
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
                    @forelse($teachers as $key => $item)
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
                                <a href="#" class="badge bg-warning">
                                    <i data-feather="edit"></i>
                                </a>
                                <a href="#" class="badge bg-danger" onclick="lib.test()">
                                    <i data-feather="trash"></i>
                                </a>
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
