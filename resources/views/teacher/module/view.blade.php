@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Modules of {{ $course->name }}</li>
        </ol>
    </div>

    <div class="card p-4">
        <div class="col-md-4">
            <a href="/teacher/modules/create/{{ $course->id }}" class="btn btn-success">
                <i data-feather="plus"></i>
                <span>Add Modules</span>
            </a>

            <a href="/teacher/courses/{{ Auth::user()->id }}" class="btn btn-warning">
                <i data-feather="corner-down-left"></i>
                <span>Back</span>
            </a>
        </div>
        <div class="col mt-3 table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Attachment</th>
                        <th>Sequence</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($modules as $item)
                        <tr>
                            <td>{{ $iteration++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @php
                                    $currentAttachment = $attachment->where('idModule', $item->id)->first();
                                @endphp
                                @if ($currentAttachment == null)
                                    <a href="/teacher/{{ $item->id }}/assignment/create" class="badge bg-success">
                                        <i data-feather="file-plus"></i>
                                    </a>
                                @else
                                    <a href="/teacher/assignment/{{ $currentAttachment->id }}/edit" class="badge bg-success">
                                        <i data-feather="paperclip"></i>
                                    </a>
                                @endif
                                </a>
                            </td>
                            <td>{{ $item->sequence }}</td>
                            <td>
                                <a href="/teacher/modules/{{ $item->id }}/edit" class="badge bg-warning">
                                    <i data-feather="edit"></i>
                                </a>
                                <form action="/teacher/modules/{{ $item->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger p-1"
                                        onclick="deleteData(event, '/teacher/modules/{{ $item->id }}')"
                                        style="border: none; background: none; padding: 0;">
                                        <i data-feather="trash"></i>
                                    </button>
                                </form>
                                <a href="/teacher/assigment/{{ $item->id }}" class="badge bg-primary">
                                    <i data-feather="file-text"></i>
                                </a>
                                <a href="/teacher/modules/{{ $item->id }}/detail" class="badge bg-success">
                                    <i data-feather="eye"></i>
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

            <div>
                {{ $modules->links() }}
            </div>
        </div>
    </div>
@endsection
