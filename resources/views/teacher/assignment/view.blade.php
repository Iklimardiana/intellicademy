@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">List Assignment Students</li>
        </ol>
    </div>

    <div class="card p-4">
        <div class="col mt-3 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Assignment</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attachments as $item)
                        <tr>
                            <td>{{ $iteration++ }}</td>
                            <td>{{ $item->User->username }}</td>
                            <td>
                                <a href="/submission/{{$item->idUser}}/{{ $item->idModule }}" target="_blank" class="badge bg-success">
                                    <i data-feather="paperclip"></i>
                                </a>
                            </td>
                            <td>

                            @if ($item->score == null)
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scoreModal{{ $item->id }}">
                                Add Score
                            </button>
                            @else
                            {{ $item->score }}
                            @endif
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="scoreModal{{ $item->id }}" tabindex="-1" aria-labelledby="scoreModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="scoreModalLabel">Input Score for {{ $item->User->username }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="/teacher/assigment/score/{{ $item->id }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Add Score</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" name="score">
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Input Score</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </tr>
                    @empty
                        <tr>
                            <td>Assignment are Empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div>
                {{ $attachments->links() }}
            </div>
        </div>
    </div>
@endsection
