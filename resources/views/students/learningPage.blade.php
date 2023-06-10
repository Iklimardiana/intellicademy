@extends('layouts.master')
@section('aside')
    <aside class="sidebar-course text-center hide">
        <h3 class="py-4 m-0 sidebar-title">Course Name</h3>
        @foreach ($course->module->sortBy('sequence') as $module)
            <a href="{{ route('learning-page', ['id' => $course->id, 'sequence' => $module->sequence]) }}"
                class="sidebar-course-link {{ $module->sequence == $currentSequence ? 'active' : '' }}">
                Modul {{ $module->sequence }} {{ $module->name}}
            </a>
        @endforeach

        <button class="btn btn-dark sidebar-course-drawer">
            <i data-feather="menu"></i>
        </button>
    </aside>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            @php
                $currentModule = $course->module->where('sequence', $currentSequence)->first();
            @endphp
            <h4 class="course-title">{{$currentModule->name}}</h4>
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
                        <a href="/student"
                            class="btn-footer-course">Kembali ke Dashboard</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
