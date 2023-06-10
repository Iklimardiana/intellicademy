
@extends('layouts.master')

@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div class="card">
        <div class="col mt-3 table-responsive">
            <div class="d-flex justify-content-center">
                <table class="table table-bordered text-center m-2">
                    <thead>
                        <tr>
                            <th>Assignment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-4">
                                <div class="badge bg-success">
                                    <i data-feather="file"></i>
                                </div>
                            </td>
                            <td class="col-6">
                                <a href="" class="badge bg-warning">
                                    <i data-feather="edit"></i>
                                </a>
                                <form action="" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger p-1"
                                        onclick="deleteData(event, '')"
                                        style="border: none; background: none; padding: 0;">
                                        <i data-feather="trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-4">
                                <div class="badge bg-danger">
                                    <i data-feather="youtube"></i>
                                </div>
                            </td>
                            <td class="col-6">
                                <a href="" class="badge bg-warning">
                                    <i data-feather="edit"></i>
                                </a>
                                <form action="" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger p-1"
                                        onclick="deleteData(event, '')"
                                        style="border: none; background: none; padding: 0;">
                                        <i data-feather="trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <h4 class="course-title">{{ $module->name }}</h4>
            @foreach (preg_split('/<\/?p>/', $module->body) as $paragraph)
                @if (strpos($paragraph, '<img') !== false)
                    {!! \App\Helpers\Helper::processBase64Images($paragraph) !!}
                @else
                    @if (!empty($paragraph))
                        <p>{!! $paragraph !!}</p>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
@endsection
