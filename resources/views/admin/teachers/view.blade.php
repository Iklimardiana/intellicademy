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
            <a href="/admin/teachers/create" class="btn btn-success">
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
                    @forelse($teachers as $item)
                        <tr>
                            <td>{{ $iteration++ }}</td>
                            <td>{{ $item->firstName . ' ' . $item->lastName }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <img src="{{ asset('images/avatar/'.$item->avatar) }}" alt="Avatar" class="rounded-circle" width="40">
                            </td>
                            <td>
                                <a href="/admin/teachers/{{$item->id}}/edit" class="badge bg-warning p-1">
                                    <i data-feather="edit"></i>
                                </a>
                                <form action="/admin/teachers/{{$item->id}}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger p-1" onclick="deleteData(event, '/admin/teachers/{{$item->id}}')" style="border: none; background: none; padding: 0;">
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

            <div>
                {{ $teachers->links() }}
            </div>
        </div>

    </div>
@endsection
