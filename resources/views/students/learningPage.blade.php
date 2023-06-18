@extends('layouts.master')
@section('aside')
    <aside class="sidebar-course text-center hide">
        <div class="d-flex justify-content-around sidebar-title">
            <button class="btn btn-dark btn-fixed-height rounded mb-4 mt-4 p-1 sidebar-drawer-close">
                <i data-feather="arrow-left"></i>
            </button>
            <h3 class="py-4 ml-2">{{ $course->name }}</h3>
        </div>
        @foreach ($course->module->sortBy('sequence') as $module)
            @if ($currentProgres == '1')
                <a href="{{ route('learning-page', ['id' => $course->id, 'sequence' => $module->sequence]) }}"
                    class="sidebar-course-link {{ $module->sequence == $currentSequence ? 'active' : '' }}">
                    Modul {{ $module->sequence }} {{ $module->name }}
                </a>
            @else
                @if ($module->sequence <= $currentProgres->sequence)
                    <a href="{{ route('learning-page', ['id' => $course->id, 'sequence' => $module->sequence]) }}"
                        class="sidebar-course-link {{ $module->sequence == $currentSequence ? 'active' : '' }}">
                        Modul {{ $module->sequence }} {{ $module->name }}
                    </a>
                @else
                    <a href="{{ route('learning-page', ['id' => $course->id, 'sequence' => $module->sequence]) }}"
                        class="sidebar-course-link {{ $module->sequence == $currentSequence ? 'active' : '' }} btn disabled">
                        Modul {{ $module->sequence }} {{ $module->name }}
                    </a>
                @endif
            @endif
        @endforeach

        <button class="btn btn-dark sidebar-course-drawer">
            <i data-feather="menu"></i>
        </button>
    </aside>
@endsection
@section('content')
    @php
        $currentModule = $course
            ->Module()
            ->where('sequence', $currentSequence)
            ->first();
        $currentModuleId = $currentModule ? $currentModule->id : null;
    @endphp

    @if ($attachment->where('idModule', $currentModuleId)->where('type', '0')->isNotEmpty())
        <div class="card mb-2">
            <div class="col table-responsive">
                <div class="d-flex justify-content-center">
                    <table class="table table-bordered text-center m-2">
                        <thead>
                            <tr>
                                <th colspan="4">Attachment</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Assignment</th>
                                <th>Upload</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attachment as $item)
                                @if ($item->idModule == $currentModuleId)
                                    <tr>
                                        <td class="col-6">
                                            @if ($item->type == '0' && $item->category == '1')
                                                <a href="{{ $item->assignment }}" target="_blank" class="badge bg-danger">
                                                    <i data-feather="link"></i>
                                                </a>
                                            @elseif($item->type == '0' && $item->category == '0')
                                                <a href="{{ asset('attachment/task/' . $item->assignment) }}"
                                                    class="badge bg-success" download>
                                                    <i data-feather="file"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="col-6">
                                            <form
                                                action="{{ url('student/learning-page/' . $item->idCourse . '?sequence=' . $currentSequence) }}"
                                                id="uploadForm" method="POST" style="display: inline;"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @if ($submission->where('idModule', $currentModuleId)->where('type', '1')->where('idUser', Auth::user()->id)->isEmpty())
                                                    <form
                                                        action="{{ url('student/learning-page/' . $item->idCourse . '?sequence=' . $currentSequence) }}"
                                                        id="uploadForm" method="POST" style="display: inline;"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <label for="assignment" id="uploadLabel"
                                                            class="badge bg-warning p-1" style="cursor: pointer;">
                                                            <i data-feather="upload"></i>
                                                            <input type="file" name="assignment" id="assignment"
                                                                style="display: none;" onchange="confirmUpload(event)">
                                                        </label>
                                                        @error('assignment')
                                                            <div class="text-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </form>
                                                @else
                                                    <label for="assignment" id="uploadLabel" class="badge bg-secondary p-1"
                                                        style="cursor: pointer;">
                                                        <i data-feather="upload"></i>
                                                        <input type="file" name="assignment" id="assignment"
                                                            style="display: none;" disabled>
                                                    </label>
                                                @endif
                                                </label>
                                                <span id="uploadConfirmation" style="display: none;">File uploaded</span>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($submission->where('idModule', $currentModuleId)->where('type', 1)->where('idUser', Auth::user()->id)->isNotEmpty())
                <div class="d-flex justify-content-center">
                    <table class="table table-bordered text-center m-2">
                        <thead>
                            <tr>
                                <th colspan="2">Your Submission</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Your File</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($submission as $item)
                                @if ($item->idModule == $currentModuleId)
                                    <tr>
                                        <td class="col-6">
                                            <a href="{{ asset('attachment/submission/' . $item->assignment) }}"
                                                class="badge bg-primary" download>
                                                <i data-feather="file"></i>
                                            </a>
                                        </td>
                                        <td class="col-6">
                                            <p>
                                                @if ($item->score)
                                                    {{ $item->score }}
                                                @endif
                                            </p>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
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
                            @if ($currentProgres->status == '1')
                                <a href="{{ route('learning-page-next', ['id' => $course->id, 'sequence' => $currentSequence + 1]) }}"
                                    class="btn-footer-course">Selanjutnya</a>
                            @elseif($currentProgres->status == '0')
                                <a href="" class="btn-footer-course btn disabled"
                                    style="border: none;">Selanjutnya</a>
                            @endif
                        @elseif($currentSequence == $course->module->count())
                            @if ($currentProgres->status == '1')
                                <a href="/student" class="btn-footer-course">Kembali ke Dashboard</a>
                            @elseif($currentProgres->status == '0')
                                <a href="" class="btn-footer-course btn disabled" style="border: none;">Kembali ke
                                    Dashboard</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <script>
            MyFunction();
        </script>

    </div>
    <script>
        $(document).load(function() {
            MyFunction();
        });
    </script>
@endsection
