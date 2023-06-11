@extends('layouts.master')
@section('aside')
    <aside class="sidebar-course text-center hide">
        <h3 class="py-4 m-0 sidebar-title">Course Name</h3>
        @foreach ($course->module->sortBy('sequence') as $module)
            <a href="{{ route('learning-page', ['id' => $course->id, 'sequence' => $module->sequence]) }}"
                class="sidebar-course-link {{ $module->sequence == $currentSequence ? 'active' : '' }}">
                Modul {{ $module->sequence }} {{ $module->name }}
            </a>
        @endforeach

        <button class="btn btn-dark sidebar-course-drawer">
            <i data-feather="menu"></i>
        </button>
    </aside>
@endsection
@section('content')
    @php
        $currentModuleId = $module ? $module->id : null;
    @endphp
    @if ($attachment->where('idModule', $currentModuleId)->isNotEmpty())
        <div class="card mb-2">
            <div class="col mt-3 table-responsive">
                <div class="d-flex justify-content-center">
                    <table class="table table-bordered text-center m-2">
                        <thead>
                            <tr>
                                <th colspan="3">Your Assignment</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Assignment</th>
                                <th>Upload</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attachment as $item)
                                @if ($item->idModule == $currentModuleId)
                                    <tr>
                                        <td class="col-4">
                                            <a href="{{ $item->link }}" class="badge bg-success">
                                                <i data-feather="file"></i>
                                            </a>
                                        </td>
                                        <td class="col-6">
                                            <form action="" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="badge bg-warning p-1"
                                                    onclick="deleteData(event, '')"
                                                    style="border: none; background: none; padding: 0;">
                                                    <i data-feather="upload"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="col-6">
                                            90
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            @php
                $currentModule = $course->module->where('sequence', $currentSequence)->first();
            @endphp
            <h4 class="course-title">{{ $currentModule->name }}</h4>
            <hr>
            @foreach (preg_split('/<\/?p>/', $currentModule->body) as $paragraph)
                @if (strpos($paragraph, '<img') !== false)
                    {!! \App\Helpers\Helper::processBase64Images($paragraph) !!}
                @else
                    @if (!empty($paragraph))
                        <p>{!! $paragraph !!}</p>
                    @endif
                @endif
            @endforeach
        </div>


        <div class="card-footer">
            <div class="container-fluid">
                <div class="row justify-content-between">
                    <div class="col">
                        @if ($currentSequence > 1)
                            <a href="{{ route('learning-page', ['id' => $course->id, 'sequence' => $currentSequence - 1]) }}"
                                class="btn-footer-course">Kembali</a>
                        @endif
                    </div>
                    <div class="col" style="text-align:right">
                        @if ($currentSequence < $course->module->count())
                            <a href="{{ route('learning-page', ['id' => $course->id, 'sequence' => $currentSequence + 1]) }}"
                                class="btn-footer-course">Selanjutnya</a>
                        @elseif($currentSequence == $course->module->count())
                            <a href="/student" class="btn-footer-course">Kembali ke Dashboard</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
